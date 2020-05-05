<?php
    include "../model/conexao.php";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Sistema de Login e Senha Criptografados</title>
        <link href="../css/style.css" rel="stylesheet" />
    </head>
    <body>
        <div id="conteudo">
            <h1>Sistema de login e senha criptografados</h1>
            <div class="borda"></div>
            <?php
                $recebeNome = $_POST['nome'];
                $filtraNome = filter_var($recebeNome, FILTER_SANITIZE_SPECIAL_CHARS);
                $filtraNome = filter_var($recebeNome, FILTER_SANITIZE_MAGIC_QUOTES);
                $recebeEmail = $_POST['email'];
                $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);
                $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_MAGIC_QUOTES);
                $recebeSenha = $_POST['senha'];
                $filtraSenha = filter_var($recebeSenha, FILTER_SANITIZE_SPECIAL_CHARS);
                $filtraSenha = filter_var($recebeSenha, FILTER_SANITIZE_MAGIC_QUOTES);

                function criptoSenha($criptoSenha)
                {
                    return md5($criptoSenha);
                }
                $criptoSenha = criptoSenha($filtraSenha);

                $consultaBanco = mysqli_query
                (
                    $conecta, "SELECT * FROM tblusuario WHERE email_tblusuario = '$recebeEmail'"
                ) or die(mysql_error());

                $verificaBanco = mysqli_num_rows($consultaBanco);
                if($verificaBanco == 1) 
                {
                    echo "<p>Prezado(a) <strong>$recebeNome</strong>, o endereço de e-mail informado (<strong><em>$recebeEmail</em></strong>) já consta em nossa base de dados!</p>";
                    echo "<p><a href='javascript:history.back();'>Volte</a> para a página anterior e informe um novo endereço! Obrigado!</p>";
                }
                else
                {
                    $insereDados = mysqli_query($conecta, "INSERT INTO tblusuario(nome_tblusuario, email_tblusuario, senha_tblusuario) VALUES('$filtraNome','$filtraEmail','$criptoSenha')");
                    echo "<p>Seu Cadastro foi efetuado com sucesso!</p>";
                    echo "<p><a href='../index.php'> <- Voltar</a></p>";
                }
            ?>
        </div>
    </body>
</html>