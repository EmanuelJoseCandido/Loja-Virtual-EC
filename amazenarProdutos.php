<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8", TRUE); // Codigo para aceitaçao de caracteres acentuados
    include_once("coneccao.php"); // Função que chama a nossa conecção com a base de dados
    $conexaoPDO->beginTransaction(); // There is no active transaction

    $armazenarProdutos = filter_input(INPUT_POST, 'armazenarProdutos', FILTER_SANITIZE_STRING);

    if($armazenarProdutos)
    {
        $Funcionario_codigoFuncionario = pegarCodigoFuncionario();
        $nomeProduto = isset($_POST['nomeProduto']) ? $_POST['nomeProduto']:0;
        $quantidadeDisponivel = isset($_POST['quantidadeDisponivel']) ? $_POST['quantidadeDisponivel']:0;
        $quantidadeVendida = 0;
        $valor = isset($_POST['valor']) ? $_POST['valor']:0;
        $descricao = isset($_POST['descricao']) ? $_POST['descricao']:0;

        $extensao = strtolower(substr($_FILES['imgProdutos']['name'],-4)); //Pegando extensão do arquivo
        $novoNomeImagem = date("dmy-His") . $extensao; //Definindo um novo nome para o arquivo
        $directorio = './_galeria/_imagens/_produtos_cadastrados/'; //Diretório para uploads
        move_uploaded_file($_FILES['imgProdutos']['tmp_name'], $directorio.$novoNomeImagem); //Fazer upload do arquivo


        $estado = "Disponível";

        // Codigo de inserção de informação na tabela Produtos
        $sql2 = 'INSERT INTO produtos(Funcionario_codigoFuncionario, nomeProduto, quantidadeDisponivel, quantidadeVendida, descricao, valor, estado, imagemProduto) VALUES (:Funcionario_codigoFuncionario, :nomeProduto, :quantidadeDisponivel, :quantidadeVendida, :descricao, :valor, :estado, :imagemProduto)';
        $stmt2 = $conexaoPDO -> prepare($sql2);
        $stmt2 -> execute(array(
            ':Funcionario_codigoFuncionario' => $Funcionario_codigoFuncionario,
            ':nomeProduto' => $nomeProduto,
            ':quantidadeDisponivel' => $quantidadeDisponivel,
            ':quantidadeVendida' => $quantidadeVendida, 
            ':descricao' => $descricao,
            ':valor' => $valor,
            ':estado' => $estado,
            ':imagemProduto' => $novoNomeImagem,
        ));

        echo"
            <script language='javascript' type='text/javascript'> 
                alert('$nomeProduto cadastrado com sucesso.');
                window.location .href='cadastrarProdutosLvEc.php';
            </script>"; die();
    }


    function pegarCodigoFuncionario()
    {
        include("coneccao.php"); // Função que chama a nossa conecção com a base de dados

        $sql1 = "SELECT * FROM funcionario; WHERE Pessoa_codigoPessoa = ".$_SESSION['codigoPessoa'];
            
        try
        {
            $consulta = $conexaoPDO -> prepare($sql1);
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_NUM);
        }
        catch(PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }
    
        foreach($resultado as $valores)
        {
            $codigoFuncionario = $valores[0];
        }

        return $codigoFuncionario;
    }

    function armazenarImagem()
    {
        
        $extensao = strtolower(substr($_FILES['imgProdutos']['name'],-4)); //Pegando extensão do arquivo
        $novoNomeImagem = date("dmy-His") . $extensao; //Definindo um novo nome para o arquivo
        $directorio = './_galeria/_imagens/_produtos_cadastrados/'; //Diretório para uploads
        move_uploaded_file($_FILES['imgProdutos']['tmp_name'], $directorio.$novoNomeImagem); //Fazer upload do arquivo

        return $novoNomeImagem;
    }
        
            
            
            
            
            
            


?>