<?php

namespace app\Controllers;

class HomeController{
    public function index(){
        return $this->view("HomeView", ["title"=>"Home"]);
    }

    public function view($vista, $data=[]){
        extract(&$data);
        if(file_exists("../app/Views/$vista.php")){
            ob_start();
            include "../app/Views/$vista.php";
            $content = ob_get_clean();
            return $content;
        }
        else{
            echo "No se encontró la vista... ../app/Views/$vista.php";
        }
        echo "Hola desde la vista Home";
    }
}


?>