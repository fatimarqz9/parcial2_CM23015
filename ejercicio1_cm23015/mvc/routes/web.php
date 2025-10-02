<?php

use app\Controllers\HomeController;
use lib\Route;

Route::get("/", [HomeController::class, "index"]);

?>