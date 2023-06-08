import os
from PIL import Image

new_width = 150
new_height = 150

# mendefinisikan direktori sumber dan tujuan
source_directory = r"F:\Dataset\Datasets_Model_Sampah-20230605T044948Z-001\kosong"
target_directory = r"F:\Dataset\Datasets_Model_Sampah-20230605T044948Z-001\kosongresize"

# membuat direktori tujuan jika belum ada
if not os.path.exists(target_directory):
    os.makedirs(target_directory)

# membaca file gambar yang ada dari direktori sumber
datafile = os.listdir(source_directory)

for file_name in datafile:
    image_path = os.path.join(source_directory, file_name)
    images = Image.open(image_path)
    width, height = images.size

    # Ubah ke mode RGB jika citra memiliki mode selain RGB atau Grayscale
    if images.mode != "RGB":
        images = images.convert("RGB")

    resized_image = images.resize((new_width, new_height), Image.LANCZOS)

    # simpan semua gambar yang sudah diagumentasi
    new_file_name = f"{file_name}"
    new_image_path = os.path.join(target_directory, new_file_name)
    resized_image.save(new_image_path)

    print(f"{new_file_name} saved!")
