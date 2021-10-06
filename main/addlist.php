<?php
    session_start();

    require_once ("../model/crud.php");
    if($_SESSION['username'] == null){
        echo "<script>alert('Please login.')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();

    }

    if($_POST['nombre_producto'] != null && $_POST['precio'] != null ){

        $result=add_product($_POST['nombre_producto'],$_POST['referencia'],$_POST['precio'],$_POST['peso'],$_POST['categoria'],$_POST['stock']);

     
        if($result){
            echo "<script>alert('Producto agregado con exito')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
        else{
            echo "<script>alert('Nose pudo agregar el producto.')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert('ingrese toda la informacion.')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
    
?>