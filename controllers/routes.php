<?php

include_once 'function/main.php';
include_once 'app/config/static.php';
include_once 'controllers/main.php';

Router::url('index', 'get', 'AuthController::index');
Router::url('restricted', 'get', 'AuthController::restricted');
Router::url('resep', 'get', 'AuthController::resep');
Router::url('resep', 'post', 'AuthController::comment');
Router::url('back', 'get', 'AuthController::back');

//auth
Router::url('login', 'get', 'AuthController::login');
Router::url('login', 'post', 'AuthController::sessionLogin');
Router::url('register', 'get', 'AuthController::register');
Router::url('register', 'post', 'AuthController::newRegister');
Router::url('logout', 'get', 'AuthController::logout');

//dashboard admin
Router::url('dashboard-admin', 'get', 'AdminController::index');
Router::url('dashboard-admin/laporan', 'get', 'AdminController::laporan');

//dashboard writer
Router::url('dashboard-writer', 'get', 'WriterController::index');
Router::url('dashboard-writer/show', 'get', 'WriterController::show');
Router::url('dashboard-writer/create', 'get', 'WriterController::create');
Router::url('dashboard-writer/create', 'post', 'WriterController::store');
Router::url('dashboard-writer/edit', 'get', 'WriterController::edit');
Router::url('dashboard-writer/edit', 'post', 'WriterController::update');
Router::url('dashboard-writer/delete', 'get', 'WriterController::delete');
// Router::url('dashboard-writer/store', 'post', 'WriterController::store');

// dashboard reader
Router::url('dashboard', 'get', 'ReaderController::index');

Router::url('/', 'get', function () {
    if (isset($_SESSION['user']['role_id']) == '2') {
        header('Location:' .BASEURL. 'dashboard-writer');
    } 
    elseif (isset($_SESSION['user']['role_id']) == '1') {
        header('Location:' .BASEURL. 'dashboard-admin');
    }
    elseif (isset($_SESSION['user']['role_id']) == '3') {
        header('Location:' .BASEURL. 'dashboard');
    }
    else {
        header('Location:' .BASEURL. 'index');
    }
});

// new Router();