<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $db = "bandas";
    $conn = new mysqli($servidor, $usuario, $senha, $db);
    
    if($conn -> connect_error)
    {
        die("Falha ao conectar com o servidor: " . $conn -> connect_error);
    }
    else
    {
        echo "Conexão efetuada com sucesso";
    }
?>