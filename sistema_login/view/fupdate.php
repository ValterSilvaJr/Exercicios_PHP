<?php
    session_start();
    //COLOCAR UMA CONDICIONAL PARA QUE OS DADOS SÓ SEJAM ATUALIZADOS SE O USUÁRIO ESTIVER LOGADO NO SISTEMA
    include "../model/conexao.php";

    $recebeID = $_SESSION['id'];
    $filtraID = filter_var($recebeID, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtraID = filter_var($filtraID, FILTER_SANITIZE_MAGIC_QUOTES);
    $sqlCommand = "SELECT * FROM tblusuario WHERE id_tblusuario = '$filtraID'";
    $sqlAccess = mysqli_query($conecta, $sqlCommand);
    
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="../css/style.css" rel="stylesheet" />
        <title>Sistema de Cadastro</title>
    </head>
    <body>
        <div id="conteudo">
            <h1>Atualização de dados cadastrais do usuário</h1>
            <div class="borda"></div>
            <form method="post" action="../controller/update_dados_usuario.php" id="validaAcesso">
                <fieldset>
                    <?php
                        while($result=mysqli_fetch_assoc($sqlAccess)) {
                    ?>
                        <legend>Dados Cadastrais</legend>
                        <input type="hidden" name="id" id="id" value="<?php echo $result['id_tblusuario']; ?>" />
                        <label for="nome">Seu nome:</label>
                        <input type="text" name="nome" id="nome" value="<?php echo $result['nome_tblusuario']; ?>" />
                        <div class="clear"></div>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" value="<?php echo $result['email_tblusuario']; ?>" />
                        <div class="clear"></div>
                        <label for="senha">Senha antiga:</label>
                        <input type="password" name="old_pass" id="old_pass" />
                        <div class="clear"></div>
                        <label for="senha">Nova senha:</label>
                        <input type="password" name="new_pass" id="new_pass" />
                        <div class="clear"></div>
                        <label for="senha">Redigite a nova senha:</label>
                        <input type="password" name="conf_new_pass" id="conf_new_pass" />
                        <div class="clear"></div>
                        <input type="submit" value="Atualizar" />
                        <br><br><br>
                        <a href="conteudo_exclusivo.php"><- Voltar</a>
                    <?php } ?>
                </fieldset>
            </form>
        </div>
    </body>
</html>