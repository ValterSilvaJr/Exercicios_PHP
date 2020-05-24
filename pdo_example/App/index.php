<?php
    require_once '../vendor/autoload.php';

    $usuario = new \App\Model\PojoUsuario();
    $funcionario = new \App\Model\PojoFuncionario();
    $funcionario -> setSalario();
    // $usuario -> setNome("Joaozinho 558");
    // $usuario -> setEmail("pdotest20@mail.com");
    // $usuario -> setSenha("55882");
    $usuario -> setId(22);
    $usuarioDAO = new \App\Model\UsuarioDAO();
    //$usuarioDAO->Inserir($usuario); 
    //$usuarioDAO -> Editar($usuario);
    //$usuarioDAO -> Deletar($usuario);
    
    foreach($usuarioDAO -> Buscar($usuario) as $usuario){
        echo 
            $usuario['nome_tblusuario'] . "<br>" . 
            $usuario['email_tblusuario'] . "<br>" . 
            $usuario['senha_tblusuario'] . "<hr>";
    }
?>