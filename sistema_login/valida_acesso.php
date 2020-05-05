<?php
    session_start();
    include 'conexao.php';
?>

<!DOCTYPE HTML>

<html lang="br" class="no-js">
    <head>
        <title>Sistema de Login e Senha Criptografados</title>
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <div id="conteudo">
            <h1>Sistema de Login e senha criptografados - Verificando informações</h1>
            <div class="borda"></div>

            <?php
                $recebeEmail = $_POST['email'];
                $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);
                $filtraEmail = filter_var($filtraEmail, FILTER_SANITIZE_MAGIC_QUOTES);
                $recebeSenha = $_POST['senha'];
                $filtraSenha = filter_var($recebeSenha, FILTER_SANITIZE_SPECIAL_CHARS);
                $filtraSenha = filter_var($filtraSenha, FILTER_SANITIZE_MAGIC_QUOTES);

                function criptoSenhaMD5($criptoSenha)
                {
                    return md5($criptoSenha);
                }
                $criptoSenha = criptoSenhaMD5($filtraSenha);

                $sqlCommand = "SELECT * from tblusuario WHERE email_tblusuario = '$filtraEmail' and senha_tblusuario = '$criptoSenha'";
                $consultaInformacoes = mysqli_query($conecta, $sqlCommand) or die(mysqli_error($conecta));

                $verificaInformacoes = mysqli_num_rows($consultaInformacoes);
                
                if($verificaInformacoes == 1)
                {
                    while($result = mysqli_fetch_array($consultaInformacoes))
                    {
                        $_SESSION['login'] = true;
                        $_SESSION['nome_usuario'] = $result['nome_tblusuario'];
                        $_SESSION['permissao'] = $result['permissao_tblusuario'];
                        header("Location: conteudo_exclusivo.php");
                    }
                }
                else
                {
                    echo "<p>Nome de Usuário e Senha informada não confere. 
                        Por favor, <a href='javascript:history.back();'>volte</a> e tente novamente!</p>";
                }
            ?>
        </div>
    </body>
</html>