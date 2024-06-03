<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | <?php echo $recipes[0]['judul']; ?></title>
</head>
<body>
    <h1><?= $recipes[0]['judul'] ?></h1>
    <p>Penulis: <?= $users[$recipes[0]['penulis']-1]['username'] ?> Category: <?= $category[$recipes[0]['category_id']]['nama'] ?></p>
    <p><?= $recipes[0]['alatBahan'] ?></p>
    <p><?= $recipes[0]['langkah'] ?></p>
</body>
</html>