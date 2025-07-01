<?php 
    function conn(){
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=fa-shion", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<script>console.log('Connected successfully');</script>";
        } catch(PDOException $e) {
            echo "<script>console.log('Connected fail');</script>";
        }
    }
?>