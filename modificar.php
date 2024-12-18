<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "listado";  

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si se ha enviado un id por POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Obtener los datos del registro que se va a modificar
    $sql = "SELECT * FROM familia WHERE id = $id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Obtener los datos del registro
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'];
        $parentesco = $row['parentesco'];
        $foto_actual = $row['foto']; // Foto actual
    } else {
        echo "No se encontraron registros con ese ID.";
        exit;
    }
} else {
    echo "ID no proporcionado.";
    exit;
}

// Procesar la actualización del registro si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'modificar') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $parentesco = $_POST['parentesco'];

    // Subir nueva imagen si fue seleccionada
    $foto = $foto_actual; // Por defecto, mantener la foto actual
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $foto = basename($_FILES["foto"]["name"]);
        } else {
            echo "Error al subir la imagen.";
        }
    }

    // Actualizar los datos en la base de datos
    $sql = "UPDATE familia SET nombre = '$nombre', parentesco = '$parentesco', foto = '$foto' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro modificado exitosamente.";
    } else {
        echo "Error al modificar el registro: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro Familiar</title>
</head>
<body>
<div class="container">
    <h1>Modificar Registro Familiar</h1>
    <!-- Formulario para modificar el registro -->
    <form action="modificar.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>

        <label for="parentesco">Parentesco:</label>
        <input type="text" id="parentesco" name="parentesco" value="<?php echo $parentesco; ?>" required>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*">

        <button type="submit" name="accion" value="modificar">Modificar</button>
    </form>
</div>
</body>
</html>

<?php
// Cerrar la conexión después de procesar todo
$conn->close();
?>
