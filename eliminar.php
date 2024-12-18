<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELIMINAR PARENTESCO</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "listado"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['accion']) && $_POST['accion'] == 'eliminar') {
    $id = $_POST['id']; // Asegúrate de que el formulario incluya un campo para el ID

    $sql = "DELETE FROM familia WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

</body>
</html>