import os
import cv2
import imgaug.augmenters as aug

def augment_images(source_directory, target_directory):
    # Membuat direktori tujuan jika belum ada
    if not os.path.exists(target_directory):
        os.makedirs(target_directory)

    # Membaca daftar file gambar dari direktori sumber
    file_list = os.listdir(source_directory)

    # Mendefinisikan augmenter
    augmenter = aug.Sequential([
        aug.Affine(rotate=(-10, 10)),
        aug.Fliplr(0.5),
        aug.Flipud(0.5),
        aug.Grayscale(alpha=0.5)
    ])

    # Loop melalui setiap file gambar
    for file_name in file_list:
        # Membaca gambar dari direktori sumber
        image_path = os.path.join(source_directory, file_name)
        try:
            image = cv2.imread(image_path)
            if image is None:
                raise Exception(f"Failed to read image: {file_name}")
        except Exception as e:
            print(str(e))
            continue

        # Melakukan augmentasi pada gambar
        augmented_images = augmenter.augment_images([image])

        # Menyimpan gambar yang dihasilkan ke direktori tujuan
        for i, augmented_image in enumerate(augmented_images):
            new_file_name = f"a5{file_name}"
            new_image_path = os.path.join(target_directory, new_file_name)
            cv2.imwrite(new_image_path, augmented_image)

        print(f"Augmentation completed for image: {file_name}")

    print("-" * 30)
    print("Image augmentation completed!")
    print("-" * 30)

# Memanggil fungsi augment_images dengan folder sumber dan target yang diinginkan
source_directory = "F:\Dataset\Datasets_Model_Sampah-20230605T044948Z-001\kosongduplicate"
target_directory = "F:\Dataset\Datasets_Model_Sampah-20230605T044948Z-001\kosongaug"
augment_images(source_directory, target_directory)
