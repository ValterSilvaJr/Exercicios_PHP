<?php
    include "../model/conexao.php";
    $recebeEmail = $_POST['email'];
    $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_MAGIC_QUOTES);

    $sql_query = mysqli_query
    (
        $conecta, "SELECT * FROM tblusuario WHERE email_tblusuario = '$filtraEmail'"
    ) or die(mysqli_error());
    $verificaBanco = mysqli_num_rows($sql_query);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset = "utf-8" />
        <link href="../css/style.css" rel="stylesheet" />
        <title>Sistema de Login e Senha Criptografados</title>
    </head>
    <body>
        <div id="conteudo">
            <?php if($verificaBanco == 0) { ?>
                <h2>E-mail inválido!</h2>
                <p>Desculpe, mas o e-mail solicitado não &eacute; cadastrado.</p>
                <p>Entre em contato com o administrador do sistema.<br>
                Se quiser tentar novamente, <a href="../view/fsenha.php">clique aqui</a>.</p>
                <p>Obrigado.</p>
            <?php } 
            else {
                $result = mysqli_fetch_array($sql_query);
                $id_usuario = $result['id_tblusuario'];
                $nome = $result['nome_tblusuario'];
                $email = $result['email_tblusuario'];
                
                function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
                {
                    $lmin = 'abcdefghijklmnopqrstuvwxyz';
                    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $num = '1234567890';
                    $simb = '!@#$%*-';
                    $retorno = '';
                    $caracteres = '';
                    $caracteres .= $lmin;

                    if($maiusculas) $caracteres .= $lmai;
                    if($numeros) $caracteres .= $num;
                    if($simbolos) $caracteres .= $simb;
                    $len = strlen($caracteres);
                    
                    for($n = 1; $n <= $tamanho; $n++)
                    {
                        $rand = mt_rand(1, $len);
                        $retorno .= $caracteres[$rand-1];
                    }
                    return $retorno;
                }
                $nova_senha = geraSenha(12, true, false);
                $criptoSenha = md5($nova_senha);

                $query = "UPDATE tblusuario SET senha_tblusuario = '$criptoSenha' WHERE id_tblusuario = '$id_usuario'";
                $rs = mysqli_query($conecta, $query);
                $formato = "\n Content-type: text/html";
                $msg = "Olá, $nome. Recebemos uma solicitação para renovar sua senha.<br><br>";
                $msg .= "Seu usuário: <strong>$id_usuario</strong><br>";
                $msg .= "Sua <strong>nova</strong> senha: <strong>$nova_senha</strong><br><br>";
                $msg .= "Caso não tenha solicitado esta ação. Acesse a sua conta e altere a sua senha novamente.<br>";
                $msg .= "<br>";
                $msg .= "Obrigado.<br>";
                mail("$email","Nova Senha",$msg, "From: Sistema <sistema@sistema.com>" . $formato);
            ?>
                <h2>Senha Enviada!</h2>
                <p>Parabéns. Sua senha foi enviada para o e-mail solicitado.</p>
                <p>Após verificar seu e-mail, retorne à página de login.</p>
                <p>Se preferir, <a href="../index.php">clique aqui</a>.</p>
                <p>Obrigado</p>
            <?php } ?>
        </div>  
    </body>
</html>