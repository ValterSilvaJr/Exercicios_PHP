<?php
    require_once '../vendor/autoload.php';

    $usuario = new \App\Model\PojoUsuario();
    $usuario -> setNome("Retlav");
    $usuario -> setEmail("test@mail.com");
    $usuario -> setSenha("123456");

    $usuarioDAO = new \App\Model\UsuarioDAO();
    $usuarioDAO->Inserir($usuario); 
?>