<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>MI_CUENTA</title>
    <link href="css/estilousuario.css" rel="stylesheet" type="text/css" />
   
</head>

<body>
    <header>
        <h1>MI CUENTA</h1>
    </header>
    <?php
    session_start();
    echo "mensaje -----";
    $cone = $_GET["cone"];
    echo $cone;
    $codi = $_GET["codigo"];
    echo $codi;
    include '../../config/conexionBD.php';
    echo "</br>";
    $sql = "SELECT * FROM mensaje WHERE men_codigo = '$codi' AND men_destinatario = '$cone'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>

            <form id="formulario01" method="POST" action="../../controladores/controlador_eliminar.php">

                <input type="hidden" id="codigo" name="codigo" value="<?php echo $cedula ?>" />

                <label for="Fecha">Fecha (*)</label>
                <input type="text" id="fecha" name="fecha" value="<?php echo $row["men_fecha"]; ?>" disabled />
                <br>

                <label for='Remitente'>Remitente (*)</label>
                <input type="text" id="remitente" name="remitente" value="<?php echo $row["men_remitente"]; ?>" disabled />
                <br>
                <label for='Asunto'>Asunto (*)</label>
                <input type="text" id="asunto" name="asunto" value="<?php echo $row["men_asunto"]; ?>" disabled />
                <br>

                

                <label for="Contenido">Mensjae (*)</label>
                <input type="text" id="contenido" name="contenido" value="<?php echo $row["men_contenido"]; ?>" disabled />
                <br>
                
         
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