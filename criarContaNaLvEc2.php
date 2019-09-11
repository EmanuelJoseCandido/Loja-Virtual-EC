<!DOCTYPE html>
    <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="content-Type" content="text/html; charset=iso-8859-1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Ultimo Form de Cadastro</title>
        </head>
        <body>
            <div id="corpo-da-pagina">
                <header>
                    <nav id="menu">
                        <h2>Contas</h2>
                            <ul>
                                <li><a href="index.html">Casa |</a></li>
                                <li><a href="contas.html">Contas |</a></li>
                                <li><a href="deposito.html">Serviços |</a></li>
                                <li><a href="sobre.html">Sobre |</a></li>
                                <li><a href="contacto.html">Contacto |</a></li>
                            </ul>
                    </nav>
                </header>
                <section id="principal">
                    <article id="primeiro">
                        <div id="div-contas">
                                <form id="form-contas" method="post" action="validarCriarContaLvEc.php">
                                        <fieldset id="fiel-contacto">
                                    
                                             <!--  Validação da Pessoa -->
                                            <p>
                                                <label for="idIdentificacao">Identificação<span class="asteristico">*</span>: </label><br>
                                                <input type="text" name="identificacao" id="idIdentificacao" size="50" placeholder="Digite a sua identificação">
                                            </p>

                                            <p>
                                                <label for="idSenha1">Digite a senha<span class="asteristico">*</span>: </label><br>
                                                <input type="password" name="senha1" id="idSenha1" placeholder="Digite a sua senha">
                                            </p>

                                            <p>
                                                <label for="idSenha2">Digite a senha novamente<span class="asteristico">*</span>: </label><br>
                                                <input type="password" name="senha2" id="idSenha2" placeholder="Digite a senha novamente">
                                            </p>

                                            <p>
                                                <input type="submit" name="solicitarDados" id="idEnviar" value="Solicitar Dados">
                                            </p>                        
                                        </fieldset>
                                    </form>
                                </div>
                        </div>
                    </article>
                </section>

                <footer id="rodape">

                </footer>
            </div>
        </body>
    </html>