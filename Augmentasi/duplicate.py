import os
import shutil

def duplicate_images(source_folder, target_folder):
    # Membuat folder target jika belum ada
    if not os.path.exists(target_folder):
        os.makedirs(target_folder)

    # Loop melalui setiap file di folder sumber
    for filename in os.listdir(source_folder):
        # Mendapatkan ekstensi file
        extension = os.path.splitext(filename)[1]

        # Membaca gambar dari folder sumber
        image_path = os.path.join(source_folder, filename)
        with open(image_path, 'rb') as f:
            image_data = f.read()

        # Menulis gambar ke folder target dengan nama baru
        for i in range(5):
            new_filename = f'duplicate_{i}_{filename}'

            # Menentukan path baru untuk file gambar di folder target
            new_image_path = os.path.join(target_folder, new_filename)
            with open(new_image_path, 'wb') as f:
                f.write(image_data)

            print(f'{filename} -> {new_filename}')

# Memanggil fungsi duplicate_images dengan folder sumber dan target yang diinginkan
source_folder = r"F:\Dataset\Datasets_Model_Sampah-20230605T044948Z-001\kosongresize"
target_folder = r"F:\Dataset\Datasets_Model_Sampah-20230605T044948Z-001\kosongduplicate"
duplicate_images(source_folder, target_folder)
