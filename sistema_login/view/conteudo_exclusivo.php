<?php
    session_start();
    include "../model/conexao.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="../css/style.css" rel="stylesheet" />
        <title>Sistema de Login e Senha Criptografados </title>
    </head>
    <body>
        <div id="conteudo">
            <?php
                if($_SESSION['login'])
                {
            ?>
                <h1><span class="destaca"><?php echo $_SESSION['nome_usuario']; ?></span>, seja bem-vindo ao Conteúdo Exclusivo</h1>
                <div class="borda"></div>
                <div class="logout">
                    <p class="sairSistema"><a href="../controller/logout.php">Clique aqui</a> para sair do sistema</p>
                </div>
                <div class='clear'></div>
                <div class="logout">
                    <p class="sairSistema"><a href="conteudo.php">Atualizar Dados</a></p>
                </div>
                <div class="clear"></div>
                <h3>Conteúdo Exclusivo 01 </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque id porro reprehenderit obcaecati dolorum, accusamus aut sequi iusto explicabo officia nemo. Quaerat vel hic dolorem suscipit delectus voluptas nisi quod? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum sequi omnis sed corrupti dignissimos, necessitatibus ut ipsa placeat fugiat. Quam minus autem vero officiis voluptas illo commodi accusantium velit architecto? Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, culpa ipsum nisi voluptas veniam accusamus expedita cum nemo! Iste officia sequi aut odit odio doloribus laudantium eaque incidunt itaque nesciunt. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure suscipit eaque, modi facere amet id quaerat placeat quo mollitia consequuntur laboriosam voluptatem delectus omnis dignissimos quasi quidem, corporis quae nesciunt?</p>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. At debitis impedit quidem provident molestiae corrupti deleniti, eligendi veritatis omnis distinctio hic earum necessitatibus porro quae nobis quis dolorum modi veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam fugiat saepe tempore velit atque animi ab adipisci sapiente, eius accusantium eos deleniti. Optio ipsum distinctio repellat libero totam. Totam, modi? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit recusandae tempore nihil natus commodi nisi ipsam, veniam non? Amet laborum aperiam sit ex unde atque fugit? Libero eos sapiente odio! Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic saepe velit animi at, aspernatur eum obcaecati omnis debitis laudantium reprehenderit rerum, earum quasi! Numquam vitae ab magnam at. Rerum, itaque?</p>
                <div class="borda"></div>
            <?php } else { ?>
                <h1>Sistema de login e senha criptografados</h1>
                <div class="borda"></div>
                <p>Proibido o acesso por esse meio. Volte e informe os dados corretamente!</p>
                <p><a href="index.php">Pagina Inicial</a></p>
            <?php } ?>
            <?php
                if($_SESSION['permissao'] == 'diamante') { 
            ?>
                <h1><span class="destaca"><?php echo $_SESSION['nome_usuario']; ?></span>, seu nível de acesso é <span class="destaca"><?php echo $_SESSION['permissao']; ?></span>!</h1>
            <?php } ?>
        </div>
    </body>
</html>