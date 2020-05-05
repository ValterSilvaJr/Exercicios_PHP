
<form method = "get" action="metodoGET.php">
    <label 
        for="txt_nome">Nome.: 
    </label>
    <input type="text" name="txt_nome" id="txt_nome"><br>

    <label 
        for="txt_email">E-mail: </label>
    <input type="text" name="txt_email" id="txt_email"><br>
    <input type="submit" />
</form>

<?php
    $nome = $_GET['txt_nome'];
    $email = $_GET['txt_email'];

    echo "Os dados enviados pelo formulário foram: <br><br>";
    echo "Nome: " . $nome . "<br>";
    echo "Email: " . $email . "<br>";
?>
