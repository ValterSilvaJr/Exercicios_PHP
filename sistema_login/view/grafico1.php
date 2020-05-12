<!DOCTYPE HTML>
<html>
    <head>
        <title>Criar Relatórios com PHP</title>
        <meta charset="utf-8" />
        <link href="../css/style.css" rel="stylesheet" />
        <script src="../js/RGraph.common.core.js"></script>
        <script src="../js/RGraph.common.annotate.js"></script>
        <script src="../js/RGraph.common.context.js"></script>
        <script src="../js/RGraph.common.tooltips.js"></script>
        <script src="../js/RGraph.common.resizing.js"></script>
        <script src="../js/RGraph.bar.js"></script>
        <?php
            include "../model/conexao.php";
            $sqlCommand = "SELECT * FROM tblusuario ORDER BY idade_tblusuario";
            $sqlQuery = mysqli_query($conecta, $sqlCommand);
            $i = 0;
            while($result = mysqli_fetch_array($sqlQuery))
            {
                $nome[$i] = $result['nome_tblusuario'];
                $idade[$i] = $result['idade_tblusuario'];
                $i++;
            }
            $aux = $i;
            $i = 0;
            $dadosIdade = "";
            while($i <= $aux - 1)
            {
                if($i == $aux - 1)
                {
                    $dadosIdade = $dadosIdade . $idade[$i];
                }
                else
                {
                    $dadosIdade = $dadosIdade . $idade[$i] . ",";
                }
                $i++;
            }
            $dadosIdade = join(",", array($dadosIdade));
            $dadosIdade = "[$dadosIdade]";
            echo "<script>" . "\n";
            echo "var dadosIdade = $dadosIdade" . ";\n";

            $i = 0;
            while($i <= $aux - 1)
            {
                echo "var idade $i = $idade[$i]; \n";
                $i++;
            }
            echo "</script>" . "\n";

            echo "<script>" . "\n";
            echo " window.onload = function ()" . "\n";
            echo " {" . "\n";
            echo "var meuGraficoIdades = new RGraph.Bar('meuCanvasGraficoIdades', dadosIdade);" . "\n";
            echo "meuGraficoIdades.Set('chart.background.barcolor1', 'white');" . "\n";
            echo "meuGraficoIdades.Set('chart.background.barcolor2', 'white');" . "\n";
            echo "meuGraficoIdades.Set('chart.title','Como gerar gráficos com php');" . "\n";
            echo "meuGraficoIdades.Set('chart.title.vpos', 0.6);" . "\n";
            echo "meuGraficoIdades.Set('chart.labels', [";

            $i = 0;
            while($i <= $aux - 1)
            {
                if($i == $aux - 1)
                {
                    echo "'" . $nome[$i] . "'";
                }
                else
                {
                    echo "'" . $nome[$i] . "', ";
                }
                $i++;
            }

            echo "]);\n";
            echo " meuGraficoIdades.Set('chart.tooltips', [";

            $i = 0;
            while($i <= $aux - 1)
            {
                if($i == $aux - 1)
                {
                    echo "'$nome[$i] tem ' + idade $i + ' anos'";
                }
                else
                {
                    echo "'$nome[$i] tem ' + idade $i + ' anos'";
                }
                $i++;
            }

            echo "]);\n";
            echo "meuGraficoIdades.Set('chart.text.angle', 45);" . "\n";
            echo "meuGraficoIdades.Set('chart.gutter', 35);" . "\n";
            echo "meuGraficoIdades.Set('chart.shadow', true);" . "\n";
            echo "meuGraficoIdades.Set('chart.shadow.blur', 5);" . "\n";
            echo "meuGraficoIdades.Set('chart.shadow.color', '#aaa');" . "\n";
            echo "meuGraficoIdades.Set('chart.shadow.offsety', -3);" . "\n";
            echo "meuGraficoIdades.Set('chart.colors', ['#00CED1']);" . "\n";
            echo "meuGraficoIdades.Set('chart.key.position', 'gutter');" . "\n";
            echo "meuGraficoIdades.Set('chart.text.size', 10);" . "\n";
            echo "meuGraficoIdades.Set('chart.text.font', 'Georgia');" . "\n";
            echo "meuGraficoIdades.Set('chart.text.angle', 0);" . "\n";
            echo "meuGraficoIdades.Set('chart.grouping', 'stacked');" . "\n";
            echo "meuGraficoIdades.Set('chart.strokecolor', 'rgba(0,0,0,0)');" . "\n";
            echo "meuGraficoIdades.Draw();" . "\n";
            echo "}" . "\n";
            echo "</script>";
        ?>     
    </head>
    <body>
        <div id="conteudo">
            <h1>Criar relatorio com PHP</h1>
            <div class="borda"></div>
            <div style="width: 750px;">
                <canvas id="meuCanvasGraficoIdades" width="700" height="350">[No canvas support]</canvas>
            </div>
            <div class="borda"></div>
            <div class="clear"></div>
            <div class="dheader">Nome</div>
            <div class="dheader">Email</div>
            <div class="dheader">Idade</div>
            <div class="clear"></div>
            <?php
                $sqlQuery2 = mysqli_query($conecta, "SELECT * FROM tblusuario");
                while($resulta = mysqli_fetch_array($sqlQuery2)) {
            ?>
                <div class="content"><?php echo $resulta['nome_tblusuario']; ?></div>
                <div class="content"><?php echo $resulta['email_tblusuario']; ?></div>
                <div class="content"><?php echo $resulta['idade_tblusuario']; ?></div>
                <div class="clear"></div>
            <?php } ?>
        </div>
    </body>
</html>