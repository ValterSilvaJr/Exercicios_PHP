    <html>
         <head>
              <title>Aprendendo a instrução SWITCH/CASE</title>
              <style>
                   .cor1{
                        color: #f00;
                   }
                   .cor2{
                        color: #00f;
                   }
                   .cor3{
                        color: #FF0040;
                   }
                   .cor4{
                        color: #FF8000;
                   }
                   .cor5{
                        color: #000;
                   }
              </style>
         </head>
         <body>
              <?php
                   $destino="New York";
                   switch ($destino) {
                        case "São Paulo":
              ?>
                             <p class="cor1">Seja bem-vindo a cidade que nunca para!</p>
              <?php
                             break;
                        case "Paris":
              ?>
                             <p class="cor2">Seja bem-vindo a cidade Luz!</p>
              <?php
                             break;
                        case "New York":
              ?>
                             <p class="cor3">Seja bem-vindo a Big Apple!</p>
              <?php
                             break;
                        case "Rio de Janeiro":
              ?>
                             <p class="cor4">Seja bem-vindo a Cidade Maravilhosa!</p>
              <?php
                             break;
                             default:
              ?>
                             <p class="cor5">Não encontramos seu destino!</p>
              <?php
                   }
              ?>
         </body>
    </html>