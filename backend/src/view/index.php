
<?php
//Import do arquivo de Variaveis e Constantes
require_once('../model/config.php');
    
//Import do arquivo de função para conectar no BD
require_once('../model/conexaoMysql.php');

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
                                        <td class="tblColunas"> Sexo </td>
                                        <td class="tblColunas"> Mensagem </td>
                                        <td class="tblColunas"> Opções </td>
                                    </tr>
                                    <?php
                                    // Script para buscar todos os dados no banco de dados
                                    // Script para buscar todos os dados no banco de dados
                                            $sql= "select tblfaleconosco.idfaleconosco, 
                                            tblfaleconosco.nome, 
                                            tblfaleconosco.telefone, 
                                            tblfaleconosco.celular,
                                            tblfaleconosco.email, 
                                            tblfaleconosco.homepage, 
                                            tblfaleconosco.tipomensagem, 
                                            tblfaleconosco.mensagem, 
                                            tblfaleconosco.sexo, 
                                            tblfaleconosco.profissao
                                            from tblfaleconosco
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
                                        <td class="tblColunas" id="colorCampo1"> <?=$rscontatos['sexo']?> </td>
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
    <script src="js/contentAdm.js"></script>
</body>
</html>