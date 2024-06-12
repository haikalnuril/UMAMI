<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UMAMI | DASHBOARD</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" href="<?= urlpath('assets/img/umami.png') ?>">
        <style>
            .navbar-links {
                transition: color 0.3s ease;
            }
        </style>
    </head>
    <body class="bg-[#FEFFD2] text-gray-800">
        <header class="  text-black py-6 font-[Poppins]">
            <div class="  fixed shadow-xl z-10 top-0 py-6 w-screen mx-auto flex justify-between items-center">
                <nav>
                    <img src="assets/img/umami.png" class="w-24 mx-10 my-auto" alt="">
                </nav>
                <nav class="px-6 " id="navbar-text">
                    <a href="<?= urlpath('index') ?>" class="text-black mx-4 focus-visible:text-orange-300 active:text-orange-300 hover:text-orange-300 navbar-links" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Home</a>
                    <a href="#features" class="text-black focus-visible:text-orange-300 active:text-orange-300 mx-4 navbar-links" id="link-features">Appetizer</a>
                    <a href="#about" class="text-black mx-4 navbar-links" id="link-about" >Maincourse</a>
                    <a href="#contact" class="text-black mx-4 navbar-links" id="link-home">Desert</a>
                </nav>
                <nav>
                    <div class="inline-flex mr-3">
                        <div class=" w-10 h-9 flex bg-[#FF7D29] px-10 justify-center rounded-full items-center">
                            <p class="text-white"><?= $_SESSION['user']['username'] ?></p>
                        </div>
                        <a href="<?= urlpath('logout') ?>" class="mx-4 bg-[#FF7D29] px-4 py-1 text-lg rounded-2xl text-center text-white ">Log Out</a>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <section class="hero bg-cover bg-center h-screen text-white" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container font-[Poppins] mx-auto h-full flex justify-around items-center">
                    <div class=" px-20 flex flex-col">
                    <h1 class="text-4xl text-black font-bold mb-4">Apakah Ada Resep Baru <span class="text-[#FF7D29]">Hari Ini?</span></h1>
                        <p class="text-lg mb-4 w-[600px] text-black">Anda dapat melihat perkembangan jumlah resep pada laporan. Ayo cek sekarang!</p>
                        <a href="<?= urlpath('dashboard-admin/laporan')?>" class="bg-[#FF7D29] px-5 py-2 rounded-2xl text-white w-40 text-center ">Laporan</a>
                    </div>
                    <div>
                        <img src="assets/img/curry.png" class="w-[570px]" alt="">
                    </div>
                </div>
            </section> 
            <section class="py-20 bg-[#FF7D29] font-[Poppins]" id="recipe" role="tabpanel" aria-labelledby="profile-tab">
                <h1 class="font-bold text-4xl text-center text-[#FEFFD2] mb-10">Recipes</h1>
                <div class="container mx-auto gap-5 grid grid-cols-2">
                    <?php foreach($recipes as $recipe){?>
                    <div class="px-6 ">
                        <a href="<?= urlpath('resep?slug='.$recipe['slug']) ?>" class="flex flex-col h-[24vh] items-center bg-white border relative border-gray-200  rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100  dark:bg-[#FEFFD2] dark:hover:bg-[#FF7D29] ">
                            <img class=" rounded-t-lg h-full md:h-full md:w-52 object-cover md:rounded-none md:rounded-s-lg" src="<?= urlpath('assets/images/'.$recipe['gambar']) ?>" alt="">
                            <div class="flex flex-col justify-between px-4 leading-normal ">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-[#FF7D29] "><?= $recipe['judul'] ?></h5>
                                <p class="mb-1 font-normal text-gray-700 dark:text-gray-800"><?= $users[$recipe['penulis']-1]['username']?></p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-800"><?= $categories[$recipe['category_id']-1]['nama'] ?></p>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </section> 
        </main>
        <footer class="bg-[#FF7D29] text-center py-4">
            <p class="text-white">&copy; <?php echo date("Y"); ?> UMAMI. All rights reserved.</p>
        </footer>
    </body>
    </html>