<?php

include_once 'function/main.php';
include_once 'app/config/static.php';
include_once 'controllers/main.php';

Router::url('index', 'get', 'AuthController::index');
Router::url('restricted', 'get', 'AuthController::restricted');

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

// dashboard reader
Router::url('dashboard', 'get', 'ReaderController::index');

Router::url('/', 'get', function () {
    header('Location: index');
});

// new Router();