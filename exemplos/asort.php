<?php
    /*
    * asort(): ordena um array associativo em ordem crescente, de acordo com o valor
    * ou conteúdo da chave.
    */

    $bandas = array("Pearl Jam", "Metallica", "New Order", "Angra", "Faith No More");

    asort($bandas);
    foreach($bandas as $x => $x_value) 
    {
        echo "Banda[" . $x . "]:" . $x_value . "<br>";
    }
?>