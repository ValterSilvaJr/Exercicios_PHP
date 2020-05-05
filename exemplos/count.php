<?php
    // count(): retorna o número de elementos dentro de um array

    $bandas = array("Pearl Jam", "Metallica", "Nirvana", "New Order","Angra", "Faith No More");
    $i = count($bandas);

    echo "Foram encontradas $i bandas no array";
    echo " e são elas:<br>";
    echo "<br>";

    foreach($bandas as $x => $x_value)
    {
        echo "Banda[" . $x . "]:" . $x_value;
        echo "<br>";
    }
?>