
<form method = "post" action="metodoPOST.php">
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
    $nome = $_POST['txt_nome'];
    $email = $_POST['txt_email'];

    echo "Os dados enviados pelo formulário foram: <br><br>";
    echo "Nome: " . $nome . "<br>";
    echo "Email: " . $email . "<br>";
?>
