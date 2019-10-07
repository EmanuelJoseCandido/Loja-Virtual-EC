<?php
    header("Content-Type: text/html; charset=utf-8", TRUE); // Codigo para aceitaçao de caracteres acentuados
    include_once("coneccao.php"); // Função que chama a nossa conecção com a base de dados
    $conexaoPDO->beginTransaction(); // There is no active transaction

     
    $sql = "SELECT * FROM funcionario";
        
    try
    {
        $consulta = $conexaoPDO -> prepare($sql);
        $consulta -> execute();
        $resultado = $consulta -> fetchAll(PDO::FETCH_NUM);
    }
    catch(PDOException $e) 
    {
        echo 'Error: ' . $e->getMessage();
    }

    foreach($resultado as $valores)
    {
        $_SESSION['codigoFuncionario'] = $valores[0];
    }

    if ($_SESSION['codigoFuncionario'] == null)
    {
        header("Location: criarContaNaLvEcFunc.html");
    }

?>