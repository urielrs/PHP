<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>REGISTRO FAMILIAR</title>
</head>
<body>
    <center>
<div class="container">
    <h1>REGISTRO FAMILIAR</h1>

    <!-- Formulario para registrar -->
    <form action="registrar.php" method="post" enctype="multipart/form-data">
        <label for="nombre">NOMBRE:</label>
        <input type="text" id="nombre" name="nombre" required>

        <p>
        <label for="parentesco">PARENTESCO:</label>
        <input type="text" id="parentesco" name="parentesco" required>

        <p>
        <label for="foto">FOTO:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>

        <button type="submit" name="accion" value="registrar">REGISTRAR</button>
    </form>

    <!-- Formulario para eliminar -->
    <form action="eliminar.php" method="post">
        <label for="idEliminar">ID PARA ELIMINAR:</label>
        <input type="text" id="idEliminar" name="id" required>
        <button type="submit" name="accion" value="eliminar">ELIMINAR</button>
    </form>

    <!-- Formulario para ver listado familiar -->
    <form action="listado_familiar.php" method="post">
        <button type="submit" name="accion" value="listado_familiar">LISTADO FAMILIAR</button>
    </form>

    <!-- Formulario para modificar -->
    <form action="modificar.php" method="post">
        <label for="idModificar">ID PARA MODIFICAR:</label>
        <input type="text" id="idModificar" name="id" required>
        <button type="submit" name="accion" value="modificar">MODIFICAR</button>
    </form>
</center>
</div>
</body>
</html>
