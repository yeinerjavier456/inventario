<?php
    function table(){
        session_start();
        require_once "./Database/Database.php";
        require_once "./model/crud.php";
        if ($_SESSION['username'] == null) {
            echo "<script>alert('Please login.');</script>";
            header("Refresh:0 , url=index.html");
            exit();
        }
        $username = $_SESSION['username'];
        $query = get_productos();
        $sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
        $query = mysqli_query($conn, $sql_fetch_todos);
    }
?>