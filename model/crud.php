<?php

    /// para el login de usuario
    function login($username,$password){

        require_once "./Database/Database.php";

        $username = mysqli_real_escape_string($conn,$username);
        $password = mysqli_real_escape_string($conn,md5($password));

        ///  creamos el query
        $sql = "SELECT username,password FROM user WHERE username ='". $username ."' and password = '".$password."'";
        //--- enviamos la query a la base de datos
        $query = mysqli_query($conn,$sql);
        //--- obtenemos el resultado
        $result = mysqli_fetch_array($query , MYSQLI_ASSOC);

        if(!$result){
            //--- cerramos la conexion 
            mysqli_close($conn);
            return false;

        }
        else{
            return $result;
        
        }
    }

    //--- para eliminar un producto
    function  delete_product($delete_num){
        require_once "../Database/Database.php";

        $sql_delete =  "DELETE FROM product WHERE id = '$delete_num'";
        $query_delete = mysqli_query($conn,$sql_delete);
      
        if($query_delete){
            mysqli_close($conn);
            return true;
        }
        else{
            mysqli_close($conn); 
            return false;
            
        }
        
    }

    function add_product($nombre_producto,$referencia,$precio,$peso,$categoria,$stock){
        require_once "../Database/Database.php";
        
        $sql = "INSERT INTO product (nombre_producto,referencia,precio,peso,categoria,stock) VALUES ('". trim($nombre_producto). "','". trim($referencia)."','". trim($precio)."','". trim($peso)."','". trim($categoria)."','". trim($stock). "')";
        if($conn->query($sql)){
            mysqli_close($conn);
            return true;
        }else{
            mysqli_close($conn);
            return false;
        }

    }
    function update_product($nombre_producto,$referencia,$precio,$peso,$categoria,$stock){

        require_once "../Database/Database.php";

        $sql = "UPDATE product SET nombre_producto = '" . trim($nombre_producto) . "' ,referencia = '" . trim($referencia) . "' ,precio = '" . trim($precio) . "' ,peso = '" . trim($peso) . "' ,categoria = '" . trim($categoria) . "' ,stock = '" . trim($stock) . "' WHERE id = '" . $_POST['id'] . "'";

        if($conn->query($sql)){
             mysqli_close($conn);
            return true;
        }
        else{
            mysqli_close($conn);
            return false;

        }
    }

    function get_products(){
        require_once "./Database/Database.php";
        $sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
        $query = mysqli_query($conn, $sql_fetch_todos);
        return $query;
    }


?>