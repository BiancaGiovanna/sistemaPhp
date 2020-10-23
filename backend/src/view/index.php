
<?php
//Import do arquivo de Variaveis e Constantes
require_once('../controllers/config.php');
    
//Import do arquivo de função para conectar no BD
require_once('../controllers/conexaoMysql.php');

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
                    <a href="../../../web/public/index.php">
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
                            <div id="consultaDeDados">
                                <table id="tblConsulta" >
                                    <tr>
                                        <td id="tblTitulo" colspan="5">
                                            <h1> Consulta de Dados.</h1>
                                        </td>
                                    </tr>
                                    <tr id="tblLinhas">
                                        <td class="tblColunas"> Nome </td>
                                        <td class="tblColunas"> Celular </td>
                                        <td class="tblColunas"> Email </td>
                                        <td class="tblColunas"> Profissão </td>
                                        <td class="tblColunas"> Genero </td>
                                        <td class="tblColunas"> Mensagem </td>
                                        <td class="tblColunas"> Opções </td>
                                    </tr>
                                    <?php
                                        $sql= "select tblfaleconosco.idfaleconosco, 
                                        tblfaleconosco.nome, 
                                        tblfaleconosco.telefone, 
                                        tblfaleconosco.celular,
                                        tblfaleconosco.email, 
                                        tblfaleconosco.homepage, 
                                        tblfaleconosco.tipomensagem, 
                                        tblfaleconosco.mensagem, 
                                        tblfaleconosco.profissao,
                                        tblgeneros.sigla from tblfaleconosco,
                                        tblgeneros where tblfaleconosco.idgeneros = tblgeneros.idgeneros
                                        order by idfaleconosco desc;";
                                            
                                    
                                        $select = mysqli_query($conex, $sql);
                                        
                                        
                                        while($rscontatos= mysqli_fetch_assoc($select))
                                        {  
                                    ?>
                                    <tr id="tblLinhas">
                                        <td class="tblColunas" id="colorCampo1"> <?=$rscontatos['nome']?> </td>
                                        <td class="tblColunas" id="colorCampo1" > <?=$rscontatos['celular']?> </td>
                                        <td class="tblColunas" id="colorCampo1"> <?=$rscontatos['email']?> </td>
                                        <td class="tblColunas" id="colorCampo1"> <?=$rscontatos['profissao']?> </td>
                                        <td class="tblColunas" id="colorCampo1"> <?=$rscontatos['sigla']?> </td>
                                        <td class="tblColunas" id="colorCampo1"> <?=$rscontatos['mensagem']?> </td>
                                        <td class="tblColunas" id="colorCampo1">  
                                        <a href="../model/excluirContato.php?modo=excluir&id=<?=$rscontatos['idfaleconosco']?>" onclick="return confirm('Deseja realmente excluir esse Registro?')">
                                                    <img src="image/icon/delete.png" alt="Excluir" title="excluir" class="excluir">
                                                </a>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                        }
                                    ?>       
                                </table>
                            </div>        
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
                            <a href="#" class="btnItem" href="#" onclick="mostrar_abas(this);" id="mostra_registraUsuario">
                            <div class="item"> 
                                <img src="./image/icon/addUser.png" alt="">
                                Cadastrar usuário
                            </div>   
                            </a>
                            
                             <a href="#" class="btnItem">
                                <div class="item">
                                    <img src="./image/icon/userList.png" alt="">
                                    Usuários cadastrados
                                </div>
                            </a>
                          </div>
                          
                    </div>
                    <div id="registraUsuario"  class="hidden">
                        <div class="listaConteudo">
                            <form name="frmcontato" method="post" action="../../backend/src/model/inserirContato.php">
                                <div class="entreEmContato">
                                    <h1>Cadastre um novo usuário</h1>
                                </div>
                                    <div class="areaTitle-contato">
                                        <div class="contactUs">
                                            Usuário:  
                                        </div>
                                        <div class="contactUs">
                                            Senha:     
                                        </div>
                                        <div class="contactUs">
                                            Nome:     
                                        </div>
                                        <div class="contactUs">
                                            Email:  
                                        </div>
                                        <div class="contactUs">
                                            CPF:  
                                        </div>
                                        <div class="contactUs">
                                            Celular:  
                                        </div>
                                        <div class="contactUs">
                                            Sexo:  
                                        </div>
                                    </div>
                                    <div class="areaForm-contato">
                                        <div class="contactUs">
                                            <input type="text" name="txtusuario" value="" class="inputSize" required  placeholder="  Digite o usuário q sera ultilizado no Login" pattern="[a-z A-Z é]*"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="password" name="password" value="" class="inputSize"  minlength="13"   placeholder="  Minimo de 8 caracteres"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="txtnome" value="" class="inputSize" required  placeholder="  Digite seu Nome" pattern="[a-z A-Z é]*"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="txtemail" value="" class="inputSize" placeholder="  name@example.com" required/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="numbercpf" value="" class="inputSize" id="cpf" placeholder=" Digite seu CPF" pattern="[0-9]" required/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="txtcelular" value="" class="inputSize"  onkeypress="Mascara(this);" maxlength="14" required pattern="[(][0-9]{2}[)][0-9]{5}-[0-9]{4}" placeholder="  (99)99999-9999"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="radio" name="rdosexo" value="F" required class="btnRadio"/> <span class="selectSexo">Feminino</span> 
                                            <input type="radio" name="rdosexo" value="M" required class="btnRadio"/> Masculino
                                            <input type="radio" name="rdosexo" value="O" required class="btnRadio"/> Outro
                                        </div>
                                        
                                    <input type="submit" name="btn_Enviar" value="Enviar" class="sendButton">
                                    </div>
                                    
                                </form>
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
    <script src="js/mascaraCelular.js"></script>
    <script src="https://www.geradorcpf.com/assets/js/jquery-1.2.6.pack.js"></script>
    <script src="https://www.geradorcpf.com/assets/js/jquery.maskedinput-1.1.4.pack.js"></script>
    <script src="js/contentAdm.js"></script>
</body>
</html>