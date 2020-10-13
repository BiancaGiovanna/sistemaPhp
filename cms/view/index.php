<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/partial/cms.css">
    <link rel="shortcut icon" href="image/icon/cms.png" type="image/x-icon">
    <title>CMS Procedural</title>
</head>
<body>
    <div id="container">
        <div id="painelControle">
            <header>
                <h1>CMS-Sistema de Gerenciamento do Site</h1>
                <div id="logoCms">
                    <img src="image/icon/iconredragon.png" alt="logo">
                </div>
            </header>
            <div id="menu">
                <div class="btnFuncitonAdm">
                    <a href="#" onclick="mostrar_abas(this);" id="mostra_aba1" >
                        <div class="btnStyle menuBtn">
                            <img src="image/icon/conteudo.png" alt="conteudo">
                        </div>
                    </a>
                    <span class="titleBtn">Adm.conteudo </span> 
                </div>
                <div class="btnFuncitonAdm">
                    <a href="#" onclick="mostrar_abas(this);" id="mostra_aba2" >
                        <div id="menuBtn" class="btnStyle menuBtn">
                            <img src="image/icon/telefone.png" alt="telefone">
                        </div>
                    </a>
                    <span class="titleBtn">Adm.Fale Conosco </span> 
                </div>
                <div class="btnFuncitonAdm">
                    <a href="#" onclick="mostrar_abas(this);" id="mostra_aba3" >
                        <div  class="btnStyle menuBtn">
                            <img src="image/icon/novo-produto.png" alt="novoProduto">
                        </div>
                </a>

                    <span class="titleBtn">Adm.Produtos</span> 
                </div>
                <div class="btnFuncitonAdm">
                    <a href="#" onclick="mostrar_abas(this);" id="mostra_aba4">
                        <div class="btnStyle menuBtn">
                            <img src="image/icon/user.png" alt="user">
                        </div>
                    </a>
                    <span class="titleBtn">Adm.Usuários</span> 
                </div>

                <div class="user">
                    <p id="userName">Bem-Vindo {user.name}</p>
                    <a href="../../front/index.html">
                        <p id="userLoggout">Loggout</p> 
                    </a>
                </div>
            </div>
            <div id="functionAdm">
                <div class="listAdm">
                    <div id="div_aba1" class="hidden">
                        <div class="listaConteudo">
                            <a href="#" class="btnItem">
                                <div class="item">Produto1</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            
                          </div>
                        
                    </div>
                    
                    <div id="div_aba2" class="hidden">
                        <div class="listaConteudo">
                            <a href="#" class="btnItem">
                                <div class="item">Produto2</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            
                          </div>
                    </div>
                    <div id="div_aba3" class="hidden">
                        <div class="listaConteudo">
                            <a href="#" class="btnItem">
                                <div class="item">Produto3</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            
                          </div>
                    </div>
                    <div id="div_aba4" class="hidden">
                        <div class="listaConteudo">
                            <a href="#" class="btnItem">
                                <div class="item">Produto4</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            <a href="#" class="btnItem">
                                <div class="item">Produto</div>
                            </a>
                            
                          </div>
                    </div>
                </div>
                
            </div>
            <footer>
                <span id="dev">Desenvolvido por: 
                    <span id="name"> Bianca Giovanna</span> 
                </span>
            </footer>
        </div>
    </div>
    <script src="script/contentAdm.js"></script>
</body>
</html>