<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Datos del Formulario</title>
    <link rel="stylesheet" href="style2.css">
</head>
<center>
<body>
    <?php
    //Recibir los datos por POST
    $nombre = $_POST["txtNombre"];
    $edad = $_POST["txtEdad"];
    $car = $_POST["selectCarrera"];

    echo "<h2>Tu nombre es $nombre y tu edad es $edad</h2>";
    echo "<br>";
    echo "<h2>Tu carrera es $car</h2>";
    ?>
</body>
</center>
</html>