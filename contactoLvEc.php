<!--Autor: Emanuel Cândido -->
<!-- Todos os direitos reservados.-->
<!-- EC-Corporation-->

<?php session_start(); ?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Contacto</title>
			<link rel="stylesheet" type="text/css" href="_css/styleContacto.css"/>
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
				<section id="principal">
					<h1>Contacte-nos</h1>
					<article id="primeiro">	
					 		<div id="div-contacto">
					 			<form id="form-contacto" method="post" action="contacto..php">
									<fieldset id="fiel-contacto">
								
										<p>
											<label for="idNome">Nome: </label><br>
											<input type="text" name ="Nome" id="idNome" size="50" placeholder="Digite os seu nome completo...">
										</p>
										
										<p>
											<label for="idEmail">Email<span class="asteristico">*</span>: </label><br>
											<input type="email" name="Email" id="idEmail" size="50" placeholder="exemplo@exemplo.com">
										</p>
										
										<p>
											<label for="idMensagem">Mensagem<span class="asteristico">*</span>: </label><br>
											<textarea name="Mensagem" id="idMensagem" cols="35" rows="5" placeholder="Digite a sua mensagem aqui..."></textarea>
										</p>
										
										<p>
											<input type="submit" name="Cadastar" id="idEnviar" value="Enviar">
										</p>
					
									</fieldset>
								</form>
								
									<p>
										<a href="adm.php"><input type="submit" name="Adm" id="idAdm" value="ADM"></a>
									</p>
							</div>
					</article>

					<article id="segundo">
						<div id="segundo1">
							<h2>Escritório</h2>
							<p>Telefone: <a href="tel:+244921815882">+244 921 815 882</a></p>
							<p>Telefone: <a href="tel:+244917815882">+244 917 815 882</a></p>
							<p>Email: <a href="mailto:info@alimentacaoangola.co.ao">info@alimentacaoangola.co.ao</a></p>
						</div>
							
						<div id="segundo2">
							<h2>Perguntas Gerais</h2>
							<p>Telefone: <a href="tel:+244921888705">+244 921 888 705</a></p>
							<p>Telefone: <a href="tel:+244917888705">+244 917 888 705</a></p>
							<p>Email: <a href="mailto:infogeral@alimentacaoangola.co.ao">infogeral@alimentacaoangola.co.ao</a></p>
						</div>
					</article>
				</section>
				
					<footer id="rodape">
						<p><span>Localização da Sede:</span> Benfica, Autodrómo, Rua do N'guvulo, Travessa do Kuito.</p>
						<p>Todos os direitos reservados <br> Copyright &copy; 2018 - by <a href="autor.php">Emanuel Cândido</a></p>
					</footer>
				</div>
			</div>
		</body>
	</html>