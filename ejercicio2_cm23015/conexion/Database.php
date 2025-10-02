<?php

class Database{

    private $host = "db";

    private $dbname = "alumno";

    private $username = "root";

    private $password = "rootpass";

    public $conn;


    public function getConnection(){
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=". $this->host . ";dbname= " . $this->dbname, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->set_Attribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conectado";
        } catch (PDOException $exception) {
            echo "Error de conexión ", $exception->get_message();
        }
        return $this->conn;
    }


}


$db = new Database();

$conn_temp = $db->getConnection();

$stmt = $conn_temp->prepare();




?>