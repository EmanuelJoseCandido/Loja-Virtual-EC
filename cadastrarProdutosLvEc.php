<?php session_start();
$_SESSION['codigoPessoa'];
?>
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


        
    ?>
    <form action="validarCadastroLvEc.php" method="post">
        <fieldset>
            <p>
                <label for='idProduto'>Nome do Produto: </label><br>
                <input type='text' name='produto' id='idProduto' size='50' placeholder='Digite o seu usuário...'> 
            </p>

            <p>
                <label for="idQuantidadeDisponivel">Quantidade Disponível<span class="asteristico">*</span>: </label><br>
                <input type="text" name="quantidadeDisponivel" id="idQuantidadeDisponivel" placeholder="Digite a sua senha">
            </p>

            <p>
                <label for='idValor'>Valor: </label><br>
                <input type='text' name='valor' id='idValor' size='50' placeholder='Digite o seu usuário...'> 
            </p>

            <p>
                <label for="idDescricao">Descrição<span class="asteristico">*</span>: </label><br>
                <input type="text" name="descricao" id="idDescricao" placeholder="Digite a sua senha">
            </p>

            <p>
                <input type="submit" name="entrar" id="idEnviar" value="Entrar">
            </p>
        </fieldset>
    </form>
</body>
</html>