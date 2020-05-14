<?php
    include "../model/conexao.php";
    require_once '../vendor/autoload.php';

    $sqlCommand = "SELECT * FROM tblusuario ORDER BY nome_tblusuario";
    $sqlQuery = mysqli_query($conecta, $sqlCommand);

    $html = "<html>";
    $html = $html . "<head>";
    $html = $html . "<link href=\"../css/style.css\" rel=\"stylesheet\" />";
    $html = $html . "</head>";
    $html = $html . "<body>";
    $html = $html . "<div id=\"conteudo\">";
    $html = $html . "<h1>Gerar relatório em PDF</h1>";
    $html = $html . "<div class=\"borda\"></div>";
    $html = $html . "<div class=\"clear\"></div>";
    $html = $html . "<div class=\"qtde\">Listagem da tabela: tblusuario</div>";
    $html = $html . "<div class=\"qtde_last\">Foram encontrados " . mysqli_num_rows($sqlQuery) . " registros</div>";
    $html = $html . "<div class=\"clear\"></div>";
    $html = $html . "<div class=\"dheader2\">Reg</div>";
    $html = $html . "<div class=\"dheader\">Nome</div>";
    $html = $html . "<div class=\"dheader\">Email</div>";
    $html = $html . "<div class=\"clear\"></div>";

    while($result = mysqli_fetch_array($sqlQuery))
    {
        $i++;
        $html = $html . "<div class=\"pdf_content2\">" . $i . "</div>";
        $html = $html . "<div class=\"pdf_content\">" . $result['nome_tblusuario'] . "</div>";
        $html = $html . "<div class=\"pdf_content\">" . $result['email_tblusuario'] . "</div>";
        $html = $html . "<div class=\"clear\"></div>";
    }
    $html = $html . "</div>";
    $html = $html . "</body>";
    $html = $html . "</html>";

    $mpdf = new \Mpdf\Mpdf();
    $mpdf -> WriteHTML($html);
    $mpdf -> Output();
    exit;
?>