<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | PUSAT WEBSITE RESEP MAKANAN</title>
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
    <header class="text-black py-6 font-[Poppins]">
        <div class=" fixed shadow-xl top-0 py-6 w-screen mx-auto flex justify-between items-center">
            <nav>
                <img src="assets/img/food.png" class="w-12 mx-10 my-auto" alt="">
            </nav>
            <nav class="px-6 " id="navbar-text">
                <a href="/" class="text-black mx-4 focus-visible:text-orange-300 active:text-orange-300 navbar-links" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Home</a>
                <a href="#features" class="text-black focus-visible:text-orange-300 active:text-orange-300 mx-4 navbar-links" id="link-features">Appetizer</a>
                <a href="#about" class="text-black mx-4 navbar-links" id="link-about" >Maincourse</a>
                <a href="#contact" class="text-black mx-4 navbar-links" id="link-home">Desert</a>
            </nav>
            <nav>
                <a href="<?= urlpath('login') ?>" class="mx-10 bg-[#FF7D29] px-4 py-1 rounded-2xl text-white">Masuk</a>
            </nav>
        </div>
    </header>
    <main>
        <section class="hero bg-cover bg-center h-screen text-white" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container font-[Poppins] mx-auto h-full flex justify-around items-center">
                <div class=" px-20 flex flex-col">
                    <h1 class="text-5xl text-black font-bold mb-4">Selamat Datang di <span class="text-[#FF7D29]">UMAMI</span></h1>
                    <p class="text-lg mb-4 w-[600px] text-black">Di UMAMI, kami mengajak Anda untuk menjelajahi ragam kuliner yang kaya dan penuh cita rasa. Dari resep tradisional yang otentik hingga kreasi modern yang inovatif, kami menghadirkan berbagai inspirasi untuk memanjakan lidah Anda.</p>
                    <a href="" class="bg-[#FF7D29] px-5 py-1 rounded-2xl text-white w-20 ">Menu</a>
                </div>
                <div>
                    <img src="assets/img/food.png" class="w-[600px]" alt="">
                </div>
            </div>
        </section>
        <section id="maincourse" class="py-20 bg-[#FF7D29]">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8 text-[#FEFFD2] font-[Poppins]">Features</h2>
                <div class="inline-flex gap-8 px-6 font-[Poppins] font-semibold">
                    <div class="flex flex-col gap-3 justify-between rounded-xl p-6 bg-[#FEFFD2] shadow-md">
                        <img src="assets/img/appetizer.png" alt="" class="w-56">
                        <p>Appetizer</p>
                    </div>
                    <div class="flex flex-col gap-3 justify-between rounded-xl p-6 bg-[#FEFFD2] shadow-md">
                        <img src="assets/img/maincourse.png" alt="" class="w-56">
                        <p>Maincourse</p>
                    </div>
                    <div class="flex flex-col gap-3 justify-between rounded-xl p-6 bg-[#FEFFD2] shadow-md">
                        <img src="assets/img/cake.png" alt="" class="h-52 ">
                        <p>Dessert</p>
                    </div>
                    <div class="flex flex-col gap-3 items-center rounded-xl p-6 bg-[#FEFFD2] shadow-md">
                        <img src="assets/img/drink.png" alt="" class="w-56">
                        <p>Drink</p>
                    </div>
                    <div class="flex flex-col gap-3 justify-between rounded-xl p-6 bg-[#FEFFD2] shadow-md">
                        <img src="assets/img/maincourse.png" alt="" class="w-56">
                        <p>Lainnya</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="about" class="py-16 bg-[#FEFFD2]">
            <div class="flex flex-col mx-auto font-[Poppins] text-center">
                <h2 class="text-3xl font-bold mb-8">UMAMI</h2>
                <p class="text-lg w-[800px] mx-auto">Sistem atau platform yang dirancang untuk membantu para penggemar kuliner menemukan, membagikan, dan berinovasi dengan resep-resep makanan. Nama "Umami" diambil dari salah satu rasa dasar dalam masakan Jepang yang berarti "gurih" atau "lezat," yang mencerminkan misi platform ini untuk menyajikan pengalaman kuliner yang memuaskan dan beragam.</p>
            </div>
        </section>
    </main>
    <footer class="bg-gray-200 text-center py-4">
        <p>&copy; <?php echo date("Y"); ?> Your Company. All rights reserved.</p>
    </footer>

</body>
</html>