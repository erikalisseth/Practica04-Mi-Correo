<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>

</head>

<body>
    <header>
        <section>
            <table style="width:50%" border>
                <tr><th>Inicio</th>
                <th>Nuevo Mensaje</th>
                <th>Mensajes Enviados</th>
                <th>Mi Cuenta</th></tr>

            </table>
        </section>

        <section>
            <a href='../../../public/vista/login.html'>Cerrar cesion</a>
        </section>
    </header>
    <div >
        <table style="width:100%" border>
            <tr>
                <th>CEDULA</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>CORREO</th>
                <th>FECHA_NACIMINETO</th>
                <th>ELIMINAR</th>
                <th>MODIFICAR</th>
                <th>CAMBIAR_CONTRASEÑA</th>
            </tr>
            <?php
            include '../../../config/conexionBD.php';
            $sql = "SELECT * FROM usuario";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";    echo "   <td>" . $row["usu_cedula"] . "</td>";    
                    echo "   <td>" . $row['usu_nombres'] ."</td>";    
                    echo "   <td>" . $row['usu_apellidos'] . "</td>";    
                    echo "   <td>" . $row['usu_direccion'] . "</td>";    
                    echo "   <td>" . $row['usu_telefono'] . "</td>";    
                    echo "   <td>" . $row['usu_correo'] . "</td>";                                    
                    echo "   <td>" . $row['usu_fecha_nacimiento'] . "</td>";       
                    echo "   <td> <a href='eliminar_usuario.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";    
                    echo "   <td> <a href='modificar_usuario.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";    
                    echo "   <td> <a href='modificar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";    
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo " <td colspan='10'> No existe Usuarios </td>";
                echo "</tr>";
            }

            $conn->close();

            ?>
        </table>
    </div>
</body>

</html>