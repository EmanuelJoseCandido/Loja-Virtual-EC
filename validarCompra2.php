<?php
    session_start();
    header("Content-Type: text/html; charset=utf-8", TRUE); // Codigo para aceitaçao de caracteres acentuados
    include_once("coneccao.php"); // Função que chama a nossa conecção com a base de dados

    $sql1 = "SELECT * FROM produtos WHERE codigoProdutos = ".$_SESSION['codigoProdutos'];

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

    foreach($resultado as $valores)
    {
        $btn_comprar = isset($_POST['btn_comprar']);

        if($btn_comprar)
        {
            $_SESSION['nomeDoProduto'] = $valores[2];
            $_SESSION['valorDoProduto'] = $valores[6];
            $_SESSION['imgemDoProduto'] = $valores[8];
            $_SESSION['quantidadeAComprar'] = isset($_POST['quantidade']) ? $_POST['quantidade']:0;
            $_SESSION['valorTotalPagar'] =  $_SESSION['quantidadeAComprar'] *  $_SESSION['valorDoProduto'];
            

            echo "
            <div id='mostarProdutos'>
                <form method='post' id='formCompra' action='ValidarDeComprasCliente.php'>
                    <fieldset id='fiel-contacto'>
                        <h2>".$_SESSION['nomeDoProduto'];echo "</h2>
                        <br>Imagem:".$_SESSION['imgemDoProduto'];echo "</h2> 
                        <br>Valor:".$_SESSION['valorDoProduto'];echo "</h2>
                        <br>Quantidade: ".$_SESSION['quantidadeAComprar'];
                        echo" <br> Valor a pagar:".$_SESSION['valorTotalPagar'];
                        echo"
                        <p>
                            <input type='submit' name='btn_comprar' id='idComprar' value='Comprar'>
                        </p> 
                        <br><br><br><br><br>
                    </fieldset>
                </form>
            </div>";
        }
}
?>