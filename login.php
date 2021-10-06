<?php
    //--- verificamos los campos que no vengan vacios
    if(trim($_POST['username'])== null|| trim($_POST['password']) == null){
        echo "<script>alert('Por favor diligencia todos los campos.')</script>";
        header("Refresh:0 , url =  index.html");
        exit();

    }
    else{
        include ("./model/crud.php");

        /// recuperamos los campos
         $username = $_POST['username'];
         $password =$_POST['password'];
         //--- verificamos los datos en la base de datos
         $result=login( $username,$password);

         //--- si tenemos resultado entonces 
         if($result){
             //--- creamos la sesion de usuario
            session_start();
            $_SESSION['username'] = $result['username'];
            //--- redirigimos 
            header("Location: list.php");
            session_write_close();
         }else{
             //-- si no hay conincidencia avisamos al usuario
            echo "<script>alert('Usuario o Contraseña Inválida')</script>";
            header("Refresh:0 , url = logout.php");
            exit();
         }
       
    }
   
?>