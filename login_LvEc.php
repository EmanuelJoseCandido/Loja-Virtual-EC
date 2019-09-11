<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LV - EC Login </title>
</head>
<body>

    <?php
        if(isset($_SESSION['mensagem']))
        {
            echo $_SESSION['mensagem'];
            unset ($_SESSION['mensagem']);
        }

        
    ?>
    <form action="validarLogin.php" method="post">
        <fieldset>
            <p>
                <label for='idUsuario'>Usuário: </label><br>
                <input type='text' name='usuario' id='idUsusario' size='50' placeholder='Digite o seu usuário...'> 
            </p>

            <p>
                <label for="idSenha">Novamente<span class="asteristico">*</span>: </label><br>
                <input type="password" name="senha" id="idSenha" placeholder="Digite a sua senha">
            </p>

            <p>
                <input type="submit" name="entrar" id="idEnviar" value="Entrar">
            </p>
            <a href="criarContaNaLvEc.html">Criar Conta?</a>
        </fieldset>
    </form>
</body>
</html>