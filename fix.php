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
    <title>Editar Producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="dp.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./assets/css/fix.css">
</head>
<body>
    <div class="header">
        <h3>Editar Productos</h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1>Lista de Productos</h1>
        <h2>Has accedido como <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="table-product">
        <table class="table">
            <thead class="thead-dark">
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
               
                </tr>
            </thead>
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
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
    </div>
    <div class="fixproduct">
        <form method="POST" action="main/update.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de Producto</label>
                    <br>
                    <input type="text" class="form-control" name="nombre_producto" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">referencia</label>
                    <br>
                    <input type="text" class="form-control" name="referencia" required> 
                </div> 
                <div class="form-group">
                    <label for="exampleInputPassword1">categoria</label>
                    <br>
                    <input type="text" class="form-control" name="categoria" required> 
                </div> 
                <div class="form-group">
                    <label for="exampleInputPassword1">Precio</label>
                    <br>
                    <input type="number" class="form-control" name="precio" required> 
                </div> 
                <div class="form-group">
                    <label for="exampleInputPassword1">peso</label>
                    <br>
                    <input type="number" class="form-control" name="peso" required> 
                </div> 
               
                <div class="form-group">
                    <label for="exampleInputPassword1">stock</label>
                    <br>
                    <input type="number" class="form-control" name="stock" required> 
                </div> 
            <br>
            <div class="form-button">
                <button type="submit" class="modify" style="float:right">Actualizar</button>
                <a name="" id="" class="return" href="list.php" role="button" style="float:left">Volver</a>
            </div>
        </form>
    </div>
   
</body>
</html>