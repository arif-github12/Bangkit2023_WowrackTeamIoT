#include <ArduinoJson.h>
#include <ArduinoJson.hpp>

#include "esp_camera.h"
#include <WiFi.h>
#include <base64.h>

// Define the number of bytes for the buffer
const int BUFFER_SIZE = 30000;

uint8_t* buffer = NULL;
size_t buffer_len = 0;
// WARNING!!! PSRAM IC required for UXGA resolution and high JPEG quality
//            Ensure ESP32 Wrover Module or other board with PSRAM is selected
//            Partial images will be transmitted if image exceeds buffer size
//

// Select camera model
//#define CAMERA_MODEL_WROVER_KIT // Has PSRAM
//#define CAMERA_MODEL_ESP_EYE // Has PSRAM
//#define CAMERA_MODEL_M5STACK_PSRAM // Has PSRAM
//#define CAMERA_MODEL_M5STACK_V2_PSRAM // M5Camera version B Has PSRAM
//#define CAMERA_MODEL_M5STACK_WIDE // Has PSRAM
//#define CAMERA_MODEL_M5STACK_ESP32CAM // No PSRAM
#define CAMERA_MODEL_AI_THINKER // Has PSRAM
//#define CAMERA_MODEL_TTGO_T_JOURNAL // No PSRAM

#include "camera_pins.h"

const char* ssid = "barong";
const char* password = "bolaliar";

void startCameraServer();

// void print_image(uint8_t *image_buffer, size_t buffer_size) {
//   Serial.print("Image Data: ");
//   for (int i = 0; i < buffer_size; i++) {
//     Serial.print(image_buffer[i], BIN);
//     Serial.print(" ");
//     // Create a DynamicJsonDocument
//     DynamicJsonDocument doc(1024);

//   // Convert image data to base64 string
//    String base64_image = base64::encode(buffer, buffer_len);

//   // Add the image data to the JSON document
//     doc["image"] = base64_image;

//   // Serialize the JSON document to a string
//   String json_str;
//    serializeJson(doc, json_str);

//   // Print the JSON string to the terminal
//     Serial.println(json_str);
//   }
//   Serial.println();
// }
void print_image(uint8_t *image_buffer, size_t buffer_size) {
  // Convert image data to base64 string
  String base64_image = base64::encode(image_buffer, buffer_size);

  // Create a DynamicJsonDocument
  DynamicJsonDocument doc(1024);

  // Add the image data to the JSON document
  doc["image"] = base64_image;

  // Serialize the JSON document to a string
  String json_str;
  serializeJson(doc, json_str);

  // Print the JSON string to the terminal
  Serial.println(json_str);
}

void setup() {
  Serial.begin(115200);
  Serial.setDebugOutput(true);
  Serial.println();

  camera_config_t config;
  config.ledc_channel = LEDC_CHANNEL_0;
  config.ledc_timer = LEDC_TIMER_0;
  config.pin_d0 = Y2_GPIO_NUM;
  config.pin_d1 = Y3_GPIO_NUM;
  config.pin_d2 = Y4_GPIO_NUM;
  config.pin_d3 = Y5_GPIO_NUM;
  config.pin_d4 = Y6_GPIO_NUM;
  config.pin_d5 = Y7_GPIO_NUM;
  config.pin_d6 = Y8_GPIO_NUM;
  config.pin_d7 = Y9_GPIO_NUM;
  config.pin_xclk = XCLK_GPIO_NUM;
  config.pin_pclk = PCLK_GPIO_NUM;
  config.pin_vsync = VSYNC_GPIO_NUM;
  config.pin_href = HREF_GPIO_NUM;
  config.pin_sscb_sda = SIOD_GPIO_NUM;
  config.pin_sscb_scl = SIOC_GPIO_NUM;
  config.pin_pwdn = PWDN_GPIO_NUM;
  config.pin_reset = RESET_GPIO_NUM;
  config.xclk_freq_hz = 20000000;
  config.pixel_format = PIXFORMAT_JPEG;
  config.frame_size = FRAMESIZE_SVGA;
  config.jpeg_quality = 10;
  config.fb_count = 2;
  // if PSRAM IC present, init with UXGA resolution and higher JPEG quality
  //                      for larger pre-allocated frame buffer.
  // if(psramFound()){
  //   config.frame_size = FRAMESIZE_UXGA;
  //   config.jpeg_quality = 10;
  //   config.fb_count = 2;
  // } else {
  //   config.frame_size = FRAMESIZE_SVGA;
  //   config.jpeg_quality = 12;
  //   config.fb_count = 1;
  // }

#if defined(CAMERA_MODEL_ESP_EYE)
  pinMode(13, INPUT_PULLUP);
  pinMode(14, INPUT_PULLUP);
#endif

  // camera init
  esp_err_t err = esp_camera_init(&config);
  if (err != ESP_OK) {
    Serial.printf("Camera init failed with error 0x%x", err);
    return;
  }

  sensor_t * s = esp_camera_sensor_get();
  // initial sensors are flipped vertically and colors are a bit saturated
  if (s->id.PID == OV3660_PID) {
    s->set_vflip(s, 1); // flip it back
    s->set_brightness(s, 1); // up the brightness just a bit
    s->set_saturation(s, -2); // lower the saturation
  }
  // drop down frame size for higher initial frame rate
  s->set_framesize(s, FRAMESIZE_QVGA);

#if defined(CAMERA_MODEL_M5STACK_WIDE) || defined(CAMERA_MODEL_M5STACK_ESP32CAM)
  s->set_vflip(s, 1);
  s->set_hmirror(s, 1);
#endif

  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");

  startCameraServer();

  Serial.print("Camera Ready! Use 'http://");
  Serial.print(WiFi.localIP());
  Serial.println("' to connect");
}

void loop() {
// Ambil gambar dari kamera
camera_fb_t *fb = esp_camera_fb_get();
if (!fb) {
  Serial.println("Camera capture failed");
  return;
} else {
  Serial.println("Camera capture successful");
}

// Konversi gambar ke dalam bentuk array biner dan mencetaknya di terminal
// print_image(fb->buf, fb->len);

const char *data = (const char *)fb->buf;
// Image metadata.  Yes it should be cleaned up to use printf if the function is available
Serial.print("Size of image:");
Serial.println(fb->len);
Serial.print("Shape->width: ");
Serial.println(fb->width);
Serial.print("height: ");
Serial.println(fb->height);
Serial.print("data: ");
// Serial.print(data);
// Serial.write(data, fb->len);
String dataS = String(data);
Serial.println(dataS);
// Serial.print("with write: ");
// Serial.write(data, fb->len);
int arr[fb->len];
for (int i = 0; i < fb->len; i++) {
  arr[i] = int(data[i]);
}

// for (int i = 0; i < fb->len; i++) {
//   Serial.print(arr[i]);
//   Serial.print(" ");
// }
Serial.println();
free(buffer);

// Bebaskan memori yang digunakan oleh buffer gambar
esp_camera_fb_return(fb);

delay(1000); // Tunggu 1 detik sebelum mengambil gambar berikutnya
 // Tunggu 1 detik sebelum mengambil gambar berikutnya
}
  // Capture an image from the camera
  // camera_fb_t *fb = esp_camera_fb_get();
  // if (!fb) {
  //   Serial.println("Camera capture failed");
  //   return;
  // }

  // // Allocate buffer to store the image data
  // buffer_len = fb->len;
  // buffer = (uint8_t*) malloc(buffer_len);
  // if (!buffer) {
  //   Serial.println("Failed to allocate buffer");
  //   esp_camera_fb_return(fb);
  //   return;
  // }

  // // Copy image data to buffer
  // memcpy(buffer, fb->buf, buffer_len);

  // // Release the camera buffer
  // esp_camera_fb_return(fb);

  // // Create a DynamicJsonDocument
  // DynamicJsonDocument doc(1024);

  // // Convert image data to base64 string
  // String base64_image = base64::encode(buffer, buffer_len);

  // // Add the image data to the JSON document
  // doc["image"] = base64_image;

  // // Serialize the JSON document to a string
  // String json_str;
  // serializeJson(doc, json_str);

  // // Print the JSON string to the terminal
  // Serial.println(json_str);

  // // Free the buffer
  // free(buffer);

  // delay(5000); // Wait 5 seconds before taking another image
//}
