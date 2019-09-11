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
     

    $senha1 = criptografar(isset($_POST['senha1']) ? $_POST['senha1']:0);
    $senha2 = criptografar(isset($_POST['senha2']) ? $_POST['senha2']:0);
    $pinDigitado = isset($_POST['pin']) ? $_POST['pin']:0;
    $Pessoa_codigoPessoa = $_SESSION['Pessoa_codigoPessoa'];

    if($pinDigitado == $_SESSION['pinSistema'])
    {
        //Codição para checar se as senhas coincidem
        if($senha1 == $senha2)
        {
            $descontos = 0;
            // Codigo de inserção de informação na tabela cliente
            $sql1 = 'INSERT INTO cliente(Pessoa_codigoPessoa, descontos) VALUES (:Pessoa_codigoPessoa, :descontos)';
            $stmt1 = $conexaoPDO -> prepare($sql1);
            $stmt1 -> execute(array(
                ':Pessoa_codigoPessoa' => $Pessoa_codigoPessoa, 
                ':descontos' => $descontos, 
            ));

            $Cliente_codigoCliente = $conexaoPDO->lastInsertId();
            $palavraChave = $senha1;
            $situacao = "Activo(a)";
            $nivel = "Normal";
            
            #date_default_timezone_set("America/New_York");
            date_default_timezone_set("Africa/Luanda");
            #date_default_timezone_set("Europe/Amsterdam");
            $dataDeCadastro = date('Y-m-d H:i:s');
            
            $sql1 = "SELECT * FROM usuario";
            
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
        
            $_SESSION['codigoUsuario'] = '';

            foreach($resultado as $valores)
            {
                $_SESSION['codigoUsuario'] = $valores[0];
            }

            if($_SESSION['codigoUsuario'] == NULL)
            {
                $nivel = "Admnistrador(a)";
            }

            $usuario = isset($_POST['usuario']) ? $_POST['usuario']:0;
            // Codigo de inserção de informação na tabela usuario
            #Depois devo trocar o formato da data e hora de cadastro na base de dedos.
            $sql2 = 'INSERT INTO usuario(Pessoa_codigoPessoa, Cliente_codigoCliente, usuario, palavraChave, situacao, nivel, dataDeCadastro) VALUES (:Pessoa_codigoPessoa, :Cliente_codigoCliente, :usuario, :palavraChave, :situacao, :nivel, :dataDeCadastro)';
            $stmt2 = $conexaoPDO -> prepare($sql2);
            $stmt2 -> execute(array(
                ':Pessoa_codigoPessoa' => $Pessoa_codigoPessoa,
                ':Cliente_codigoCliente' => $Cliente_codigoCliente,
                ':usuario' => $usuario,
                ':palavraChave' => $palavraChave, 
                ':situacao' => $situacao,
                ':nivel' => $nivel,
                ':dataDeCadastro' => $dataDeCadastro,
            ));

            $Usuario_codigoUsuario = $conexaoPDO->lastInsertId();
            $dataDeEntrada = date('Y-m-d H:i:s');
            $sql3 = 'INSERT INTO login(Usuario_codigoUsuario, dataDeEntrada) VALUES (:Usuario_codigoUsuario, :dataDeEntrada)';
            $stmt3 = $conexaoPDO -> prepare($sql3);
            $stmt3 -> execute(array(
                ':Usuario_codigoUsuario' => $Usuario_codigoUsuario,
                ':dataDeEntrada' => $dataDeEntrada, 
            ));

            
            echo"
                <script language='javascript' type='text/javascript'> 
                    alert('Dados cadastrados com sucesso.');
                    window.location .href='index.php';
                </script>"; die();
        }
        else
        {
            // Senao coincidirem ela volta para página validarCriarContaLvEc.php 
            echo"
                <script language='javascript' type='text/javascript'> 
                    alert('As senhas não coicidem.');
                    window.location .href='validarCriarContaLvEc.php';
                </script>"; die(); 
        }
    }
    else
    {
        // Se Pin não for o correcto volta para página validarCriarContaLvEc.php 
        echo"
        <script language='javascript' type='text/javascript'> 
            alert('O pin digitado está incorrecto.');
            window.location .href='validarCriarContaLvEc.php';
        </script>"; die(); 
    }

    function criptografar($texto)
    {
        return sha1(md5($texto));
    }

?>