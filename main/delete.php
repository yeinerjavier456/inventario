<?php
    session_start();
   
  
    //--- verificamos si e3xiste el usuario en la sesion

    if ($_SESSION['username'] == null){
        echo "<script>alert('Favor ingresar con tus credenciales')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();

    }
    require_once ("../model/crud.php");
    $row=delete_product($_GET['id']);
  
    if($row){
        echo "<script>alert('Eliminación de Producto Exitosa')</script>";        
        header("Refresh: 0 , url = ../list.php");
        exit();

    }
    else{
        echo "<script>alert('No se pudo eliminar producto')</script>";
        header("Refresh: 0 , url = ../list.php");
        exit();

    }
 
?>