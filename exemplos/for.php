<html>
    <head>
        <title>TABUADA EM PHP</title>
        <style>
            span.cor1 
            {
                color: #f00
            }
            span.cor2 
            {
                color: #0f0
            }
            div.bordas
            {
                font-size: 15;
                width: 200px;
                border: 1px solid #000;
                margin: 5px;
                padding: 0px 10px 10px;
                font-family: tahoma;
                float: left;
            }
            h2.titulo
            {
                text-align: center;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <?php for ($i = 1; $i <= 10; $i++){ ?>
            <div class = "bordas">
                <h2 class = "titulo">
                    Tabuada do <?php echo $i ?>
                </h2>
                <?php for ($j = 1; $j <= 10; $j++) { ?>
                    <span class = "cor1"> 
                        <?php echo $i ?>
                    </span> 
                    x 
                    <span class = "cor2"> 
                        <?php echo $j ?>
                    </span>
                    = 
                    <?php echo $i * $j ?>
                    <br/>
                <?php } ?>
            </div>
        <?php } ?>
    </body>
</html>