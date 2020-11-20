<?php
    require_once('../../backend/src/controllers/config.php"');

    //Import do arquivo de função para conectar no BD
    require_once('../../backend/src/controllers/conexaoMysql.php');

    //chama a função que vai estabelecer a conexão com o BD
    if(!$conex = conexaoMysql())
    {
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
        //die; //Finaliza a interpretação da página
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/style/partial/headerDesk.css">
    <link rel="stylesheet" href="../src/style/partial/landingPage.css">
    <link rel="stylesheet" href="../src/style/partial/slider.css">
    <link rel="stylesheet" href="../src/style/main.css">
    <link rel="shortcut icon" href="../src/image/icon/iconredragon.png" type="image/png">

    <title>Landing Page</title>
</head>
<body>
    <header>
            <div class=" conteudo centerObject">
                <a href="index.php">
                    <div class="logo">
                        <img src="../src/image/icon/redragon-logo-2.png" alt="logo">
                    </div>
                </a>

                <div class="menuContainer" >
                             
                    <div class="divMenu centerObject" >
                        <ul class="menu">
                            <li class="menuItens"><a href="#empresa">A Empresa</a></li>
                            <li class="menuItens"><a href="#ourStoresAndContactSection">Contatos</a></li>
                            <li class="menuItens"><a href="#enderecos">Lojas</a></li>

                        </ul>
                    </div>
                </div> 
                <form action="" method="post">
                    <div class="loginAdmin">
                        <div>
                            <label for="username">Usuário:</label>
                            <input type="text" id="username" name="username" required>
                        </div>
                        
                        <div>
                            <label for="senha">Senha:</label>
                            <input type="password" id="senha" name="password" required>
                        </div>
                        <input type="submit" value="Login" id="btnlogin">
                        
                    </div>
                </form> 
               
            </div>
            
    </header>
    
    <main>
        <div class="centerObject conteudo ">
            
            <div class="sliderLandingPage">
                <nav>
                    <div class="btnSociais" id="btnFace"><a href="https://www.facebook.com/redragonbr" target="_blank"><img src="../src/image/sociais/facebook.png" alt="facebook"></a></div>
                    <div class="btnSociais" id="btnInsta"><a href="https://www.instagram.com/redragonbrasil/?hl=pt-br" target="_blank"><img src="../src/image/sociais/instagram.png" alt="instagram"></a></div>
                    <div class="btnSociais" id="btnTwitter"><a href="https://twitter.com/RedragonBR" target="_blank"><img src="../src/image/sociais/twitter.png" alt="twitter"></a></div>
                </nav>

                    <div id="home">
                        <div id="slideshow">
                            <div class="slide active" style="background-image: url('../src/image/slider/vataSlide1.png');">
                            </div>
                            <div  class="slide" style="background-image: url('../src/image/slider/amsaSlide2.png');">
                               
                            </div>
                            <div  class="slide" style="background-image: url('../src/image/slider/zeusSlide3.png');">
                                
                            </div>
                            <div  class="slide" style="background-image: url('../src/image/slider/monitorSlide4.png');">
                               
                            </div>

                            <div  class="slide" style="background-image: url('../src/image/slider/lunarSlide5.png');">
                               
                            </div>

                            <div  class="slide" style="background-image: url('../src/image/slider/cobraSlide6.png');">
                               
                            </div>

                            <div  class="slide" style="background-image: url('../src/image/slider/darkAvengerSlide7.png');">
                               
                            </div>

                            <div  class="slide" style="background-image: url('../src/image/slider/kumaraSlide8.png');">
                               
                            </div>
                        </div>
                        <div id="controls">
                            <div id="prev">&larr;</div>
                            <div id="next">&rarr;</div>
                        </div>
                        <div id="balls-indicator">
                        </div>
                    </div>

            </div>
        </div>
        <div class="centerObject conteudo ">
            <div class="divProdutos">
                <div id="lateralMenu">
                    <div class="items"> 
                        Item 1
                        <div class="subItems">
                            <ul>
                                <li>Sub1</li>
                                <li>Sub2</li>
                            </ul>
                        </div>
                    </div>
                    <div class="items"> 
                        Item 2 
                        <div class="subItems">
                            <ul>
                                <li>Sub1</li>
                                <li>Sub2</li>
                                <li>Sub3</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="divPesquisa">
                        <div class="barraPesquisa">
                            <span>Pesquisa:</span><input type="text" id="pesquisa" name="pesquisa"> 
                            <input type="submit" value="Buscar" id="btnBuscar">
                        </div>
                        <h1>Produtos encotrados XXX</h1>
                        <div class="listaProdutosLinha">
                            <div class="vendaProduto">
                                <div class="imageProduto centerObject">
                                    <img src="../src/image/produto/headsetzeus.jpg" alt="">
                                </div>
                                <div class="descProduto">
                                    Nome: 
                                    <br>
                                    Descrição:
                                    <br>
                                    Preço:<span class="preco">R$450</span> 
                                </div>
                                <button class="btnSaibaMais">Saiba Mais</button>
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
        <div class="centerObject conteudo ">
            <h1>Nossos Produtos em Destaque:</h1>
        </div>
        <div class="centerObject conteudo ">
            <div class="divProdutosDestaque">
                <div class="produtoDestaque">
                    <div class="imageProdutoDestaque centerObject">
                        <img src="../src/image/produto/vatapro.jpg" alt="">
                    </div>
                    <span>Nome do produto</span>
                    <button class="btnSaibaMais">Saiba Mais</button>
                </div>
               
            </div>
        </div>

        <div class="centerObject conteudo ">
                <h1>Nossos Produtos em Promoção</h1>
        </div>
        <div class="centerObject conteudo ">
            <div class="divprodutoPromocao">
                <div class="promocaoline">
                    <div class="produtoPromocao">
                        <div class="imageProduto centerObject">
                            <img src="../src/image/produto/monitorgamerRedragon.jpg" alt="">
                        </div>
                        <span class="alinhamentoPromocao">
                        Nome:
                        </span>
                        <br>
                        <span class="alinhamentoPromocao">
                          
                            <span class="precoAntigo">de R$ xxxx</span>
                            <span class="precoNegrito">por R$ xxxx</span>
                        </span>
                        <br>
                        
                        <button class="btnSaibaMais">Saiba Mais</button>
                    </div>
                </div>


        <div class="centerObject conteudo">
            <h1>Sobre a Redragon</h1>
        </div>
        <?php
             $sql = "select * from tblsobre ";

             $select = mysqli_query($conex, $sql);
                     
                     
             while($rsSobre= mysqli_fetch_assoc($select))
                {    
        ?>
        <div class="centerObject conteudo" id="empresa">
            <div id="textoEmpresa" >
                <p><?=$rsSobre['sobre']?></p>
                <?php 
                
                    }
                                        
                ?>
            </div>
        </div>
        

        <div class="centerObject conteudo">
            <div id="ourStoresAndContactSection">
                <div class="ourStoresAndContactBox">
                    <div class="contact">
                        <form name="frmcontato" method="post" action="../../backend/src/model/inserirContato.php">
                        <div class="entreEmContato">
                            <h1>Entre em contato conosco</h1>
                        </div>
                            <div class="areaTitle-contato">
                                <div class="contactUs">
                                    Nome:  
                                </div>
                                <div class="contactUs">
                                    Telefone:     
                                </div>
                                <div class="contactUs">
                                    Celular:     
                                </div>
                                <div class="contactUs">
                                    Email:  
                                </div>
                                <div class="contactUs">
                                    Home Page:  
                                </div>
                                <div class="contactUs">
                                    Profissão:  
                                </div>
                                <div class="contactUs">
                                    Sexo:  
                                </div>
                                <div class="contactUs">
                                   Sugestão/Crítica:  
                                </div>
                                <div class="contactUs">
                                    Mensagem:  
                                 </div>
                            </div>
                            <div class="areaForm-contato">
                                <div class="contactUs">
                                    <input type="text" name="txtnome" value="" class="inputSize" required  placeholder="Digite seu Nome" pattern="[a-z A-Z é]*"/> 
                                </div>
                                <div class="contactUs">
                                    <input type="text" name="txttelefone" value="" class="inputSize" onkeypress="MascaraTelefone(this);" maxlength="13"  pattern="[(][0-9]{2}[)][0-9]{4}-[0-9]{4}" placeholder="(99)9999-9999"/> 
                                </div>
                                <div class="contactUs">
                                    <input type="text" name="txtcelular" value="" class="inputSize"  onkeypress="Mascara(this);" maxlength="14" required pattern="[(][0-9]{2}[)][0-9]{5}-[0-9]{4}" placeholder="(99)99999-9999"/> 
                                </div>
                                <div class="contactUs">
                                    <input type="text" name="txtemail" value="" class="inputSize" placeholder="name@example.com" required/> 
                                </div>
                                <div class="contactUs">
                                    <input type="text" name="txthome" value="" class="inputSize" placeholder="Link para seu site/perfil pessoal"/> 
                                </div>
                                <div class="contactUs">
                                    <input type="text" name="txtprofissao" value="" class="inputSize" placeholder="Area de atuação" required/> 
                                </div>
                                <div class="contactUs">
                                    <select name="sltgenero">

                                        <option value="">Selecione um Item</option>
                                        <?php
                                            $sql = "select * from tblgeneros";
                                            $select = mysqli_query($conex, $sql);
                                            while($rsgenero = mysqli_fetch_assoc($select))
                                            {
                                        ?>
                                            <option value="<?=$rsgenero['idgeneros']?>"> <?=$rsgenero['genero'];?> </option>
                                        
                                        <?php 
                                            }
                                        
                                        ?>
                                    </select>
                                </div>
                                <div class="contactUs">
                                    <input type="text" name="txttipomensagem" value="" class="inputSize"/>
                                </div>
                                <div class="message">
                                    <textarea name="txtcomentario" cols="53" rows="3" data-ls-module="charCounter" required></textarea>
                                </div>
                            <input type="submit" name="btn_Enviar" value="Enviar" class="sendButton">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="centerObject conteudo" id="enderecos">
                <div class="enderecosLojas">
                <table class="tblNossasLojas">
                                <tr>
                                    <td class="tblNossasLojasTitulo" colspan="7">
                                        <h1>Dados de Nossas Lojas</h1>
                                    </td>
                                </tr>
                                <tr class="tblNossasLojasLinha">
                                    <td class="tblNossasLojasColunaFixa"> Nome </td>
                                    <td class="tblNossasLojasColunaFixa"> CEP </td>
                                    <td class="tblNossasLojasColunaFixa"> Rua </td>
                                    <td class="tblNossasLojasColunaFixa"> Bairro </td>
                                    <td class="tblNossasLojasColunaFixa"> Cidade </td>
                                    <td class="tblNossasLojasColunaFixa"> Estado </td>
                                    <td class="tblNossasLojasColunaFixa"> Fotos </td>

                                </tr>
                                <?PHP 
                                    $sql = "select * from tbllojas where statusLoja= 1";

                                    $select = mysqli_query($conex, $sql);
                                            
                                            
                                    while($rsloja= mysqli_fetch_assoc($select))
                                        {  
                                ?>
                                <tr class="tblNossasLojasLinha">
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['nome']?> Nome</td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['cep']?> </td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['rua']?> </td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['bairro']?> </td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['cidade']?> </td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['estado']?> </td>
                                    <td class="tblNossasLojasColuna"> <img src="../../backend/src/files/<?=$rsloja['foto']?>" class="photo"> </td>

                                
                                    
                                </tr>
                                <?php
                                    }
                                ?>

                            </table>
                </div>
    
            </div>
    </main>

    <footer>
        <div class="centerObject conteudo">
            <a href="index.php">
                <div class="logo">
                    <img src="../src/image/icon/redragon-logo-2.png" alt="logo footer">
                </div>
            </a>
            <div class="copyright">
                <span>© Copyright 2020</span>
                <p>Todos os direitos reservados - Política de Privacidade</p>
            </div>
            
        </div>
    </footer>
    <script src="../src/js/mascaraTelefone.js"></script>
    <script src="../src/js/mascaraCelular.js"></script>
    <script src="../src/js/slider.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../src/js/ancora.js"></script>
</body>
</html>