<?php
    session_start();
    include "../model/conexao.php";
    $sqlCommand = "SELECT * FROM tblusuario ORDER BY nome_tblusuario";
    $sqlAccess= mysqli_query($conecta, $sqlCommand);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="../css/style.css" rel="stylesheet" />
        <title>Listagem de Conteúdo</title>
    </head>
    <body>
        <div id="conteudo">
            <h1>Listagem de conteúdo</h1>
            <div class="borda"></div>
            <p>Selecione um usuário para atualizar seus dados ou para excluí-lo!</p>
            <div class="dheader"><strong>Nome</div>
            <div class="dheader">Email</div>
            <div class="dheader">Ação</strong></div>
            <div class="clear"></div>
            <?php
                if($_SESSION['permissao'] == 'diamante') 
                {
                    while($result=mysqli_fetch_array($sqlAccess))
                    {
            ?>
                        <div class="content"><?php echo $result['nome_tblusuario'] ?></div>
                        <div class="content"><?php echo $result['email_tblusuario'] ?></div>
                        <div class="content_last1"><a class="link" href="fupdate.php?id=<?php echo $result['id_tblusuario'] ?>">Atualizar</a></div>
                        <div class="content_last1"><a class="link" href="../controller/delete_dados_usuario.php?id=<?php echo $result['id_tblusuario'] ?>">Excluir</a></div>
                        <div class="clear"></div>
            <?php   }
                echo "<p>Para gerar um relatorio <a href='../controller/gerar_pdf.php' target='_blank'>Clique aqui</a></p>"; 
                } else {
                    header("Location: fupdate.php");
                } 
            ?>
        </div>
        <div class="dheader">
            <a class="link" href="conteudo_exclusivo.php">Voltar</a>
        </div>
    </body>
</html>