<?php
    /**
     * Esta variável super global de PHP contém informações 
     * sobre cabeçalhos, path e localizações do script
     */
    
    echo "Nome do servidor: " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "Informação do host: " . $_SERVER['HTTP_HOST'] . "<br>";
    echo "Informação do navegador/ SO: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
    echo "Nome do arquivo: " . $_SERVER['SCRIPT_NAME'] . "<br>";
    echo "Endereço IP do servidor: " . $_SERVER['SERVER_ADDR'];
?>