<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
    <section class="content-form">
        <h2>Formularios con PHP</h2>
        <form id="php" action="procesar-form.php" method="post">
            <input type="text" placeholder="Nombre" name="txtNombre" required>
            <input class="cajas-texto" type="number" placeholder="Edad" name="txtEdad" required>
            <select id="cmbCarrera" size="1" name="selectCarrera">
                <option>--Seleccione Carrera--</option>
                <option value="Ing.Sistemas Computacionales">Ing.Sistemas Computacionales</option>
                <option value="Ing.Mecatronica">Ing.Mecatronica</option>
                <option value="Ing.Logistica">Ing.Logistica</option>
                <option value="Ing.Industrial">Ing.Industrial</option>
                <option value="Ing.Civil">Ing.Civil</option>
            </select>
            <button id="botones" type="submit">Registrar</button>
            <button id="botones" type="button">Nuevo</button>
        </form>
    </section>
    </center>
</body>
</html>
