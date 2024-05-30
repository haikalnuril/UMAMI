<?php

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UMAMI | LOGIN</title>
    </head>
    <body>
    
    <form action="<?= urlpath('login')?>" method="post">
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="" placeholder="youremail@example.com" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="" placeholder="********" required>
        </div>
        <button type="submit" class="">login</button>
        <p>
            Belum punya akun? <a href="<?= urlpath('register')?>" class="">Daftar Sekarang</a>
        </p>
    </form>
</body>
</html>