<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart.js Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
</head>
<body class="bg-[#FF7D29]">
    <div class="graphContainer w-[80%] bg-[#FF7D29] shadow-xl p-4 rounded-2xl flex items-center mt-20 ml-20" style="width: 80%; background-color: white; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); padding: 4px; border-radius: 20px;">
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