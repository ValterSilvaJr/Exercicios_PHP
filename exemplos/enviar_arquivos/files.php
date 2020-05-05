<html>
    <head>
        <title>Trabalhando com $_FILES</title>
    </head>
    <body>
        <form action = "upload_file.php" method = "post" enctype = "multipart/form-data">
            <label for = "txt_nome">Nome:</label>
            <input type = "text" name = "txt_nome" id = "txt_nome"><br /> 
            <label for = "file">Foto</label>
            <input type = "file" name = "file" id = "file" />
            <br />
            <input type = "submit" name = "submit" value = "Enviar" />
        </form>    
    </body>
</html>