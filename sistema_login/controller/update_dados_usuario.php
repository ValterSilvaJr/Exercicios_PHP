<?php
    session_start();
    //COLOCAR UMA CONDICIONAL PARA QUE OS DADOS SÓ SEJAM ATUALIZADOS SE O USUÁRIO ESTIVER LOGADO NO SISTEMA
    include "../model/conexao.php";
    
    $recebeID = $_POST['id'];
    $filtraID = filter_var($recebeID, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtraID = filter_var($filtraID, FILTER_SANITIZE_MAGIC_QUOTES);
    $sqlCommand = "SELECT * FROM tblusuario WHERE id_tblusuario='$filtraID'";
    $sqlAccess = mysqli_query($conecta, $sqlCommand);

    $recebeNome = $_POST['nome'];
    $filtraNome = filter_var($recebeNome, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtraNome = filter_var($filtraNome, FILTER_SANITIZE_MAGIC_QUOTES);

    $recebeEmail = $_POST['email'];
    $filtraEmail = filter_var($recebeEmail, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtraEmail = filter_var($filtraEmail, FILTER_SANITIZE_MAGIC_QUOTES);

    $oldSenha = $_POST['old_pass'];
    $filtra_oldSenha = filter_var($oldSenha, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtra_oldSenha = filter_var($filtra_oldSenha, FILTER_SANITIZE_MAGIC_QUOTES);

    $newSenha = $_POST['new_pass'];
    $filtra_newSenha = filter_var($newSenha, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtra_newSenha = filter_var($filtra_newSenha, FILTER_SANITIZE_MAGIC_QUOTES);

    $conf_newSenha = $_POST['conf_new_pass'];
    $filtra_conf_newSenha = filter_var($conf_newSenha, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtra_conf_newSenha = filter_var($filtra_conf_newSenha, FILTER_SANITIZE_MAGIC_QUOTES);

    function criptoSenha($criptoSenha)
    {
        return md5($criptoSenha);
    }

    $criptoSenha = criptoSenha($filtra_newSenha);
    $cripto_oldSenha = criptoSenha($filtra_oldSenha);
    $cripto_newSenha = criptoSenha($filtra_newSenha);
    $cripto_conf_newSenha = criptoSenha($filtra_conf_newSenha);
    $result = mysqli_fetch_assoc($sqlAccess);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <link href="../css/style.css" rel="stylesheet" />
        <title>Atualização de dados</title>
    </head>
    <body>
        <div id="conteudo">
            <h1>Atualização de dados</h1>
            <div class="borda"></div>
            <?php
                if($cripto_oldSenha != $result['senha_tblusuario'])
                {
                    echo "<p>Senha antiga informada não confere com a senha armazenada. Por favor, <a href='javascript:history.back();'>volte</a> e tente novamente!</p>";
                    return false;
                }
                else
                {
                    if($cripto_newSenha != $cripto_conf_newSenha)
                    {
                        echo "<p>A nova senha e a confirmação da nova senha não são iguais. Por favor, <a href='javascript:history.back();'>volte</a> e tente novamente!</p>";
                        return false;
                    }
                    else
                    {
                        $updateCommand = "UPDATE tblusuario SET nome_tblusuario='$filtraNome', senha_tblusuario='$cripto_newSenha' WHERE id_tblusuario = '$filtraID'";
                        $sqlQuery = mysqli_query($conecta, $updateCommand);
                        echo "<p>Dados atualizados com sucesso!</p>";
                        echo "<a href='../view/conteudo_exclusivo.php'>Pagina inicial</a></p>";
                        mysqli_close($conecta);
                    }
                }
            ?>
        </div>
    </body>
</html>