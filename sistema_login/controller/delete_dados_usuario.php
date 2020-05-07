<?php
    session_start();
    include "../model/conexao.php";


    $recebeId = $_GET['id'];
    $filtraID = filter_var($recebeId, FILTER_SANITIZE_SPECIAL_CHARS);
    $filtraID = filter_var($filtraID, FILTER_SANITIZE_MAGIC_QUOTES);
    $sqlCommand = "DELETE FROM tblusuario WHERE id_tblusuario ='$filtraID'";
    $sqlQuery = mysqli_query($conecta, $sqlCommand);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="../css/style.css" rel="stylesheet" />
        <title>Exclusão de dados</title>
    </head>
    <body>
        <div id="conteudo">
            <h1>Exclusão de dados</h1>
            <div class="borda"></div>
            <?php
                if($sqlQuery)
                {
                    echo "<p>Registro excluído com sucesso!</p>";
                    echo "<p><a href='javascript:history.back();'> Volte</a> para a página anterior! Obrigado!</p>";
                    //header("Location ../controller/logout.php");
                }
                else
                {
                    echo "<p>Erro ao excluir o registro!</p>";
                    echo "<p><a href='javascript:history.back();'> Volte</a> para a página anterior! Obrigado! </p>";
                }
            ?>
        </div>
    </body>
</html>


