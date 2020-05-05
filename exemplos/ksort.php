<?php 
    /*
     * ksort(): ordena um array associativo em ordem crescente
     * de acordo com o valor da chave ou do índice. 
     */

    $bandas = array("Peral Jam","Metallica","Nirvana","New Order","Angra","Faith No More");
    ksort($bandas);

    echo "<strong> Array sendo ordenado de forma crescente: <br><br></strong>";

    foreach($bandas as $x => $x_value)
    {
        echo "Banda[" . $x . "]: " . $x_value . "<br>";
    }
?>