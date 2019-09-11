<?php
      /**
     * Autor: Emanuel Cândido
     * Email: emanueljosecandido@hotmail.com
     * GitHub: EmanuelJoseCandido
     * Facebook: Emanuel Cândido
     * Telfones: (Unitel: 921815882) | (Movicel: 990815882)
     * Descrição: página denominada controle.php, que serve como uma ponte entre o html e mysql para cadastro de dados enviadas pela p]agina conta.html.
     * 
     */

    session_start();
    include_once("coneccao.php"); 
     

    $nome = isset($_POST['nome']) ? $_POST['nome']:0;
    $quantidadeDisponivel = isset($_POST['quantidadeDisponivel']) ? $_POST['quantidadeDisponivel']:0;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao']:0;
    $valor = isset($_POST['valor']) ? $_POST['valor']:0;
    $estado = "Activo(a)";
    $quantidadeVendida = 0;

        // Codigo de inserção de informação na tabela produtos
    $sql1 = 'INSERT INTO produtos(Funcionario_codigoFuncionario, nome, quantidadeDisponivel, quantidadeVendida, descricao, valor, estado) VALUES (:Pessoa_codigoPessoa, :nome, :quantidadeDisponivel, :quantidadeVendida :descricao, :valor, :estado)';
    $stmt1 = $conexaoPDO -> prepare($sql1);
    $stmt1 -> execute(array(
        ':Funcionario_codigoFuncionario' => $_SESSION['codigoPessoa'], 
        ':nome' => $nome, 
        ':quantidadeDisponivel' => $quantidadeDisponivel, 
        ':quantidadeVendida' => $quantidadeVendida,
        ':descricao' => $descricao, 
        ':valor' => $valor, 
        ':estado' => $estado, 
    ));

    echo"
        <script language='javascript' type='text/javascript'> 
            alert('Dados cadastrados com sucesso.');
            window.location .href='index.php';
        </script>"; die();
        
       

    function criptografar($texto)
    {
        return sha1(md5($texto));
    }

?>