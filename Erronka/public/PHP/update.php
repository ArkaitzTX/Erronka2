<?php
    $hostDB = '127.0.0.1';
    $nombreDB = 'erronka';
    $usuarioDB = 'root';
    $contrasenyaDB = '';

    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

    $juego1 = 0;
    $juego2 = 0;
    
    if ($_POST["juego"] == "juego1") {

        $miInsert = $miPDO->prepare('UPDATE partidas SET juego1=:miJuego1 WHERE id = :miID;');
        $miInsert->execute(
        array(
           'miID' => $_POST["id"],
           'miJuego1' => 1,
        ));

    }
    if ($_POST["juego"] == "juego2") {

        $miInsert = $miPDO->prepare('UPDATE partidas SET juego2=:miJuego2 WHERE id = :miID;');
        $miInsert->execute(
        array(
           'miID' => $_POST["id"],
           'miJuego2' => 1,
        ));

    }



?>