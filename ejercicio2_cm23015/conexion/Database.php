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
            $this->conn = new PDO("mysql:host=". $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "conectado";
        } catch (PDOException $exception) {
            echo "Error de conexión ", $exception->get_message();
        }
        return $this->conn;
    }


}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario para crear estudiante</h1>
    <form method="post">
        <label for="nombre">Ingrese el nombre del estudiante: </label>
        <input type="text" name="nombre" ><br>
        <label for="telefono">Ingrese el numero de telefono del estudiante: </label>
        <input type="text" name="telefono" ><br>
        <label for="fechaNacimiento">Ingrese la fecha de nacimiento del estudiante: </label>
        <input type="text" name="fechaNacimiento" ><br>
        <label for="direccion">Ingrese la direccion del estudiante: </label>
        <input type="text" name="direccion" ><br>
        <button type="submit">Crear Formulario</button>
    </form>


    
</body>
</html>

<?php
if($_POST)
{
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $direccion = $_POST["direccion"];

    $db = new Database();

    $conn_temp = $db->getConnection();
    
        $stmt = $conn_temp->prepare("INSERT INTO estudiante(nombre, telefono, fechaNacimiento, direccion) VALUES (:nombre, :telefono, :fechaNacimiento, :direccion)");
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":fechaNacimiento", $fechaNacimiento);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->execute();


        

        $mensajeExito = "<p style='color:green;> Estudiante creado con exito</p>"; 
    


}

?>

