<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="<?= urlpath('assets/img/umami.png') ?>">
    <style>
        body {
            background-image: url('assets/img/background.png'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="font-[Poppins] flex items-center justify-center w-screen h-screen">
    <div class="inline-flex rounded-lg shadow-2xl border-4 border-opacity-10 border-black w-[1000px] h-[500px]">
        <div class="relative w-[342px] h-[500px] flex flex-col justify-around">
            <img src="assets/img/steak.png" alt="" class="h-[400px] w-[300px] absolute -right-1 drop-shadow-2xl">
        </div>
        <div class="w-[650px] h-[500px] flex flex-col justify-center">
            <h2 class="text-2xl font-semibold text-[#FF7D29] mb-6 text-center">Login</h2>
            <form action="<?= urlpath('login')?>" method="POST" class="space-y-5 flex flex-col items-center">
                <div class="flex flex-col justify-center">
                    <!-- <label for="email">Email</label> -->
                    <input  name="email" type="email" id="email" required placeholder="email@example.com" class="w-64 px-3 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div>
                    <div class="mt-1">
                    <!-- <label for="password">Password</label> -->
                        <input id="password" name="password" type="password" placeholder="password" required class="w-64 px-3 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                <div>
                    <button type="submit" class="w-64 flex justify-center py-2 px-4 rounded-lg shadow-sm border border-[#FF7D29] text-sm font-medium text-white bg-[#FF7D29] hover:bg-[#FEFFD2] hover:text-[#FF7D29] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF7D29]">
                        Login
                    </button>
                </div>
                <div class="text-sm text-center mt-4">
                    Belum punya akun?<a href="<?= urlpath('register')?>" class="font-medium text-[#FF7D29] hover:text-[#EB2A29]"> Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

