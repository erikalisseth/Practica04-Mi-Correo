<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Gestion de Usuarios</title>

</head>

<body>
    <section>
        <header>

            <table style="width:50%" border>
                <tr>
                    <th><a href="../../../config/cerra_sesion.php">Inicio</a></th>
                    <th><a href="index.php">Usuarios</a></th>
                </tr>

            </table>

            <a href="../../../config/cerra_sesion.php">Cerrar cesion</a>

        </header>
    </section>
    <div>
        <table style="width:100%" border>
            <tr>
                <th>FECHA</th>
                <th>DESTINATARIO</th>
                <th>REMITENTE</th>
                <th>ASUNTO</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>

            </tr>
            <?php
            include '../../../config/conexionBD.php';
            $cone = $_GET["cone"];
            echo $cone;
            $sql = "SELECT * FROM mensaje ORDER BY men_fecha DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "   <td>" . $row["men_fecha"] . "</td>";
                    echo "   <td>" . $row['men_destinatario'] . "</td>";
                    echo "   <td>" . $row['men_remitente'] . "</td>";
                    echo "   <td>" . $row['men_asunto'] . "</td>";
                    echo "   <td>" . "<a >Eliminar</a>" . "</td>";
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