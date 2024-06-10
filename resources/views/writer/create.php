<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | CREATE POST</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display:none;
        }
    </style>
</head>
<body>
    <div>
        <h2>Buat Postingan Terkait Resep Andalan Anda!</h2>
        <form action="<?= urlpath('dashboard-writer/create') ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="judul">Judul Resep Anda:</label>
                <input type="text" name="judul" id="judul" placeholder="Judul Anda..." required>
            </div>
            <div>
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" placeholder="judul-anda" required>
            </div>
            <div>
                <label for="category">Kategori</label>
                <select name="category_id" id="kategori">
                <?php foreach($categories as $category){?>
                <option value="<?= $category['id'] ?>"><?= $category['nama'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <label for="alat">Alat dan Bahan</label>
                <input type="hidden" name="alat" id="alat">
                <trix-editor input="alat" class="mt-3 bg-white"></trix-editor>
            </div>
            <div>
                <label for="langkah">Langkah-Langkah Pembuatan</label>
                <input type="hidden" name="langkah" id="langkah">
                <trix-editor input="langkah" class="mt-3 bg-white"></trix-editor>
            </div>
            <div class="mt-10">
                <label for="gambar">Thumbnail</label>
                <!-- <div class="flex items-center justify-center w-full mt-5">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-200 ">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="gambar" name="gambar" type="file" class="hidden" />
                    </label>
                </div>  -->
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="gambar" name="gambar" type="file">
            </div>
            <button type="submit">Buat Postingan</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>