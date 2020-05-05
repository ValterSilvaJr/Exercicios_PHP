<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="css/style.css" rel="stylesheet"/>
        <title>Sistema de Login e Senha Criptografados</title>
    </head>
    <body>
        <div id="conteudo">
            <h1>Sistema de login e senha criptografados - recuperação de Senha</h1>
            <div class="borda"></div>
            <p>Informe o e-mail utilizado no login, para que uma nova senha seja enviada!</p>
            <form action="recuperar_senha.php" method="post">
                <fieldset>
                    <legend>Recuperar senha</legend>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required />
                    <input type="submit" value="Enviar" />
                </fieldset>
            </form>
        </div>
    </body>
</html>