<?php

include_once 'models/users.php';
include_once 'function/main.php';
include_once 'app/config/static.php';
include_once 'models/recipes.php';

class WriterController{
    static function index(){
        $user = $_SESSION['user'];
        $user_role = $user['role_id'];
        if($user_role == '2'){
            view('writer/index', ['url' => 'dashboard-writer', 'recipes' => Recipe::select($_SESSION['user']['id']), 'users' => User::select($_SESSION['user']['id']), 'categories' => Category::select($_SESSION['user']['id'])]);
        }else{
            header('location: restricted');
        }
    }

    static function show(){
        $user_role = $_SESSION['user']['role_id'];
        if($user_role == '2'){
            view('writer/show', ['url' => 'dashboard-writer/show', 'shows' => Recipe::show($_SESSION['user']['username']), 'category' => Category::select($_SESSION['user']['id'])]);
        }
        elseif($user_role == '1'){
            header('location:' .BASEURL. 'dashboard-admin');
            // view('admin/dashboard', ['url' => 'dashboard-admin', 'recipes' => Recipe::select($_SESSION['user']['id']), 'users' => User::select($_SESSION['user']['id']), 'categories' => Category::select($_SESSION['user']['id'])]);
        }
        elseif($user_role == '3'){
            header('location:' .BASEURL. 'dashboard');
            // view('dashboard', ['url' => 'dashboard', 'recipes' => Recipe::select($_SESSION['user']['id']), 'users' => User::select($_SESSION['user']['id']), 'categories' => Category::select($_SESSION['user']['id'])]);
        }
        else{
            view('restricted');
        }
    }
    static function create(){
        view('writer/create', ['url' => 'dashboard-writer/create', 'categories' => Category::select($_SESSION['user']['id'])]);
    }

    static function store(){
        if (!isset($_SESSION['user'])) {
            header('Location: login');
        }else{
            $post = array_map('htmlspecialchars', $_POST);
            // var_dump($post);
            // echo "<script>console.log('Debug Objects:  test' );</script>";
            if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                $gambarName = $_FILES['gambar']['name'];
                $gambarTmpName = $_FILES['gambar']['tmp_name'];
                $gambarSize = $_FILES['gambar']['size'];
                $gambarType = $_FILES['gambar']['type'];
    
                // Check if the uploaded file is an image
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!in_array($gambarType, $allowedTypes)) {
                    setFlashMessage('error', 'File yang diupload harus berupa gambar');
                    return;
                }
    
                // Define the directory to save the uploaded image
                $uploadDir = __DIR__ . '/../assets/images/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
    
                // Generate a new unique file name with current timestamp
                $timestamp = time();
                $fileExtension = pathinfo($gambarName, PATHINFO_EXTENSION);
                $newFileName = basename($gambarName, ".$fileExtension") . "_" . $timestamp . ".$fileExtension";
                $gambarPath = $uploadDir . $newFileName;
    
                // Move the uploaded image to the specified directory
                if (move_uploaded_file($gambarTmpName, $gambarPath)) {
                    $post['gambar'] = $newFileName; // Store only the file name in the database
                } else {
                    echo 'Gagal mengupload gambar';
                    return;
                }
            } else {
                echo 'Terjadi kesalahan saat mengupload gambar';
                return;
            }

            $recipe = Recipe::insert(
                $post['judul'],
                $post['slug'],
                $_SESSION['user']['id'],
                $post['alat'],
                $post['langkah'],
                $post['category_id'],
                $post['gambar']
            );
            // urlpath('dashboard-writer/show');
            // view('writer/show', ['url' => 'dashboard-writer/show', 'shows' => Recipe::show($_SESSION['user']['username']), 'category' => Category::select($_SESSION['user']['id'])]);
            
            if ($recipe) {
                header('Location:' .BASEURL. 'dashboard-writer/show');
                // header('Location: dashboard-writer/show');
                exit();
            }else{
                echo ('Terjadi Kesalahan');
            }
        }
    }
    static function edit(){
        view('writer/edit', ['url' => 'dashboard-writer/edit', 'recipe' => Recipe::finds($_GET['slug']), 'users' => User::select($_SESSION['user']['id']), 'categories' => Category::select($_SESSION['user']['id'])]);
    }
    static function update(){
        if (!isset($_SESSION['user'])) {
            header('Location: login');
        }else{
            

            // var_dump($recipe['slug']);
            $post = array_map('htmlspecialchars', $_POST);
            $oldSlug = $_POST['oldSlug'];
            $currentImageName = recipe::getImageName($oldSlug);

            if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                $gambarName = $_FILES['gambar']['name'];
                $gambarTmpName = $_FILES['gambar']['tmp_name'];
                $gambarSize = $_FILES['gambar']['size'];
                $gambarType = $_FILES['gambar']['type'];
    
                // Check if the uploaded file is an image
                $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!in_array($gambarType, $allowedTypes)) {
                    setFlashMessage('error', 'File yang diupload harus berupa gambar');
                    return;
                }
    
                // Define the directory to save the uploaded image
                $uploadDir = __DIR__ . '/../assets/images/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
    
                // Generate a new unique file name with current timestamp
                $timestamp = time();
                $fileExtension = pathinfo($gambarName, PATHINFO_EXTENSION);
                $newFileName = basename($gambarName, ".$fileExtension") . "_" . $timestamp . ".$fileExtension";
                $gambarPath = $uploadDir . $newFileName;
    
                // Delete the old image if it exists
                if (!empty($currentImageName)) {
                    $oldImagePath = $uploadDir . $currentImageName;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
    
                // Move the uploaded image to the specified directory
                if (move_uploaded_file($gambarTmpName, $gambarPath)) {
                    $post['gambar'] = $newFileName; // Store only the file name in the database
                } else {
                    echo 'Gagal mengupload gambar';
                    return;
                }
            } else {
                // If no new image is uploaded, keep the current image name
                $post['gambar'] = $currentImageName;
            }
            $recipe = Recipe::update(
                $post['judul'],
                $post['slug'],
                $_SESSION['user']['id'],
                $post['alat'],
                $post['langkah'],
                $post['category_id'],
                $post['gambar']
            );
            if ($recipe) {
                header('Location:' .BASEURL. 'dashboard-writer/show');
                exit();
            } else {
                echo ('Terjadi Kesalahan');
            }
        }
    }
    static function delete(){
        $post = array_map('htmlspecialchars', $_POST);
        $id = $_GET['id'];
        $recipe = Recipe::destroy($id);
        if ($recipe) {
            header('Location:' .BASEURL. 'dashboard-writer/show');
            exit();
        } else {
            echo ('Terjadi Kesalahan');
        }
    }
}