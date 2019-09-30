<?php
    session_start();

    header("Content-Type: text/html; charset=utf-8", TRUE); // Codigo para aceitaçao de caracteres acentuados
    include_once("coneccao.php"); // Função que chama a nossa conecção com a base de dados

    $identificacao = isset($_POST['identificacao']) ? $_POST['identificacao']:0;
    $senhaInformacao = criptografar(isset($_POST['senhaInformacao']) ? $_POST['senhaInformacao']:0);
    $identificacaoSistema = "";
    $senhaInformacaoSistema = "";

    $sql1 = "SELECT * FROM pessoa WHere identificacao = '$identificacao' and senhaInformacao = '$senhaInformacao'";     
    
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
        $codigoPessoa = $valores[0];
        $nome = $valores[1];
        $identificacaoSistema = $valores[3];
        $senhaInformacaoSistema = $valores[4];   
    }
    
    if(($identificacao == $identificacaoSistema) && ($senhaInformacao == $senhaInformacaoSistema))
    {
        $sql2 = "SELECT * FROM pessoa
                             INNER JOIN endereco ON endereco.Pessoa_codigoPessoa = pessoa.codigoPessoa 
                             INNER JOIN contactos ON contactos.Pessoa_codigoPessoa = pessoa.codigoPessoa 
                             INNER JOIN banco ON banco.Pessoa_codigoPessoa = pessoa.codigoPessoa 
                             INNER JOIN cartaobanco ON cartaobanco.Pessoa_codigoPessoa = pessoa.codigoPessoa WHERE codigoPessoa = '$codigoPessoa'";
        
        try
        {
            $consulta = $conexaoPDO -> prepare($sql2);
            $consulta -> execute(Array('codigoPessoa' => $codigoPessoa));
            $resultado = $consulta -> fetchAll(PDO::FETCH_NUM);
        }
        catch(PDOException $e) 
        {
            echo 'Error: ' . $e->getMessage();
        }

        foreach($resultado as $valores)
        {
            #<legend id='idLegendDadosPessoais'>Dados Pessoais</lengend>
            echo " 
            <!DOCTYPE html>
            <html lang='pt-BR'>
                <head>
                    <meta charset='UTF-8'>
                    <meta http-equiv='content-Type' content='text/html; charset=iso-8859-1'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                    <link rel='stylesheet' href='_css/styleForms.css'>  
                    <title>Loja Jogos-Kamba</title>
                </head>
                <body>
                    <form id='form-pessoa' method='post' action='erro.php'>
                        <fieldset id='fiel-pessoa'>
                            <span class='tituloDoFieldset'>
                                 Dados Pessoais
                                 <hr>
                            </span>
                            <p>
                                <label for='idNome'>Nome: </label><br>
                                <input type='text' name ='nome' id='idNome' size='50' value='$valores[1]' disabled='disabled'> 
                            </p>

                            <p class='esquerda'>
                                <label for='idIdentificacao'>Identificação: </label><br>
                                <input type='text' name='identificacao' id='idIdentificacao' size='50' value='$valores[3]' disabled='disabled'> 
                            </p>
                        </fieldset>
                    </form>
                    
                    <form id='form-pessoa' method='post' action='erro.php'>
                        <fieldset id='fiel-pessoa'>
                            <span class='tituloDoFieldset'>
                                 Endereço
                                 <hr>
                            </span>
                            <p>
                                <label for='idProvincia'>Província: </label><br>
                                <input type='text' name='provincia' id='idProvincia' size='50' value='$valores[8]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idMunicipio'>Município: </label><br>
                                <input type='text' name='municipio' id='idMunicipio' size='50' value='$valores[9]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idBairro'>Bairro: </label><br>
                                <input type='text' name='bairro' id='idBairro' size='50' value='$valores[10]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idRua'>Rua: </label><br>
                                <input type='text' name='rua' id='idRua' size='50' value='$valores[11]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idNumeroDeCasa'>Numero de casa: </label><br>
                                <input type='text' name='numeroDeCasa' id='idNumeroDeCasa' size='50' value='$valores[12]' disabled='disabled'> 
                            </p>
                        </fieldset>
                    </form>

                    <form id='form-pessoa' method='post' action='erro.php'>
                        <fieldset id='fiel-pessoa'>
                            <span class='tituloDoFieldset'>
                                 Contacto
                                 <hr>
                            </span>
                            <p>
                                <label for='idTelefone1'>Telefone1: </label><br>
                                <input type='text' name='telefone1' id='idTelefone1' size='50' value='$valores[16]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idTelefone2'>Telefone2: </label><br>
                                <input type='text' name='telefone2' id='idTelefone2' size='50' value='$valores[17]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idEmail'>Email: </label><br>
                                <input type='text' name='email' id='idEmail' size='50' value='$valores[18]' disabled='disabled'> 
                            </p>
                        </fieldset>
                    </form>

                    <form id='form-pessoa' method='post' action=''>
                        <fieldset id='fiel-pessoa'>
                            <span class='tituloDoFieldset'>
                                 Dados Referentes ao Banco
                                 <hr>
                            </span>
                            <p>
                                <label for='idNomedoBanco'>Nome do Banco: </label><br>
                                <input type='text' name='nomedoBanco' id='idNomedoBanco' size='50' value='$valores[21]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idImagem'>Imagem: </label><br>
                                <input type='text' name='imagem' id='idImagem' size='50' value='$valores[25]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idValorNaConta'>Valor na conta: </label><br>
                                <input type='text' name='valorNaConta' id='idValorNaConta' size='50' value='$valores[31]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idNumeroDeContaElectronica'>Numero de Conta Electronica: </label><br>
                                <input type='text' name='NumeroDeContaElectronica' id='idNumeroDeContaElectronica' size='50' value='$valores[32]' disabled='disabled'> 
                            </p>

                            <p>
                                <label for='idEstado'>Estado: </label><br>
                                <input type='text' name='estado' id='idEstado' size='50' value='$valores[34]' disabled='disabled'> 
                            </p>
                        </fieldset>
                    </form>

                    <form id='login-criar-conta' method='post' action='validarPin.php'>
                        <fieldset id='fiel-pessoa'>
                            <span class='tituloDoFieldset'>
                                 Dados referentes ao Login
                                 <hr>
                            </span>
                            <p>
                                <label for='idPin'>PIN para autenticarmos os dados referentes ao banco: </label><br>
                                <input type='text' name='pin' id='idPin' size='50' placeholder='Digite o seu PIN...' > 
                            </p>

                            <p>
                                <label for='idUsuario'>Usuário: </label><br>
                                <input type='text' name='usuario' id='idUsusario' size='50' placeholder='Digite o seu usuário...'> 
                            </p>

                            <p>
                            <label for='idSenha1'>Digite a senha: </label><br>
                            <input type='password' name='senha1' id='idSenha1' size='50' placeholder='Digite a sua senha'>
                            </p>

                            <p>
                                <label for='idSenha2'>Digite a senha novamente: </label><br>
                                <input type='password' name='senha2' id='idSenha2' size='50' placeholder='Digite a senha novamente'>
                            </p>

                            <p>
                                <input type='submit' name='cadastarDados' id='idEnviar' value='Cadastrar Dados'>
                            </p>  
                        </fieldset>
                    </form>
                <footer id='rodape'>
                    <p><span>Localização da Sede:</span> Benfica, Autodrómo, Rua das Aves, Travessa do Kuito.</p>
                    <p>Todos os direitos reservados <br> Copyright &copy; 2019 - by <a href='autor.php'>Emanuel Cândido</a></p>
                </footer>
            </body>
        </html>"; 
            
           $_SESSION['nome'] =  $valores[1];
           $_SESSION['Pessoa_codigoPessoa'] =  $valores[14];
           $_SESSION['pinSistema'] =  $valores[33];

        }

    }
    

    function criptografar($texto)
    {
        return sha1(md5($texto));
    }

?>

          