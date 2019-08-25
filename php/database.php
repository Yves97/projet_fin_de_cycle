<?php
    $serveur = "localhost";
    $login = "root";
    $password = "";
    try
    {
        $connection = new PDO("mysql:host=$serveur;dbname=projet_ida",$login,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        //echo "OK";
    }
    catch (PDOException $e)
    {
        die('Impossible de connecter la a base de donnée:'.$e->getMessage());
    }