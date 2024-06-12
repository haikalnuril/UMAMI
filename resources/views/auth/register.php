<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMAMI | REGISTER</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('assets/img/background.png'); /* Replace with your image URL */
            background-size: cover;
        }
    </style>
</head>
<body class="font-[Poppins] flex items-center justify-center w-screen h-screen">
    <div class="inline-flex rounded-lg shadow-2xl border-4 border-opacity-10 border-black w-[1000px] h-[500px]">
        <div class="relative w-[342px] h-[500px] flex flex-col justify-around">
            <img src="assets/img/steak.png" alt="" class="h-[400px] w-[300px] -right-1 absolute drop-shadow-2xl">
        </div>
        <div class="w-[650px] h-[500px] flex flex-col justify-center">
            <h2 class="text-2xl font-semibold text-[#FF7D29] mb-6 text-center">Register</h2>
            <form action="<?= urlpath('register') ?>" method="POST" id="registerForm" class="space-y-3 flex flex-col items-center">
                <div class=" space-x-2 w-[26vw] ml-9">
                    <label for="username">username</label>
                    <input id="username"  name="username" type="username" autocomplete="username" required placeholder="Username" class="w-64 px-3 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class=" space-x-2 w-[26vw] ml-28">
                    <label for="email">Email</label>
                    <input id="email"  name="email" type="email" autocomplete="email" required placeholder="email@example.com" class="w-64 px-3 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="space-x-2 w-[30vw] ml-28">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Password" class="w-64 px-3 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <!-- <div class="space-x-2 w-[39vw] ml-28 ">
                        <label for="password">Confirm Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Password" required class="w-64 px-3 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div> -->
                </div>
                <div>
                    <div class="inline-flex items-center space-x-2 w-[31.5vw]">
                        <label for="role_id" class="">Ingin Mendaftar sebagai Apa?</label>
                        <select id="role_id" name="role_id" class="w-40 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#FF7D29] focus:border-[#FF7D29]">
                            <option value="3">Pembaca</option>
                            <option value="2">Penulis</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="button" id="submit2" class="w-64 flex justify-center py-2 px-4 border border-[#FF7D29] rounded-lg shadow-sm text-sm font-medium mx-auto text-white bg-[#FF7D29] hover:bg-[#FEFFD2] hover:text-[#FF7D29] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF7D29]">
                        Daftar
                    </button>
                </div>
                <div class="text-sm text-center mt-4">
                    Sudah Punya Akun? <a href="<?= urlpath('login') ?>" class="font-medium text-[#FF7D29] hover:text-[#EB2A29]">Login</a>
                </div>
            </form>
        </div>
    </div>

    
</body>
</html>

<script>
    $(document).ready(function() {
    function sendDataToBackend() {

        var form = document.getElementById('registerForm');
        var formData = new FormData(form);

        
        console.log("Sending data to backend..."); // Debug statement
        console.log("Form Data:", formData); // Debug statement

        $.ajax({
            type: 'POST',
            url: '<?= urlpath('register') ?>', // Construct URL dynamically
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                window.location.href = '<?= urlpath('login') ?>' ; // Redirect dynamically
                alert('Berhasil Membuat Akun!');
            },
            error: function(xhr, status, error) {
                console.error("Error:", xhr.responseText); // Debug statement
                try {
                    var response = JSON.parse(xhr.responseText);
                    alert(response.message);
                } catch (e) {
                    alert("Terjadi kesalahan, mohon coba lagi");
                }
            }
        });
    }

    $('#submit2').click(function(){
        console.log("Submit button clicked"); // Debug statement
        sendDataToBackend();
    }); // Attach event handler
    });

    $(document).ready(function() {
        $('#registerForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Bagian ini harus diisi",
                    email: "Silahkan masukkan Email yang valid"
                },
                username: {
                    required: "Bagian ini harus diisi"
                },
                password: {
                    required: "Password harus diisi"
                }
            },
            errorElement: "div",
            errorPlacement: function(error, element) {
                error.addClass('text-red-500 text-xs');
                error.insertAfter(element.parent());
            },
            highlight: function(element, errorClass, validClass) {
                $(element)
                    .addClass('border-red-500 focus:ring-red-500 focus:border-red-500')
                    .removeClass('border-gray-300 dark:border-gray-600 focus:border-red-600 dark:focus:border-red-500');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element)
                    .removeClass('border-red-500 focus:ring-red-500 focus:border-red-500')
                    .addClass('border-gray-300 dark:border-gray-600 focus:border-red-600 dark:focus:border-red-500');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>