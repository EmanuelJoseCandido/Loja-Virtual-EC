<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8", TRUE); // Codigo para aceitaçao de caracteres acentuados
    include_once("coneccao.php"); // Função que chama a nossa conecção com a base de dados

    $_SESSION['codigoPessoa'];
    $_SESSION['nomeDoProduto'];
    $_SESSION['valorDoProduto'];
    $_SESSION['imgemDoProduto'];
    $_SESSION['quantidadeAComprar'];
    $_SESSION['valorTotalPagar'];

    $sql2 = "SELECT * FROM pessoa
    INNER JOIN endereco ON endereco.Pessoa_codigoPessoa = pessoa.codigoPessoa 
    INNER JOIN contactos ON contactos.Pessoa_codigoPessoa = pessoa.codigoPessoa 
    INNER JOIN banco ON banco.Pessoa_codigoPessoa = pessoa.codigoPessoa 
    INNER JOIN cartaobanco ON cartaobanco.Pessoa_codigoPessoa = pessoa.codigoPessoa WHERE codigoPessoa = ".$_SESSION['codigoPessoa'];

    try
    {
        $consulta = $conexaoPDO -> prepare($sql2);
        $consulta -> execute(Array('codigoPessoa' => $_SESSION['codigoPessoa']));
        $resultado = $consulta -> fetchAll(PDO::FETCH_NUM);
    }
    catch(PDOException $e) 
    {
     echo 'Error: ' . $e->getMessage();
    }

    foreach($resultado as $valores)
    {

            echo $valores[$i];
          
    }
?>