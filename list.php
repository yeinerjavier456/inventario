<?php
session_start();
require_once "./model/crud.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('por favor inicia sesion.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];

$query =get_products();

?>
<!doctype html>
<html lang="en">

<head>
    <title>Lista de Productos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="faviconconfiguroweb.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/list.css">
</head>
<body>
    <div class="header">
        <h3>Productos </h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1>Lista de Productos</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="table-product">
        <table>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre:Producto</th>
                <th scope="col">referencia</th>
                <th scope="col">Precio</th>
                <th scope="col">peso</th>
                <th scope="col">categoria</th>
                <th scope="col">stock</th>
                <th scope="col">Fecha:Creacion</th>
                <th scope="col">Fecha:venta</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nombre_producto'] ?></td>
                        <td><?php echo $row['referencia'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <td><?php echo $row['peso'] ?></td>
                        <td><?php echo $row['categoria'] ?></td>
                        <td><?php echo $row['stock'] ?></td>
                        <td class="timeregis"><?php echo $row['time_create'] ?></td>
                        <td class="timeregis"><?php echo $row['fecha_venta'] ?></td>
                        <td class="modify"><a name="edit" id="" class="bfix" href="fix.php?id=<?php echo $row['id'] ?>&message=<?php echo $row['nombre_producto'] ?>&amount=<?php echo $row['stock']; ?> " role="button">
                                Editar
                            </a></td>
                        <td class="delete"><a name="id" id="" class="bdelete" href="main/delete.php?id=<?php echo $row['id'] ?>" role="button">
                                Eliminar
                            </a></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <a name="" id="" class="Addlist" style="float:right" href="addlist.php" role="button">Agregar Producto</a>
    </div>
   
</body>

</html>