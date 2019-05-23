<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Insertar</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include '../../config/conexionBD.php';
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellido"]) ? mb_strtoupper(trim($_POST["apellido"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $fecha_nac = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

    $sql = " INSERT INTO usuario VALUES(0,'$cedula','$nombres','$apellidos','$direccion','$telefono',
    '$correo',MD5('$contrasena'),'$fecha_nac','N',null,null)";

if ($conn->query($sql) === TRUE) {
    echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
    } else {
    if($conn->errno == 1062){
    echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
    }else{
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }
    }
   
    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
   
    ?>
   </body>
   </html>