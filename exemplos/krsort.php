<?php 
    /*
     * ksort(): ordena um array associativo em ordem decrescente
     * de acordo com o valor da chave ou do índice. 
     */

    $bandas = array("Pearl Jam", "Metallica","Nirvana","New Order","Angra","Faith No More");
    krsort($bandas);

    echo "<strong> Array sendo ordenado de forma decrescente: <br><br></strong>";

    foreach($bandas as $x => $x_value)
    {
        echo "Banda[" . $x . "]: " . $x_value . "<br>";
    }
?>