<?php
// var_dump($_SESSION['user']['username']);
// var_dump($shows)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | SHOW</title>
</head>
<body>
    <div>
        <a href="<?= urlpath('dashboard-writer/create') ?>">CREATE</a>
    </div>
    <div class="p-4 sm:ml-64">
    <!-- <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg"> -->
        <div class="relative overflow-x-auto rounded-2xl border-b-8 border-r-8 border-t-2 border-l-2 border-black">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-[#FAAB36] border-b-2 border-black">
                <tr>
                    <th scope="col" class="px-6 py-3 font-bold text-xl">
                        NO.
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold text-xl">
                        JUDUL
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold text-xl">
                        CATEGORY
                    </th>
                    <th scope="col" class="px-6 py-3 font-bold text-xl">
                        ACTION
                    </th>
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
                            <?= $show['judul'] ?>
                        </td>
                        <td class="px-6 py-4 text-lg font-medium text-gray-900">
                            <?= $category[$show['category_id']-1]['nama'] ?>
                        </td>
                        <td class="px-6 py-4 flex gap-x-3">
                            <a href="<?= urlpath('dashboard/edit-contact?id='. $contact['id'])?>" class="font-medium text-lg bg-[#FAAB36] rounded-md border-t-2 border-l-2 border-b-4 border-r-4 border-black hover:underline"><i><svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                            
                            </i></a>
                            <a href="<?= urlpath('dashboard-writer/delete?id='. $show['id'])?>" class="font-medium text-lg bg-[#FF69B4] rounded-md border-t-2 border-l-2 border-b-4 border-r-4 border-black hover:underline"><i><svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                            </svg>
                            </i></a>
                        </td>
                    </tr>
                <?php
                    $i++;
                    }
                ?>    
            </tbody>
        </table>
        </div>
    </div>
</body>
</html>