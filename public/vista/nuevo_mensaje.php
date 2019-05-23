<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Mensaje</title>
    <link href="css/estilousuario.css" rel="stylesheet" type="text/css" />

</head>

<body id="bota">

    <?php
    $cone = $_GET["cone"];
    //echo $cone;
    ?>
    <header>
        <h1>NUEVO MENSAJE</h1>
    </header>
    <div>
        <table style="width:50%" border>
            <tr>
                <th><a href="../../admin/vista/usuario/index_usuario.php?cone='<?php echo $cone; ?>'">ATRAS</a></th>
            </tr>

        </table>
    </div>
    <form action="controlador_mensaje.php" method="POST">

        <legend>Mensaje (*)</legend>

        <input type="hidden" id="remitente" name="remitente" value="<?php echo $cone ?>" />

        <label id="Destinatario">Para :</label>
        <input type="text" name="destinatario" />
        <br>
        <label id="Asunto">Asunto :</label>
        <input type="text" name="asunto" />
        <br>
        <label id="Mensaje">Mensaje</label>
        <input type="text" name="mensaje" />
        <br>

        <input class="btn" id="guargar" name="guardar" type="submit" value="Eniviar">&nbsp;
        <input class="btn" id="borrar" name="borrar" type="Reset" value="Borrar">

    </form>
</body>

</html>