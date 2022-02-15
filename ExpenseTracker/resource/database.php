<?php

    $username = "root";
    $dsn = 'mysql:host=localhost; dbname=register';
    $password = '';


    try {
        $db = new PDO($dsn, $username, $password);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected to register database";
    } catch(PDOException $ex ) {
        echo "Connection Failed";
    }
    
?>