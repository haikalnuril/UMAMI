<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | update</title>
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
        <form action="<?= urlpath('dashboard-writer/edit') ?>" method="post">
            <div>
                <label for="judul">Judul Resep Anda:</label>
                <input type="text" name="judul" id="judul" placeholder="Judul Anda..." value="<?= $recipe[0]['judul'] ?>" required>
            </div>
            <div>
                <label for="slug">Slug</label>
                <input type="hidden" name="oldSlug" id="oldSlug" placeholder="judul-anda" value="<?= $recipe[0]['slug'] ?>" required>
                <input type="text" name="slug" id="slug" placeholder="judul-anda" value="<?= $recipe[0]['slug'] ?>" required>
            </div>
            <div>
                <label for="category">Kategori</label>
                <select name="category_id" id="kategori">
                <?php foreach($categories as $category){?>
                <option value="<?= $category['id'] ?>" <?php if($category['id'] == $recipe[0]['category_id']){echo 'selected';} ?>><?= $category['nama'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div>
                <label for="alat">Alat dan Bahan</label>
                <input type="hidden" name="alat" id="alat" value="<?= $recipe[0]['alatBahan'] ?>">
                <?php $cleanText = strip_tags($recipe[0]['alatBahan']) ?>
                <trix-editor input="alat" class="mt-3 bg-white"><?= $recipe[0]['alatBahan'] ?></trix-editor>
            </div>
            <div>
                <label for="langkah">Langkah-Langkah Pembuatan</label>
                <input type="hidden" name="langkah" id="langkah" value="<?= $recipe[0]['langkah'] ?>">
                <?php $cleanText = strip_tags($recipe[0]['langkah']) ?>
                <trix-editor input="langkah" class="mt-3 bg-white"><?= $cleanText ?></trix-editor>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>