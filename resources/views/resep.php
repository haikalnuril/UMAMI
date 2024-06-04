<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | <?php echo $recipes[0]['judul']; ?></title>
</head>
<body>
    <?php
        $alat = explode(',', $recipes[0]['alatBahan']);
        $langkah = explode(',', $recipes[0]['langkah']);
        
    ?>

    <h1><?= $recipes[0]['judul'] ?></h1>
    <p>Penulis: <?= $users[$recipes[0]['penulis']-1]['username'] ?> Category: <?= $category[$recipes[0]['category_id']]['nama'] ?></p>
    <p>Alat dan Bahan Bolo</p>
    <?php
    $i = 1; foreach($alat as $alatBahan){ 
        $alatBahan = preg_replace('/^\s*\d+\.\s/', '', $alatBahan); ?>
        <p><?= $i ?>. <?= $alatBahan ?></p>
    <?php $i++; } ?>
    <p>Langkah-Langkah BOLO</p>
    <?php
    $i = 1;
    foreach($langkah as $langkah2){
        $langkah2 = preg_replace('/^\s*\d+\.\s/', '', $langkah2); ?>
        <p><?= $i ?>. <?= $langkah2 ?></p>
    <?php $i++; } ?>
</body>
</html>