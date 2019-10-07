<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8", TRUE); // Codigo para aceitaçao de caracteres acentuados
    include_once("coneccao.php"); // Função que chama a nossa conecção com a base de dados

    $_SESSION['codigoProdutos'] = $_GET['codigoProdutos'];
    $sql1 = "SELECT * FROM produtos WHERE codigoProdutos = ".$_SESSION['codigoProdutos'] ;

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

    $valorPagar = 0;
    $valorDoProduto = 0;
    foreach($resultado as $valores)
    {
       echo "
            <div id='mostarProdutos'>
                <form method='post' id='formCompra' action='validarCompra2.php'>
                    <fieldset id='fiel-contacto'>
                        <h2>$valores[2]</h2>
                        <img src='_galeria/_imagens/_produtos_cadastrados/$valores[8]' alt='produtos_$valores[0]' class='imagens-produtos'>
                        <br>Valor: $valores[6]
                        <br>Descrição: $valores[5]
                        <p>
                        
                        <label for='idQuantidade'>Quantidade: </label>
                        <select name='quantidade' id='idQuantidade'>
                            <optgroup>
                                ";
                                $valorDoProduto = $valores[6];
                                for($i = 1; $i <=  $valores[3]; $i++)
                                {
                                    echo"<option>$i</option>";
                                }             
                        echo"  
                            </optgroup>
                        </select>
                        </p>
                        <p>
                            <input type='submit' name='btn_comprar' id='idComprar' value='Comprar'>
                        </p> 
                        <br><br><br><br><br>
                    </fieldset>
                </form>
            </div>";
    }
?>