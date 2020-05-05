

    <html>
         <head>
              <title>Aprendendo a instrução IF…ELSEIF</title>
              <style>
                   .cor1{
                        color: #f00;
                   }
                   .cor2{
                        color: #00f;
                   }
                   .cor3{
                        color: #000;
                   }
              </style>
         </head>
         <body>
              <?php 
                   $a = 5;
                   $b = 6;
                   if ($a == $b) {
              ?>
                        <p class="cor1">A variável $a é igual a variável $b</p>
              <?php
                   }
                   else if (($a + $b) == 11) {
              ?>
                        <p class="cor2">A soma das variáveis $a + $b é igual a 11</p>
              <?php
              }
              else{
              ?>     
                        <p class="cor3">A soma das variáveis $a + $b é diferente a 11</p>
              <?php
                        } 
              ?>
         </body>
    </html>

