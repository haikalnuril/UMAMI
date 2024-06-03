<?php

include_once 'function/main.php';
include_once 'app/config/static.php';
include_once 'controllers/main.php';

Router::url('index', 'get', 'AuthController::index');
Router::url('restricted', 'get', 'AuthController::restricted');
Router::url('resep', 'get', 'AuthController::resep');

//auth
Router::url('login', 'get', 'AuthController::login');
Router::url('login', 'post', 'AuthController::sessionLogin');
Router::url('register', 'get', 'AuthController::register');
Router::url('register', 'post', 'AuthController::newRegister');
Router::url('logout', 'get', 'AuthController::logout');

//dashboard admin
Router::url('dashboard-admin', 'get', 'AdminController::index');

//dashboard writer
Router::url('dashboard-writer', 'get', 'WriterController::index');
Router::url('dashboard-writer/show', 'get', 'WriterController::show');
Router::url('dashboard-writer/create', 'get', 'WriterController::create');
Router::url('dashboard-writer/create', 'post', 'WriterController::store');
Router::url('dashboard-writer/delete', 'get', 'WriterController::delete');
// Router::url('dashboard-writer/store', 'post', 'WriterController::store');

// dashboard reader
Router::url('dashboard', 'get', 'ReaderController::index');

Router::url('/', 'get', function () {
    if (isset($_SESSION['user']['role_id']) == '2') {
        header('Location: dashboard-writer');
    } 
    elseif (isset($_SESSION['user']['role_id']) == '1') {
        header('Location: dashboard-admin');
    }
    elseif (isset($_SESSION['user']['role_id']) == '3') {
        header('Location: dashboard');
    }
    else {
        header('Location: index');
    }
});

// new Router();