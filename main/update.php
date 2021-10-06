<?php
    session_start();
    require_once ("../model/crud.php");
    if($_SESSION['username'] == null){
        echo "<script>alert('Please login.')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();
    }
    if($_POST['nombre_producto'] != null && $_POST['referencia'] != null && $_POST['precio'] != null && $_POST['peso'] != null&& $_POST['categoria'] != null&& $_POST['stock'] != null){
        
        $result=update_product($_POST['nombre_producto'],$_POST['referencia'],$_POST['precio'],$_POST['peso'],$_POST['categoria'],$_POST['stock']);


     
        if( $result){
            echo "<script>alert('Actualizadoi exitósamente')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
        else{
            echo "<script>alert('No se pudo actualizar')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
    }
    else{
        echo "<script>alert('Por favor diligencia todos los campos')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
   
?>
