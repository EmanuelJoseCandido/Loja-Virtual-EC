<!--Autor: Emanuel Cândido -->
<!-- Todos os direitos reservados.-->
<!-- EC-Corporation-->

<?php session_start();?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
			
			<!--Folha de estilo da pagina-->
			<link rel="stylesheet" href="_css/stylePrincipal.css">
			
			<!-- Folha de estilo proveniete do Font Awesome Icones() -->
			<link rel="stylesheet" href="_css/all.css">
            <title>LOJA KAMBA</title>
        </head>
        <body>
            <!--Navegação-->
            <nav class="nav">
                <div class="nav-menu linha">
                    <div class="nav-logotipo">
                        <a href="#" class="texto-azul">Logotipo</a>
					</div>
					<div class="outradiv">
						<div class="outradiv-icones">
							<i class="fas f-bars"></i>
						</div>
					</div>
                    <div>
                        <ul class="itens-navegacao"> 
							<?php
								if(!empty($_SESSION['nomeUsuario']))
								{
									if($_SESSION['nivel'] == "Admnistrador(a)")
									{
										echo "<div class='nome-usuario'>".$_SESSION['nivel']."<br>". $_SESSION['nomeUsuario']. "</div>";
									}
									else
									{
										echo "<div class='nome-usuario'> ".$_SESSION['nomeUsuario']; echo"</div>";
									}
								}
							?>

							<li class="link-navegacao"><a href="index.php">Casa</a></li>
							<li class="link-navegacao"><a href="#">Serviços</a></li>
							<?php 
								if($_SESSION['nivel'] == "Admnistrador(a)")
								{
									echo 
									"<li class='link-navegacao'><a href='#'>Aréa Administrativa</a>
										<ul>
											<li class='link-navegacao'><a href='criarFuncionario.php'>Criar Conta</a></li>
											<li class='link-navegacao'><a href='cadastrarProdutosLvEc.php'>Cadastrar Produtos</a></li>
										</ul>
									</li>";
								}
							?>
							<li class="link-navegacao"><a href="produtos.php">Produtos</a></li>
							<li class='link-navegacao'><a href='#sobre'>Sobre</a></li>
							<li class="link-navegacao"><a href="#contacto">Contacto</a></li>

							<?php
								if(!empty($_SESSION['nomeUsuario']))
								{
									echo"<li class='link-navegacao'><a href='sairLvEc.php'>Sair</a></li>";
								}
								else
								{
									echo"<li class='link-navegacao'><a href='login_LvEc.php'>Entrar</a></li>";
								}
							?>
						</ul>
					</div>
					
                    <div class="redes-sociais topo">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
					</div>
					
                </div>
			</nav>
			<!--Navegação-->
			
			<!-- Parte princípal da section -->
			
			<main>

				  <!-- Titulo do Site -->
				 
				  <section class="site-titulo">
					  <div class="site-cor-do-fundo">
						  <h2>Loja Kamba</h2>
						  <h1>O melhor site de vendas em Angola.</h1>
						  <button class="botao">Ver mais</button>
					  </div>
				  </section>
				  
				  <!-- Titulo do Site -->

				  <!-- Produtos em destaque -->

				  <section class="produtos">
					  <div class="recipiente">
						  <div class="slider tema produto-em-destaque">
							<h2 class="h2-produtos">Produtos em destaque</h2>
							<div class="destaques-conteudo">
								<img src="_galeria/_imagens/_jogos/ps4/ps4/call_of_duty_bo2.jpg" alt="">
								<div class="titulo-do-produto">
									<h3>Fifa 18</h3>
									<span>18 000 Kwanzas</span>
									<button class="botao botao-do-produto">Comprar</button>
									<span></span>
								</div>
							</div>

							<div class="destaques-conteudo">
								<img src="_galeria/_imagens/_jogos/ps4/ps4/fifa18_1.jpg" alt="">
								<div class="titulo-do-produto">
									<h3>Fifa 18</h3>
									<span>18 000 Kwanzas</span>
									<button class="botao botao-do-produto">Comprar</button>
									<span></span>
								</div>
							</div>

							<div class="destaques-conteudo">
								<img src="_galeria/_imagens/_jogos/ps4/ps4/watch_dogs.jpg" alt="">
								<div class="titulo-do-produto">
									<h3>Fifa 18</h3>
									<span>18 000 Kwanzas</span>
									<button class="botao botao-do-produto">Comprar</button>
									<span></span>
								</div>
							</div>

							<div class="destaques-conteudo">
								<img src="_galeria/_imagens/_consolas/_ps/_ps4/ps4_preta.jpg" alt="">
								<div class="titulo-do-produto">
									<h3>Fifa 18</h3>
									<span>18 000 Kwanzas</span>
									<button class="botao botao-do-produto">Comprar</button>
									<span></span>
								</div>
							</div>

							<div class="destaques-conteudo">
								<img src="_galeria/_imagens/_jogos/xbox/xbox_one/fifa_15.jpg" alt="">
								<div class="titulo-do-produto">
									<h3>Fifa 18</h3>
									<span>18 000 Kwanzas</span>
									<button class="botao botao-do-produto">Comprar</button>
									<span></span>
								</div>
							</div>

							<div class="destaques-conteudo">
								<img src="_galeria/_imagens/_consolas/_xbox/_xbox_360/xbox_360_branca.jpg" alt="">
								<div class="titulo-do-produto">
									<h3>Fifa 18</h3>
									<span>18 000 Kwanzas</span>
									<button class="botao botao-do-produto">Comprar</button>
									<span></span>
								</div>
							</div>
						  </div>
					  </div>
				  </section>

				  <!-- Produtos em destaque -->

			</main>

			<!-- Rodapé -->

			<footer class="rodape">
				<div class="repiciente">
					<div class="sobre">
						<h2>Sobre</h2>
					</div>
					<div class="mensagem">
						<h2>Mensagem</h2>
					</div>
					<div class="seguir">
						<h2>Seguir</h2>
					</div>
				</div>
			</footer>

			<!-- Rodapé -->

			<!-- Parte princípal da section -->           

            <!--Arquivo javascript-->
            <script src="_js/scriptPrincipal.js"></script>
        </body>
    </html>					

