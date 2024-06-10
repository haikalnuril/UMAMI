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
        <form action="<?= urlpath('dashboard-writer/edit') ?>" method="post" enctype="multipart/form-data">
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
                <?php $cleanText = html_entity_decode($recipe[0]['alatBahan']); 
                $cleanText = strip_tags($cleanText)?>
                <trix-editor input="alat" class="mt-3 bg-white"><?= $cleanText ?></trix-editor>
            </div>
            <div>
                <label for="langkah">Langkah-Langkah Pembuatan</label>
                <input type="hidden" name="langkah" id="langkah" value="<?= $recipe[0]['langkah'] ?>">
                <?php $cleanText = html_entity_decode($recipe[0]['langkah']);
                 $cleanText = strip_tags($cleanText) ?>
                <trix-editor input="langkah" class="mt-3 bg-white"><?= $cleanText ?></trix-editor>
            </div>
            <div>
                <label for="gambar">Gambar</label>
                <input type="hidden" name="oldGambar" id="oldGambar" value="<?= $recipe[0]['gambar'] ?>">
                <br>
                <?php if($recipe[0]['gambar']){?>
                <img src="<?= urlpath('assets/images/'.$recipe[0]['gambar']) ?>" id="frame" style="width: 500px; height: 300px;">
                <?php } else{ ?>
                <br>
                <img style="width: 500px; height: 300px;" id="frame">
                <?php } ?>
                <br>
                <input type="file" name="gambar" id="gambar" onchange="preview()">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
    <script>
            function preview(){
                frame.src= URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>