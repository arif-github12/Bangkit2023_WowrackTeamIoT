import os

def rename_images(folder_path):
    # Loop melalui setiap file di folder
    files = os.listdir(folder_path)
    files.sort()  # Mengurutkan file secara alfabetis
    for index, filename in enumerate(files):
        # Mendapatkan ekstensi file
        extension = os.path.splitext(filename)[1]

        # Menentukan nama baru untuk file gambar
        new_filename = f'image_{index}{extension}'

        # Mendapatkan path asal dan path baru
        old_path = os.path.join(folder_path, filename)
        new_path = os.path.join(folder_path, new_filename)

        # Memeriksa apakah file dengan nama baru sudah ada
        while os.path.exists(new_path):
            index += 1
            new_filename = f'image_{index}{extension}'
            new_path = os.path.join(folder_path, new_filename)

        # Melakukan renaming file
        os.rename(old_path, new_path)

        print(f'{filename} -> {new_filename}')

# Memanggil fungsi rename_images dengan folder yang diinginkan
folder_path = r"F:\Dataset\Datasets_Model_Sampah-20230605T044948Z-001\penuhresize"
rename_images(folder_path)
