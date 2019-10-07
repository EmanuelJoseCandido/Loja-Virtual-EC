<!--Autor: Emanuel Cândido -->
<!-- Todos os direitos reservados.-->
<!-- EC-Corporation-->

<?php session_start(); 

    if(!empty($_SESSION['nomeUsuario']))
    {
        echo $_SESSION['nivel']." -- (". $_SESSION['nomeUsuario']. ") - ".$_SESSION['codigoPessoa'] ;
        echo '<a href="sairLvEc.php">Sair</a>';
    }
    else
    {
        $_SESSION['mensagem'] = "Saiu com sucesso";
        header("Location: login_LvEc.php");
    }

?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Produtos</title>
			<link rel="stylesheet" type="text/css" href="_css/stylePrincipa.css"/><!--_css/stylePrincipal.css: correcto--> 
		</head>
		
		<body>
			<div id="corpo-da-pagina">
				<header>
					<a href="index.php"><img src="_galeria/_imagens/logotipo.png"></a>
					<nav id="menu">
                        <h2>Menu Principal</h2>
						<ul>
							<li><a href="index.php">Casa |</a></li>
							<li><a href="historial.php">Historial |</a></li>
							<li><a href="servicos.php">Serviços |</a></li>
							<li><a href="produtos.php">Produtos |</a></li>
							<li><a href="contacto.php">Contacto |</a></li>
						</ul>
					</nav>
                </header>
               
                <?php
        
                    include_once("coneccao.php");
                    $sql1 = "SELECT * FROM produtos";
        
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
                        echo "
                        <div id='mostarProdutos'>
                                <fieldset id='fiel-contacto'>
                                    <h2>$valores[2]</h2>
                                    <img src='_galeria/_imagens/_produtos_cadastrados/$valores[8]' alt='produtos_$valores[0]' class='imagens-produtos'>
                                    <br>Imagem: $valores[8]
                                    <br>Valor: $valores[6]
                                    <p>
                                        <a href='validarCompra.php?codigoProdutos=$valores[0]' value='Comprar'>Comprar</a>
                                    </p> 
                                    <br><br><br><br><br>
                                </fieldset>
                        </div>";
                    }
        
                ?>
				

				
				<footer id="rodape">
					<p>Todos os direitos reservados <br> Copyright &copy; 2019 - by <a href="autor.php">Emanuel Cândido</a></p>
				</footer>
			</div>	
		</body>		
	</html>

