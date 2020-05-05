<form method="post" action="metodoREQUEST.php?txt_banda=Legião Urbana">
    <label for="txt_nome">Nome:</label><input type="text" name="txt_banda" id="txt_nome"><br>
    <input type="submit" />
</form>

<?php 
    echo ("O nome digitado foi: " . $_REQUEST['txt_banda']);
?>