<?php
    /**
     * Através desta variável super global, podemos acessar 
     * os valores de todas as variáveis globais declaradas no 
     * nosso script, ou seja, se estivermos dentro de uma função
     * e tivermos a necessidade de acessar essa variável 
     * externamente, podemos usar a palavra reservada $GLOBAL
     */
    
    $bandas1 = array("Pearl Jam", "Metellica", "Nirvana");
    $bandas2 = array("New Order", "Angra", "Faith No More");
    
    function bandas()
    {
        $GLOBALS['result'] = array_merge($GLOBALS['bandas1'], $GLOBALS['bandas2']);
    }

    bandas();
    print_r($result);
?>
