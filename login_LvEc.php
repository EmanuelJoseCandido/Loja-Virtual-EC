<?php include_once("funcoes.php"); session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="_css/styleLogin.css">
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
    <div class="limites">
        <div class="caixaDaElisal">
            <div class="caixaDaElisal2">
                <form action="validarLogin.php" method="post" id="login">
                        <span class="tituloDoLogin">
                            Login para continuar
                        </span>
                        <p>
                            <label for='idUsuario'>Usuário: </label><br>
                            <input type='text' name='usuario' id='idUsusario' class="mesmaClass" placeholder='Digite o seu usuário...'> 
                        </p>

                        <p>
                            <label for="idSenha">Senha: </label><br>
                            <input type="password" name="senha" id="idSenha" class="mesmaClass" placeholder="Digite a sua senha">
                        </p>

                        <p>
                            <input type="submit" name="entrar" id="idEnviar" value="Entrar">
                        </p>
                        <a href="criarContaNaLvEc.html">Criar Conta?</a>
                </form>
                <div class="imagemDeLado"> </div>
            </div>
        </div>
    </div>
</body>
</html>