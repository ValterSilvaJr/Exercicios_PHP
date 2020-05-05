<?php
    //Verifica qual o tipo de arquivo e tamanho
    if((
            ($_FILES['file']['type'] == "image/gif")
            || ($_FILES['file']['type'] == "image/jpeg")
            || ($_FILES['file']['type'] == "image/jpg")
        )   
            && ($_FILES['file']['size'] < 200000))
    {
        if($_FILES['file']['error'] > 0) 
        {
            echo "Código de retorno: " . $_FILES['file']['error'] . "<br />";
        }
        else
        {
            echo "Arquivo: " . $_FILES['file']['name'] . "<br />";
            echo "Tipo: " . $_FILES['file']['type'] . "<br />";
            echo "Tamanho: " . ($_FILES['file']['size'] / 1024) . " Kb<br />";
            echo "Arquivo temporário: " . $_FILES['file']['tmp_name'] . "<br />";

            if(file_exists("upload/" . $_FILES['file']['name']))
            {
                echo $_FILES['file']['name'] . " já existe";
            }
            else 
            {
                move_uploaded_file($_FILES['file']['tmp_name'], "upload/" . $_FILES['file']['name']);
                echo "Guardado em: upload/" . $_FILES['file']['name'];
            }
        }
    }
    else 
    {
        echo "Arquivo inválido";
    }
?>

<img src = "upload/
    <?php 
        echo $_FILES['picture']['name']; 
    ?>
">