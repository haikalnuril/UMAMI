<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | CREATE POST</title>
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
        <form action="<?= urlpath('dashboard-writer/create') ?>" method="post">
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
            <button type="submit">Buat Postingan</button>
        </form>
    </div>
</body>
</html>