<h1>Formulário de Contato</h1>
<form action = "enviar_email.php" method = "post">
    <fieldset>
        <p>
            <label for = "nome">Nome:</label>
            <input type = "text" name = "nome" id = "nome"/>
        </p>
        <p>
            <label for = "email">E-mail:</label>
            <input type = "text" name = "email" id = "email"/>
        </p>
        <p>
            <label for = "texto">Texto:</label>
            <textarea name = "texto" rows = "10" id = "texto"></textarea>
        </p>
        <p>
            <input type = "submit" name = "enviar" value = "Enviar"/>
        </p>
    </fieldset>
</form>