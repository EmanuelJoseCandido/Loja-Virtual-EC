<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8", TRUE); // Codigo para aceitaçao de caracteres acentuados
    include_once("coneccao.php"); // Função que chama a nossa conecção com a base de dados
 
    $botaoEntrar = filter_input(INPUT_POST, 'entrar', FILTER_SANITIZE_STRING);

    if($botaoEntrar)
    {
        $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $palavraChave = criptografar(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
        
        
        if((!empty($usuario) && (!empty($palavraChave))))
        {
            $sql1 = "SELECT * FROM usuario WHERE usuario = '$usuario'";
            
            //CodigoFuncionario
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
                $palavraChaveDoSistema = $valores[5];
                $_SESSION['nomeUsuario'] = $valores[4];
                $_SESSION['codigoPessoa'] = $valores[1];
                $_SESSION['nivel'] = $valores[7];
            }

            if($palavraChave == $palavraChaveDoSistema)
            {
                header("Location: index.php");
            }
            else
            {
                $_SESSION['mensagem'] = "Email e senha incorreto";
                header("Location: login_LvEc.php");
            }

        }
        else
        {
            $_SESSION['mensagem'] = "Email e senha incorreto";
            header("Location: login_LvEc.php");
        }
    }
    else
    {
        $_SESSION['mensagem'] = "Pagina não encontrada";
        header("Location: login_LvEc.php");
    }

    function criptografar($texto)
    {
        return sha1(md5($texto));
    }
?>