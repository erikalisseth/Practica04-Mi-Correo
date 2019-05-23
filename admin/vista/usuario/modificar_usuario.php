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
        <h1>MODIFICAR DATOS</h1>
    </header>
    
    <?php
    $codigo = $_GET["codigo"];
    echo "$codigo";
    session_start();
    include '../../../config/conexionBD.php';
    echo "</br>";
    $sql = "SELECT * FROM usuario WHERE usu_codigo = '$codigo' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formulario01" method="POST" action="../../controladores/controlador_modificar.php">

                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

                <label for="cedula">Cedula (*)</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" required placeholder="Ingrese la cedula ..." />
                <br>

                <label for="nombres">Nombres (*)</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" required placeholder="Ingrese los dos nombres ..." />
                <br>

                <label for="apellidos">Apelidos (*)</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" required placeholder="Ingrese los dos apellidos ..." />
                <br>

                <label for="direccion">Dirección (*)</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" required placeholder="Ingrese la dirección ..." />
                <br>

                <label for="telefono">Teléfono (*)</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" required placeholder="Ingrese el teléfono ..." />
                <br>

                <label for="fecha">Fecha Nacimiento (*)</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required placeholder="Ingrese la fecha de nacimiento ..." />
                <br>

                <label for="correo">Correo electrónico (*)</label>
                <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required placeholder="Ingrese el correo electrónico ..." />
                <br>
                <input type="submit" id="modificar" name="modificar" value="Modificar" />
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