<?php

include_once 'function/main.php';
include_once 'app/config/static.php';
include_once 'controllers/main.php';

Router::url('index', 'get', 'AuthController::index');

//auth
Router::url('login', 'get', 'AuthController::login');
Router::url('login', 'post', 'AuthController::sessionLogin');
Router::url('register', 'get', 'AuthController::register');
Router::url('register', 'post', 'AuthController::newRegister');
Router::url('logout', 'get', 'AuthController::logout');

//dashboard admin
Router::url('dashboard-admin', 'get', 'AdminController::index');

Router::url('/', 'get', function () {
    header('Location: index');
});

// new Router();