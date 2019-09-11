<?php
    session_start();
     /**
     * Autor: Emanuel Cândido
     * Email: emanueljosecandido@hotmail.com
     * GitHub: EmanuelJoseCandido
     * Facebook: Emanuel Cândido
     * Telfones: (Unitel: 921815882) | (Movicel: 990815882)
     * Descrição: página denominada controle.php, que serve como uma ponte entre o html e mysql para cadastro de dados enviadas pela p]agina conta.html.
     * 
     */

    header("Content-Type: text/html; charset=utf-8", TRUE); // Codigo para aceitaçao de caracteres acentuados
    include_once("coneccao.php"); // Função que chama a nossa conecção com a base de dados

    
    $identificacao = isset($_POST['identificacao']) ? $_POST['identificacao']:0;
    $senhaInformacao = criptografar(isset($_POST['senhaInformacao']) ? $_POST['senhaInformacao']:0);

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
            <form id='form-pessoa' method='post' action='erro.php'>
                <fieldset id='fiel-pessoa'>
                    <p>
                        <label for='idNome'>Nome: </label><br>
                        <input type='text' name ='nome' id='idNome' size='50' value='$valores[1]' disabled='disabled'> 
                    </p>

                    <p>
                        <label for='idIdentificacao'>Identificação: </label><br>
                        <input type='text' name='identificacao' id='idIdentificacao' size='50' value='$valores[3]' disabled='disabled'> 
                    </p>
                </fieldset>
            </form>
            
            <form id='form-pessoa' method='post' action='erro.php'>
                <fieldset id='fiel-pessoa'>
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

            <form id='form-pessoa' method='post' action='erro.php'>
                <fieldset id='fiel-pessoa'>
                    <p>
                        <label for='idNomedoBanco'>Nome do Banco: </label><br>
                        <input type='text' name='nomedoBanco' id='idNomedoBanco' size='50' value='$valores[21]' disabled='disabled'> 
                    </p>

                    <p>
                        <label for='idImagem'>Imagem: </label><br>
                        <input type='text' name='imagem' id='idImagem' size='50' value='$valores[25]' disabled='disabled'> 
                    </p>
                </fieldset>
            </form>

            <form id='form-pessoa' method='post' action='validarPin.php'>
                <fieldset id='fiel-pessoa'>
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

                    <p>
                        <label for='idPin'>Digite o seu PIN para autenticarmos: </label><br>
                        <input type='text' name='pin' id='idPin' size='50' placeholder='Digite o seu PIN...' > 
                    </p>

                    <p>
                        <label for='idUsuario'>Usuário: </label><br>
                        <input type='text' name='usuario' id='idUsusario' size='50' placeholder='Digite o seu usuário...'> 
                    </p>

                    <p>
                    <label for='idSenha1'>Digite a senha<span class='asteristico'>*</span>: </label><br>
                    <input type='password' name='senha1' id='idSenha1' placeholder='Digite a sua senha'>
                    </p>

                    <p>
                        <label for='idSenha2'>Digite a senha novamente<span class='asteristico'>*</span>: </label><br>
                        <input type='password' name='senha2' id='idSenha2' placeholder='Digite a senha novamente'>
                    </p>

                    <p>
                         <input type='submit' name='cadastarDados' id='idEnviar' value='Cadastrar Dados'>
                    </p>  
                </fieldset>
            </form>"; 
            
            
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