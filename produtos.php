<!--Autor: Emanuel Cândido -->
<!-- Todos os direitos reservados.-->
<!-- EC-Corporation-->

<?php session_start(); 

    if(!empty($_SESSION['nomeUsuario']))
    {
        echo "Ola Sr(a) ". $_SESSION['nomeUsuario']. " - ".$_SESSION['codigoPessoa'];
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
			<link rel="stylesheet" type="text/css" href="_css/stylePrincipal.css"/>
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
                
                    foreach($resultado as $valores)
                    {
                        echo 'Nome do Produto: '.$valores[2];
                    }
        
                ?>
				
				
				<footer id="rodape">
					<p>Todos os direitos reservados <br> Copyright &copy; 2018 - by <a href="autor.php">Emanuel Cândido</a></p>
				</footer>
			</div>	
		</body>		
	</html>

