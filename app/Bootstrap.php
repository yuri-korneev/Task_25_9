<?php

namespace App;



require_once 'core' . DIRECTORY_SEPARATOR . 'config.php';

require_once 'core/model.php'; 
require_once 'core/view.php'; 
require_once 'core/controller.php'; 

require_once 'core/route.php'; 

require_once './vendor/autoload.php'; 

require_once 'data/DB.php';

session_start();

core\Route::start(); // запускаем маршрутизатор

?>