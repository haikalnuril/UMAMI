<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | CREATE</title>
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
        .cute-table {
            border-collapse: separate;
            border-spacing: 0 5px;
        }
        .cute-table th, .cute-table td {
            border: none;
            padding: 12px 6px;
        }
        .cute-table th {
            background-color: #FF7D29;
            color: #FFFFFF;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .cute-table td {
            background-color: #FEFFD2;
            color: #000000;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 10px;
        }
        .cute-table tr {
            transition: transform 0.2s ease-in-out;
        }
        .cute-table tr:hover {
            transform: scale(1.02);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .action-btn {
            background-color: #FF7D29;
            color: white;
            margin: 0 4px;
            transition: background-color 0.2s ease-in-out;
        }
        .action-btn:hover {
            background-color: #D75500;
        }
    </style>


</head>
<body class="bg-[#FEFFD2] text-gray-800 ">
    <header class="  text-black py-6 font-[Poppins]">
        <div class="   fixed shadow-xl z-10 top-0 py-6 w-screen mx-auto flex justify-between items-center">
            <nav>
                <img src="assets/img/umami.png" class="w-24 mx-10 my-auto" alt="">
            </nav>
            <nav class="px-6 " id="navbar-text">
                <a href="#" class="text-black mx-4 focus-visible:text-orange-300 active:text-orange-300 navbar-links" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Home</a>
                <a href="#features" class="text-black focus-visible:text-orange-300 active:text-orange-300 mx-4 navbar-links" id="link-features">Appetizer</a>
                <a href="#about" class="text-black mx-4 navbar-links" id="link-about" >Maincourse</a>
                <a href="#contact" class="text-black mx-4 navbar-links" id="link-home">Desert</a>
            </nav>
            <nav>
                <div class="inline-flex">
                    <div class=" w-10 h-9 flex bg-[#FF7D29] justify-center rounded-full items-center">
                        <img src="/img/profil.png" alt="" class="w-6 bg">
                    </div>
                    <a href="<?= urlpath('logout') ?>" class="mx-4 bg-[#FF7D29] px-4 py-1 text-lg rounded-2xl text-center text-white ">Log Out</a>
                </div>
            </nav>
        </div>
    </header>
    <main class="font-[Poppins] mb-10">
        <section class="flex items-center justify-center min-h-screen w-full" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container mx-auto mt-10 px-4">
                <h2 class="text-3xl font-bold text-center mb-6 text-orange-500">Perbarui Resep</h2>
                <form action="<?= urlpath('dashboard-writer/create') ?>" method="post" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg mx-auto">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul" placeholder="judul anda" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $recipe[0]['judul'] ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="hidden" name="oldSlug" id="oldSlug" placeholder="judul-anda" value="<?= $recipe[0]['slug'] ?>">
                        <input type="text" name="slug" id="slug" placeholder="judul-anda" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $recipe[0]['slug'] ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="category_id" id="kategori" class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                        <?php foreach($categories as $category){?>
                        <option value="<?= $category['id'] ?>" <?php if($category['id'] == $recipe[0]['category_id']){echo 'selected';} ?>><?= $category['nama'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="ingredients" class="block text-sm font-medium text-gray-700">Alat dan Bahan</label>
                        <input type="hidden" name="alat" id="alat" value="<?= $recipe[0]['alatBahan'] ?>">
                        <?php $cleanText = html_entity_decode($recipe[0]['alatBahan']); 
                        $cleanText = strip_tags($cleanText)?>
                        <trix-editor input="alat" class="mt-1 p-2 w-full border border-gray-300 rounded-md"><?= $cleanText ?></trix-editor>
                        <!-- <textarea id="ingredients" name="ingredients" rows="2"  required></textarea> -->
                    </div>
                    <div class="mb-4">
                        <label for="steps" class="block text-sm font-medium text-gray-700">Langkah-langkah</label>
                        <input type="hidden" name="langkah" id="langkah" value="<?= $recipe[0]['langkah'] ?>">
                        <?php $cleanText = html_entity_decode($recipe[0]['langkah']);
                        $cleanText = strip_tags($cleanText) ?>
                        <trix-editor input="langkah" class="mt-1 p-2 w-full border border-gray-300 rounded-md"><?= $cleanText ?></trix-editor>
                        <!-- <textarea id="steps" name="steps" rows="2" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required></textarea> -->
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
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="file" name="gambar" id="gambar" onchange="preview()">
                    </div>
                    <div class="flex justify-end mt-5">
                        <button type="submit" class="py-2 px-4 bg-orange-500  text-white font-medium rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                            Perbarui Resep
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer class="bg-[#FF7D29] text-center py-4">
        <p class="text-white">&copy; <?php echo date("Y"); ?> UMAMI. All rights reserved.</p>
    </footer>

    <script>
        function preview(){
                frame.src= URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>
</html>