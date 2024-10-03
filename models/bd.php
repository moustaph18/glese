<?php

    $serveur="localhost";
    $user="root";
    $password="";
    $nomBd="glese";
    try{
        $connexion=new PDO("mysql:host=$serveur;dbname=$nomBd",
        $user,$password,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        //echo "Bonjour Moustapha";
    }catch (PDOException $e) {
        echo "ERREUR DE CONNEXION" . $e->getMessage(); 
        die;
    }
?>