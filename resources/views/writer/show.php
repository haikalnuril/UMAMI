<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unique Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
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
                <img src="/img/umami.png" class="w-24 mx-10 my-auto" alt="">
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
                    <a href="" class="mx-4 bg-[#FF7D29] px-4 py-1 text-lg rounded-2xl text-center text-white ">Log Out</a>
                </div>
            </nav>
        </div>
    </header>
    <main class="font-[Poppins]">
        <section class="bg-[#FEFFD2] flex items-center justify-center min-h-screen" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container relative mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-6 text-[#FF7D29]">Daftar Resep Kamu</h2>
                <a href="<?= urlpath('dashboard-writer/create') ?>" class="mx-4 bg-[#FF7D29] px-4 py-1 text-lg rounded-2xl text-center text-white ">Tambah Resep</a>
                <table class="cute-table mt-2 w-full text-center rounded-lg shadow-lg">
                    <thead>
                        <tr>
                            <th class="py-2 px-4">Nomor</th>
                            <th class="py-2 px-4">Judul</th>
                            <th class="py-2 px-4">Kategori</th>
                            <th class="py-2 px-4">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            //   var_dump($contacts);
                                foreach ($shows as $show){
                                
                                ?>
                                <tr class="bg-purple-400 border-b border-black">
                                    <th scope="row" class="px-6 py-4 font-medium text-lg text-gray-900 whitespace-nowrap">
                                        <?= $i ?>
                                    </th>
                                    <td class="px-6 py-4 text-lg font-medium text-gray-900">
                                        <a href="<?= urlpath('resep?slug='.$show['slug']) ?>"><?= $show['judul'] ?></a>
                                    </td>
                                    <td class="px-6 py-4 text-lg font-medium text-gray-900">
                                        <?= $category[$show['category_id']-1]['nama'] ?>
                                    </td>
                                    <td class="px-6 py-4 flex gap-x-3 justify-center">
                                    <a href="<?= urlpath('dashboard-writer/edit?slug='. $show['slug'])?>" class="action-btn py-1 px-3 rounded-full">Edit</a>
                                    <a href="<?= urlpath('dashboard-writer/delete?id='. $show['id'])?>" class="action-btn py-1 px-3 rounded-full bg-[#FF69B4]">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                                }
                            ?>    
                    </tbody>
                </table>
            </div>
        
        </section>
    </main>
    <footer class="bg-[#FF7D29] text-center py-4">
        <p class="text-white">&copy; <?php echo date("Y"); ?> UMAMI. All rights reserved.</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>