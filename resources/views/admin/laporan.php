<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | LAPORAN</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="<?= urlpath('assets/img/umami.png') ?>">
</head>
<body class="bg-[#FEFFD2] flex flex-col justify-center items-center mb-[5vh]">
    <header class="fixed top-0 left-0 w-full bg-[#FEFFD2] shadow-xl z-50">
        <div class=" mx-auto py-6 flex justify-between items-center">
            <div>
                <img src="<?= urlpath('assets/img/umami.png') ?>" class="w-24 mx-10" alt="Umami Logo">
            </div>
            <nav class="flex space-x-4">
                    <a href="<?= urlpath('index') ?>" class="text-black mx-4 focus-visible:text-orange-300 active:text-orange-300 hover:text-orange-300 navbar-links" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Home</a>
                <a href="#features" class="text-black focus-visible:text-orange-300 active:text-orange-300 navbar-links" id="link-features">Appetizer</a>
                <a href="#about" class="text-black navbar-links" id="link-about">Maincourse</a>
                <a href="#contact" class="text-black navbar-links" id="link-home">Dessert</a>
            </nav>
            <div class="inline-flex mx-8 items-center mr-3">
                <div class="w-10 h-9 flex bg-[#FF7D29] px-10 py-5 justify-center rounded-full items-center">
                    <p class="text-white"><?= $_SESSION['user']['username'] ?></p>
                </div>
                <a href="<?= urlpath('back') ?>" class="px-5 absolute top-[15vh] left-[5vh]">< Kembali</a>
                <a href="<?= urlpath('logout') ?>" class="ml-4 bg-[#FF7D29] px-4 py-1 text-lg rounded-2xl text-center text-white hover:bg-[#EB2A29]">Log Out</a>
            </div>
        </div>
    </header>
    <h1 class="mt-[15vh] text-5xl font-bold">LAPORAN JUMLAH ARTIKEL RESEP</h1>
    <div class="graphContainer w-[80%] bg-[#FF7D29] shadow-xl p-4 rounded-2xl mt-10" style="width: 80%; background-color: white; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); padding: 4px; border-radius: 20px;">
        <canvas id="myChart"></canvas>
    </div>
    <?php
        $kategori1 = [];
        $kategori2 = [];
        $kategori3 = [];
        $kategori4 = [];
        $kategori5 = [];
        foreach ($recipes as $recipe) {
            if ($recipe['category_id'] == 1) {
                $kategori1[] = $recipe;
            }
            elseif ($recipe['category_id'] == 2) {
                $kategori2[] = $recipe;
            }
            elseif ($recipe['category_id'] == 3) {
                $kategori3[] = $recipe;
            }
            elseif ($recipe['category_id'] == 4) {
                $kategori4[] = $recipe;
            }
            elseif ($recipe['category_id'] == 5) {
                $kategori5[] = $recipe;
            }
        }
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Semua Recipes', 'Recipes "Appetizer"', 'Recipes "Main Course"', 'Recipes "Dessert"', 'Recipes "Minuman"', 'Recipes "Lainnya"'],
                    datasets: [{
                        label: 'Jumlah Recipes',
                        data: [
                            <?php echo count($recipes); ?>, 
                            <?php echo count($kategori1); ?>, 
                            <?php echo count($kategori2); ?>, 
                            <?php echo count($kategori3); ?>, 
                            <?php echo count($kategori4); ?>, 
                            <?php echo count($kategori5); ?>
                        ],
                        backgroundColor: [
                            'lightblue',
                            'lightgreen',
                            'lightyellow',
                            'lightcoral',
                            'rgba(238,130,238)',
                            'lightgray'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 182, 193, 1)',
                            'rgba(211, 211, 211, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Debugging: Log data to console
            console.log({
                labels: ['Semua Recipes', 'Recipes "Appetizer"', 'Recipes "Main Course"', 'Recipes "Dessert"', 'Recipes "Minuman"', 'Recipes "Lainnya"'],
                data: [
                    <?php echo count($recipes); ?>, 
                    <?php echo count($kategori1); ?>, 
                    <?php echo count($kategori2); ?>, 
                    <?php echo count($kategori3); ?>, 
                    <?php echo count($kategori4); ?>, 
                    <?php echo count($kategori5); ?>
                ]
            });
        });
    </script>
</body>
</html>