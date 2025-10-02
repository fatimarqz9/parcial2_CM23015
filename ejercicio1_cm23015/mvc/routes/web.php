<?php

use app\Controllers\HomeController;
use lib\Route;

Route::get("/", function(){
    return "RUTA RAIZ";
});


Route::dispatch();
?>