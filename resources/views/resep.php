<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | <?php echo $recipes[0]['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display:none;
        }
    </style>
    <style>
        /* Custom Scrollbar for WebKit browsers (Chrome, Safari) */
        ::-webkit-scrollbar {
            width: 2px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
            border-radius: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 6px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Custom Scrollbar for Firefox */
        /* * {
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        } */

        /* *:hover {
            scrollbar-color: #555 #f1f1f1;
        } */

        /* Custom styling for the container */
        .scroll-container {
            height: 300px;
            overflow-y: scroll;
            padding: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            /* background-color: #fff; */
        }
    </style>

</head>
<body class="bg-[#FEFFD2] text-gray-800 font-[Poppins]">
    <header class="fixed top-0 left-0 w-full bg-[#FEFFD2] shadow-xl z-50">
        <div class=" mx-auto py-6 flex justify-between items-center">
            <div>
                <img src="assets/img/umami.png" class="w-24 mx-10" alt="Umami Logo">
            </div>
            <nav class="flex space-x-4">
                <a href="#" class="text-black focus-visible:text-orange-300 active:text-orange-300 navbar-links" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Home</a>
                <a href="#features" class="text-black focus-visible:text-orange-300 active:text-orange-300 navbar-links" id="link-features">Appetizer</a>
                <a href="#about" class="text-black navbar-links" id="link-about">Maincourse</a>
                <a href="#contact" class="text-black navbar-links" id="link-home">Dessert</a>
            </nav>
            <div class="inline-flex mx-8 items-center">
                <div class="w-10 h-9 flex bg-[#FF7D29] justify-center rounded-full items-center">
                    <img src="/img/profil.png" alt="Profile" class="w-6">
                </div>
                <a href="#" class="ml-4 bg-[#FF7D29] px-4 py-1 text-lg rounded-2xl text-center text-white">Log Out</a>
            </div>
        </div>
    </header>
    <main class=" flex items-center my-auto pt-36 py-20 justify-center bg-[#FEFFD2] w-full h-full">
        
        <a href="<?= urlpath('back') ?>" class="px-5 absolute top-[15vh] left-[5vh]">< Kembali</a>
        <div class="container inline-flex justify-around mx-auto px-4 py-8 ml-60">
            <div class="flex flex-col">
                <header class="mb-6">
                    <h1 class="text-4xl font-bold text-[#FF7D29]"><?= $recipes[0]['judul'] ?></h1>
                    <div class="mt-2 flex items-center">
                        <span class="text-sm text-gray-600 mr-4">Oleh: <?= $users[$recipes[0]['penulis']-1]['username'] ?></span>
                        <span class="text-sm text-gray-600">Category: <?= $category[$recipes[0]['category_id']-1]['nama'] ?></span>
                    </div>
                </header>
                <img src="/img/food.png" alt="" class="w-96">
            </div>
            <div class="flex-col flex w-[600px] gap-4">
    <?php
        $alat = explode(',', $recipes[0]['alatBahan']);
        $langkah = explode(',', $recipes[0]['langkah']);
        
    ?>
                <div class=" text-gray-900">
                    <label for="alatbahan" class="font-semibold">Alat dan Bahan:</label>
                    <div id="alatbahan" class="text-justify"><?php
    $i = 1;
    foreach($alat as $alatBahan) {
        $alatBahan = html_entity_decode($alatBahan);
        $alatBahan = preg_replace('/^\s*\d+\.\s/', '', $alatBahan);
        ?>
        <p><?= $i ?>. <?= strip_tags($alatBahan) ?></p>
        <?php $i++;
    } ?></div> 
                </div>
                <div>
                    <label for="langkah" class="font-semibold">Langkah-Langkah:</label>
                    <div id="langkah" class="text-justify"><?php
    $i = 1;
    foreach($langkah as $langkah2) {
        $langkah2 = html_entity_decode($langkah2);
        $langkah2 = preg_replace('/^\s*\d+\.\s/', '', $langkah2);
        ?>
        <p><?= $i ?>. <?= strip_tags($langkah2) ?></p>
        <?php $i++;
    } ?></div>
                </div>
        <p class="font-bold text-xl">Komentar</p>
        <form action="" method="POST">
            <div>
                <input type="hidden" id="slug" name="slug" value="<?= $recipes[0]['slug']?>">
            </div>
            <div>
                <input type="hidden" id="recipe_id" name="recipe_id" value="<?= $recipes[0]['id']?>">
            </div>
            <div>
                <label for="comment">Berikan Komentar Anda!</label>
                <input type="hidden" id="komen" name="komen">
                <trix-editor input="alat" class="mt-1 p-2 w-full bg-white border border-gray-300 rounded-md"></trix-editor>
            </div>
            <button type="submit" class="bg-[#FF7D29] px-4 py-1 rounded-xl border mt-5 font-semibold text-white">Kirim</button>
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
        
        <div class="flex items-start gap-2.5">
        <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-[#FF7D29] rounded-e-xl rounded-es-xl">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <span class="text-sm font-semibold text-gray-900 dark:text-white"><?= $users[$komen['user_id']-1]['username'] ?></span>
                <span class="text-sm font-normal text-gray-700"><?= $formattedDate ?></span>
            </div>
            <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white"><?= $komen['comment'] ?></p>
        </div>
        </div>
        <?php }?>
        <?php } ?>
                </div>
            </div>
    </main>
    <footer class="bg-[#FF7D29] text-center py-4 absolute bottom w-full">
        <p class="text-white">&copy; <script>document.write(new Date().getFullYear())</script> UMAMI. All rights reserved.</p>
    </footer>
</body>
</html>