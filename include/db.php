<?php

function MakeConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $myDB = "cms-4.2.1";

    try {
        $conn = new PDO("mysql:host=".$servername.";dbname=".$myDB, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";

        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


// for closing the connection
// $conn = null;
// $stmt->close();
// $conn->close();
?>