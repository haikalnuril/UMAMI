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
    $i = 1;
    foreach($alat as $alatBahan) {
        $alatBahan = html_entity_decode($alatBahan);
        $alatBahan = preg_replace('/^\s*\d+\.\s/', '', $alatBahan);
        ?>
        <p><?= $i ?>. <?= strip_tags($alatBahan) ?></p>
        <?php $i++;
    } ?>
    <p>Langkah-Langkah BOLO</p>
    <?php
    $i = 1;
    foreach($langkah as $langkah2) {
        $langkah2 = html_entity_decode($langkah2);
        $langkah2 = preg_replace('/^\s*\d+\.\s/', '', $langkah2);
        ?>
        <p><?= $i ?>. <?= strip_tags($langkah2) ?></p>
        <?php $i++;
    } ?>

    <p>Komentar</p>
    <form action="" method="POST">
        <div>
            <input type="hidden" id="slug" name="slug" value="<?= $recipes[0]['slug']?>">
        </div>
        <div>
            <input type="hidden" id="recipe_id" name="recipe_id" value="<?= $recipes[0]['id']?>">
        </div>
        <div>
            <label for="comment">Berikan Komentar Anda!</label>
            <input type="text" id="komen" name="komen" placeholder="Komentar Anda..!">
        </div>
        <button type="submit">Kirim</button>
    </form>

    <hr>
    <?php
    $commentPost = [];
    
    foreach($comments as $comment){
        if($comment['recipe_id'] == $recipes[0]['id']){
            $commentPost[] = $comment;
        }
    }
    
    if(count($commentPost) == 0){
        ?>
        <p>Belum ada komentar!</p>
        <?php
    }else{
    foreach($commentPost as $komen){
        $dateString = $komen['created_at'];

        // Menggunakan DateTime object
        $date = new DateTime($dateString);
        $formattedDate = $date->format('l, d-m-Y H:i');
    ?>
    <p><?= $users[$komen['user_id']-1]['username'] ?></p>
    <p><?= $formattedDate ?></p>
    <p><?= $komen['comment'] ?></p>
    <?php }?>
    <?php } ?>
</body>
</html>