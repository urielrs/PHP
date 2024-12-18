<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "listado";  // Asegúrate de que la base de datos sea la correcta

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado y si el valor de 'accion' es 'registrar'
if (isset($_POST['accion']) && $_POST['accion'] == 'registrar') {
    $nombre = $_POST['nombre'];
    $parentesco = $_POST['parentesco'];

    // Subir imagen
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    
    // Verificar si la imagen se subió correctamente
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        // Imagen subida correctamente
        $foto = basename($_FILES["foto"]["name"]);

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO familia (nombre, parentesco, foto) VALUES ('$nombre', '$parentesco', '$foto')";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error al subir la imagen.";
    }
}

$conn->close();
?>

</body>
</html>