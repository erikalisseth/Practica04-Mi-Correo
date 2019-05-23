<!DOCTYPE html>
<html lang="es">

<head>
    <!--  Practica01 – Mi Blog  
          Author: Malki Yupanki  
          Date:   Abril 2019 -->
    <meta charset="utf-8" />
    <title>Insertar</title>
    <link href="css/estilousuario.css" rel="stylesheet" type="text/css" />
    <!--   <link href="css/estilo.css" rel="stylesheet" type="text/css"/>-->

</head>

<body>
    <header>
        <h1>Eliminar Usuarios</h1>
    </header>
    <?php
    session_start();
    
    $cedula = $_GET["codigo"];
    echo "$cedula";
    include '../../../config/conexionBD.php';
    echo "</br>";
    $sql = "SELECT * FROM usuario WHERE usu_codigo = '$cedula' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formulario01" method="POST" action="../../controladores/controlador_eliminar.php">

                <input type="hidden" id="codigo" name="codigo" value="<?php echo $cedula ?>" />

                <label for='cedula'>Cedula (*)</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled />
                <br>
                <label for='nombres'>Nombres (*)</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled />
                <br>

                <label for="apellidos">Apelidos (*)</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled />
                <br>

                <label for="direccion">Dirección (*)</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled />
                <br>
                <label for="telefono">Teléfono (*)</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled />
                <br>
                <label for="fecha">Fecha Nacimiento (*)</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled />
                <br>
                <label for="correo">Correo electrónico (*)</label>
                <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled />
                <br>
                <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
            </form>


        <?php

    }
} else {
    echo " <p> colspan='10'> EROORRRRR!!!!!! </p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}

$conn->close();
?>



</body>