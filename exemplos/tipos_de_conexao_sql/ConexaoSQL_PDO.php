<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "bandas";

    try
    {
        $conn = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $senha);
        echo "Conexão efetuada com sucesso!";
    }
    catch(PDOException $e)
    {
        echo "Falha ao conectar com o servidor: " . $e -> getMessage();
    }
?>