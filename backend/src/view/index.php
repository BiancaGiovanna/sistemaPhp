
<?php

$action= "../model/inserirContato.php";
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
if(isset($_GET['modo'])){
    if(strtoupper($_GET['modo']) == "CONSULTAR"){
        if(isset($_GET['id'])&& $_GET['id'] != ""){
            $id = $_GET['id'];

            session_start();

            $_SESSION['id'] = $id;

            $sql = "select tbluser.*, tblgeneros.genero from tbluser, tblgeneros 
            where tblgeneros.idgeneros = tbluser.idgeneros and tbluser.idUser = $id";

            $select = mysqli_query($conex, $sql);

            if ($rsContatos = mysqli_fetch_assoc($select)) {

                $nome = $rsContatos ['nome'];
                $nomeUser = $rsContatos ['usuario'];
                $senha = $rsContatos ['senha'];
                $email = $rsContatos ['email'];
                $cpf = $rsContatos ['cpf'];
                $celular = $rsContatos ['celular'];

                $idgeneros = $rsContatos ['idgeneros'];
                $genero = $rsContatos ['genero'];
                
                $action= "../model/updateUser.php";

            }
        }
    }
}
if(isset($_GET['modo2'])){
    if(strtoupper($_GET['modo2']) == "CONSULTAR"){
        if(isset($_GET['id'])&& $_GET['id'] != ""){
            $id = $_GET['id'];

            session_start();

            $_SESSION['id'] = $id;

            $sql = "select * from tblcategoria where tblcategoria.idCategoria = $id";
            
            $select = mysqli_query($conex, $sql);

            if ($rsCategoria = mysqli_fetch_assoc($select)) {

                $categoria = $rsCategoria ['nome'];
            }
        }
    }
}
if(isset($_GET['modo3'])){
    if(strtoupper($_GET['modo3']) == "CONSULTAR"){
        if(isset($_GET['id'])&& $_GET['id'] != ""){
            $id = $_GET['id'];

            session_start();

            $_SESSION['id'] = $id;

            $sql = "select * from tblsubcategoria where tblsubcategoria.idSubcategoria = $id";
            
            $select = mysqli_query($conex, $sql);

            if ($rsSubCategoria = mysqli_fetch_assoc($select)) {

                $subcategoria = $rsSubCategoria ['nomesub'];
            }
        }
    }
}
if(isset($_GET['modo4'])){
    if(strtoupper($_GET['modo4']) == "CONSULTAR"){
        if(isset($_GET['id'])&& $_GET['id'] != ""){
            $id = $_GET['id'];

            session_start();

            $_SESSION['id'] = $id;

            $sql = "select * from tbllojas where tbllojas.idlojas = $id";

            $select = mysqli_query($conex, $sql);

            if ($rsloja = mysqli_fetch_assoc($select)) {

                $nome = $rsloja ['nome'];
                $cep = $rsloja ['cep'];
                $rua = $rsloja ['rua'];
                $bairro = $rsloja ['bairro'];
                $cidade = $rsloja ['cidade'];
                $estado = $rsloja ['estado'];
                $foto = $rsloja ['foto'];



            }
        }
    }
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
                            <a href="#" class="btnItem" onclick="mostrar_abas(this);" id="mostra_sobreEmpresa">
                                <div class="item">Sobre a Empresa</div>
                            </a>
                            <a href="#" class="btnItem" onclick="mostrar_abas(this);" id="mostra_cadastrarlojas"> 
                                <div class="item">Cadastrar Lojas</div>
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
                                        <a href="../model/deleteContact.php?modo=excluir&id=<?=$rscontatos['idfaleconosco']?>" onclick="return confirm('Deseja realmente excluir esse Registro?')">
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
                        <div id="containerProduto">
                        <div id="caixaProduto1">
                            <div class="caixaCadastroProduto">
                                <form name="frmCadastroCategoria" method="POST" action="../model/insertCategoria.php">
                                    <table class="tblProdutos">
                                        <tr>
                                            <td class="tblProdutosTitulo" colspan="2">
                                                <h1>Categoria</h1>
                                            </td>
                                        </tr>
                                        <tr class="tblProdutosLinha">
                                            <td class="tblProdutosColunaFixa"> 
                                                Nome: 
                                            </td>
                                            <td class="tblProdutosColunaFixa">
                                                <input type="text" name="txtNome" value="" placeholder="Ex. Teclados">
                                            </td>
                                        </tr>
                                        <tr class="tblProdutosLinha">
                                            <td class="tblProdutosColuna" colspan="2">
                                                <input name="sbtCadastrar" type="submit" value="Cadastrar">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>

                            <div class="caixaCadastroProduto">
                                <form name="frmCadastroSubCategoria" method="POST" action="../model/insertSubCategoria.php">
                                    <table class="tblProdutos">
                                        <tr>
                                            <td class="tblProdutosTitulo" colspan="2">
                                                <h1>Sub-Categoria</h1>
                                            </td>
                                        </tr>
                                        <tr class="tblProdutosLinha">
                                            <td class="tblProdutosColunaFixa"> 
                                                Nome:
                                            </td>
                                            <td class="tblProdutosColunaFixa">
                                                <input type="text" name="txtName" value="" placeholder="Ex. Teclados Mecanicos">
                                            </td>
                                        </tr>
                                        <tr class="tblProdutosLinha">
                                            <td class="tblProdutosColunaFixa"> 
                                                Categoria:
                                            </td>
                                            <td class="tblProdutosColunaFixa">
                                                <select name="sltSubcategoria">
                                                    <option value="">Selecione a categoria do item</option>

                                                        <?php
                                                        $sql = "select * from tblcategoria";


                                                        $select = mysqli_query($conex, $sql);
                                                        while($rsCategoria = mysqli_fetch_assoc($select)){

                                                            
                                                        ?>
                                                            <option value="<?=$rsCategoria['idCategoria']?>"> <?=$rsCategoria['nome'];?> </option>
                                                    
                                                        <?php
                                                            }
                                                        ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="tblProdutosLinha">
                                            <td class="tblProdutosColuna" colspan="2">
                                                <input name="sbtCadastrar" type="submit" value="Cadastrar">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                        
                        <div id="caixaProduto2">
                            <table class="tblProdutos">
                                <tr>
                                    <td class="tblProdutosTitulo" colspan="2">
                                        <h1>Categoria</h1>
                                    </td>
                                </tr>
                                <tr class="tblProdutosLinha">
                                    <td class="tblProdutosColunaFixa"> Nome </td>
                                    <td class="tblProdutosColunaFixa"> Opcões </td>
                                </tr>
                                    <?php
                                        // Script para buscar todos os dados no banco de dados
                                        $sql = "
                                                select tblcategoria.idCategoria, 
                                                tblcategoria.nome, tblcategoria.statusCategoria from tblcategoria order 
                                                by tblcategoria.idCategoria desc;
                                                ";

                                        $select = mysqli_query($conex, $sql);
                                        
                                        while($rsCategoria= mysqli_fetch_assoc($select))
                                        {  
                                        ?>
                                        <tr class="tblProdutosLinha">
                                            <td class="tblProdutosColuna"> <?=$rsCategoria['nome']?> </td>
                                            <td class="tblProdutosColuna">
                                                <a href="../model/deleteCategoria.php?modo=excluir&id=<?=$rsCategoria['idCategoria']?>" onclick="return confirm('Deseja realmente excluir esse Registro?')">
                                                    <img src="image/icon/delete.png" class="imgicon" alt="Excluir">
                                                </a>
                                                <a href="../model/enableDisableCategoria.php?modo=status&id=<?=$rsCategoria['idCategoria']?>&statusCategoria=<?=$rsCategoria['statusCategoria']?>">
                                                    <img src="image/icon/<?=$rsCategoria['statusCategoria']?>.png" class="imgicon" alt="ativar/desativar">
                                                </a>
                                                <a href="index.php?modo2=consultar&id=<?=$rsCategoria['idCategoria']?> #abrirModalEditarCategoria" id="mostra_attUsuario"> 
                                                    <img src="image/icon/edit.svg" alt="edit" class="imgicon">
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                            </table>
                        </div>
                        <div id="caixaProduto3">
                            <table class="tblProdutos">
                                <tr>
                                    <td class="tblProdutosTitulo" colspan="3">
                                        <h1>Sub-Categoria</h1>
                                    </td>
                                </tr>
                                <tr class="tblProdutosLinha">
                                    <td class="tblProdutosColunaFixa"> Nome </td>
                                    <td class="tblProdutosColunaFixa"> Nome da Categoria </td>
                                    <td class="tblProdutosColunaFixa"> Opcões </td>
                                </tr>
                                    <?php
                                        // Script para buscar todos os dados no banco de dados
                                        $sql = "
                                        select tblsubcategoria.idSubcategoria, tblsubcategoria.nomesub, 
                                        tblsubcategoria.statusSubcategoria, tblsubcategoria.idCategoria, tblcategoria.nome
                                        from tblsubcategoria, tblcategoria 
                                        where tblsubcategoria.idCategoria = tblcategoria.idCategoria
                                        order by tblsubcategoria.idSubcategoria desc;
                                                ";

                                        $select = mysqli_query($conex, $sql);
                                        
                                        while($rsCategoria= mysqli_fetch_assoc($select))
                                        {
                                        ?>
                                        <tr class="tblProdutosLinha">
                                            <td class="tblProdutosColuna"> <?=$rsCategoria['nomesub']?> </td>
                                            <td class="tblProdutosColuna"> <?=$rsCategoria['nome']?> </td>
                                            <td class="tblProdutosColuna">
                                                <a href="../model/deleteSubcategoria.php?modo=excluir&id=<?=$rsCategoria['idSubcategoria']?>" onclick="return confirm('Deseja realmente excluir esse Registro?')">
                                                    <img src="image/icon/delete.png" class="imgicon" alt="Excluir">
                                                </a>
                                                <a href="../model/enableDisableSubcategoria.php?modo=status&id=<?=$rsCategoria['idSubcategoria']?>&statusSubcategoria=<?=$rsCategoria['statusSubcategoria']?>">
                                                    <img src="image/icon/<?=$rsCategoria['statusSubcategoria']?>.png" class="imgicon" alt="ativar/desativar">
                                                </a>
                                                <a href="index.php?modo3=consultar&id=<?=$rsCategoria['idSubcategoria']?> #abrirModalSub" id="mostra_attUsuario"> 
                                                    <img src="image/icon/edit.svg" alt="edit" class="imgicon">
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
                    </div>
                    <div id="div_aba4" class="hidden">
                        <div class="listaConteudo">
                            <a href="#" class="btnItem" onclick="mostrar_abas(this);" id="mostra_registraUsuario">
                            <div class="item"> 
                                <img src="./image/icon/addUser.png" alt="">
                                Cadastrar usuário
                            </div>   
                            </a>
                            
                             <a href="#" class="btnItem" onclick="mostrar_abas(this);" id="mostra_userList">
                                <div class="item">
                                    <img src="./image/icon/userList.png" alt="">
                                    Usuários cadastrados
                                </div>
                            </a>
                          </div>
                          
                    </div>
                    <div id="registraUsuario"  class="hidden">
                        <div class="listaConteudo">
                            <form name="frmcontato" method="post" action="../model/registerUser.php">
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
                                            Confirme sua senha:     
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
                                            <input type="password" name="password" value="" class="inputSize"  minlength="8"  required  placeholder="  Minimo de 8 caracteres"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="password" name="confirmePassword" value="" class="inputSize"  minlength="8"  required  placeholder=" Confirme sua senha"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="txtnome" value="" class="inputSize" required  placeholder="  Digite seu Nome" pattern="[a-z A-Z é]*"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="txtemail" value="" class="inputSize" placeholder="  name@example.com" required/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="numbercpf" value="" class="inputSize" id="cpf" maxlength="14" onkeypress="mascara_cpf(this);" placeholder=" Digite seu CPF"  required/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="txtcelular" value="" class="inputSize"  onkeypress="Mascara(this);" maxlength="14" required pattern="[(][0-9]{2}[)][0-9]{5}-[0-9]{4}" placeholder="  (99)99999-9999"/> 
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
                                        
                                    <input type="submit" name="btn_Enviar" value="Enviar" class="sendButton">
                                    </div>
                                    
                                </form>
                        </div>
                    </div>
                    <div id="sobreEmpresa" class="hidden">
                        <form action="">
                            <h1 class="contactUs">
                                        Sobre a empresa:  
                            </h1>
                            <div class="message">
                                <textarea name="txtcomentario" cols="53" rows="3" data-ls-module="charCounter" required></textarea>
                            </div>
                            <input type="submit" name="btn_Enviar" value="Enviar" class="sendButton">

                        </form>
                    </div>
                    <div id="cadastrarlojas" class="hidden">
                        <div class="listaConteudo"> 
                        <form name="frmloja" method="post" action="../model/registerStore.php" enctype="multipart/form-data">
                                <div class="entreEmContato">
                                    <h1>Cadastre uma nova Loja</h1>
                                </div>
                                    <div class="areaTitle-contato">
                                        <div class="contactUs">
                                            Nome da Loja:  
                                        </div>
                                        <div class="contactUs">
                                            Escolha uma foto  
                                        </div>
                                        
                                        <div class="contactUs">
                                            CEP:     
                                        </div>
                                        <div class="contactUs">
                                            Rua:  
                                        </div>
                                        <div class="contactUs">
                                            Bairro:  
                                        </div>
                                        <div class="contactUs">
                                            Cidade:  
                                        </div>
                                        <div class="contactUs">
                                            Estado:  
                                        </div>
                                    </div>
                                    <div class="areaForm-contato">
                                        <div class="contactUs">
                                            <input type="text" name="txtnome" class="inputSize" required  placeholder="  Digite o nome da Loja" pattern="[a-z A-Z é]*"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="file" name="fleFoto" accept=".png, .jpg" class="inputSize"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input name="cep" type="text" id="cep" class="mascCEP"  size="10" maxlength="9" onblur="pesquisacep(this.value);"  placeholder="00000-000" required/>
                                        </div>
                                        <div class="contactUs">
                                        <input name="rua" type="text" id="rua" size="60"  required placeholder="Digite o nome da rua" />
                                        </div>
                                        <div class="contactUs">
                                            <input name="bairro" type="text" id="bairro" size="40" required  placeholder="Digite o nome do bairro" />
                                        </div>
                                        <div class="contactUs">
                                            <input name="cidade" type="text" id="cidade" size="40" required  placeholder="Digite a cidade" />
                                        </div>
                                        <div class="contactUs">
                                            <input name="uf" type="text" id="uf" size="2" required />
                                        </div>
                                        
                                    <input type="submit" name="btn_Enviar" value="Enviar" class="sendButton">
                                </form>

                                </div>
                                    
                            <div id="tabelaLojas">
                            <table class="tblNossasLojas">
                                <tr>
                                    <td class="tblNossasLojasTitulo" colspan="8">
                                        <h1>Dados de Nossas Lojas</h1>
                                    </td>
                                </tr>
                                <tr class="tblNossasLojasLinha">
                                    <td class="tblNossasLojasColunaFixa"> Nome </td>
                                    <td class="tblNossasLojasColunaFixa"> Fotos </td>
                                    <td class="tblNossasLojasColunaFixa"> CEP </td>
                                    <td class="tblNossasLojasColunaFixa"> Rua </td>
                                    <td class="tblNossasLojasColunaFixa"> Bairro </td>
                                    <td class="tblNossasLojasColunaFixa"> Cidade </td>
                                    <td class="tblNossasLojasColunaFixa"> Estado </td>

                                    <td class="tblNossasLojasColunaFixa"> Opcões </td>
                                </tr>
                                <?PHP 
                                    $sql = "select * from tbllojas";

                                    $select = mysqli_query($conex, $sql);
                                            
                                            
                                    while($rsloja= mysqli_fetch_assoc($select))
                                        {  
                                ?>
                                <tr class="tblNossasLojasLinha">
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['nome']?> </td>
                                    <td class="tblNossasLojasColuna"> <img src="../files/<?=$rsloja['foto']?>" class="photo"> </td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['cep']?> </td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['rua']?> </td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['bairro']?> </td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['cidade']?> </td>
                                    <td class="tblNossasLojasColuna"> <?=$rsloja['estado']?> </td>
                                    <td class="tblNossasLojasColuna"> 
                                    <a href="../model/deleteStore.php?modo=excluir&id=<?=$rsloja['idlojas']?>&foto=<?=$rsloja['foto']?>" onclick="return confirm('Deseja realmente excluir esse Registro?')">
                                                        <img src="image/icon/delete.png" alt="Excluir" title="excluir" class="excluir">
                                                    </a>
                                                    <a href="index.php?modo4=consultar&id=<?=$rsloja['idlojas']?>#abrirModalLojas" id="mostra_attUsuario"> 
                                                    <img src="image/icon/edit.svg" alt="edit" class="editar" title="Editar">
                                                    </a>

                                                    <a href="../model/enableDisableStore.php?modo=status&id=<?=$rsloja['idlojas']?>&status=<?=$rsloja['statusLoja']?>">
                                                    <img src="image/icon/<?=$rsloja['statusLoja']?>.png" alt="enable/disable" title="ativar e desativar" class="editar">
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
                    <div id="userList" class="hidden">
                        <table id="tblConsulta" >
                                        <tr>
                                            <td id="tblTitulo" colspan="5">
                                                <h1> Consulta de Dados.</h1>
                                            </td>
                                        </tr>
                                        <tr id="tblLinhas">
                                            <td class="tblColunas"> Usuario </td>
                                            <td class="tblColunas"> Nome </td>
                                            <td class="tblColunas"> E-mail </td>
                                            <td class="tblColunas"> CPF </td>
                                            <td class="tblColunas"> Celular </td>
                                            <td class="tblColunas"> Genero </td>
                                            <td class="tblColunas"> Opções </td>
                                        </tr>
                                        <?php
                                            $sql= "select tbluser.iduser, 
                                            tbluser.usuario, 
                                            tbluser.nome, 
                                            tbluser.email, 
                                            tbluser.cpf,
                                            tbluser.celular,
                                            tbluser.statusContato,
                                            tblgeneros.sigla from tbluser,
                                            tblgeneros where tbluser.idgeneros = tblgeneros.idgeneros
                                            order by iduser desc;";
                                                
                                        
                                            $select = mysqli_query($conex, $sql);
                                            
                                            
                                            while($rsuser= mysqli_fetch_assoc($select))
                                            {  
                                        ?>
                                        <tr id="tblLinhas">
                                            <td class="tblColunas" id="colorCampo1"> <?=$rsuser['usuario']?> </td>
                                            <td class="tblColunas" id="colorCampo1" > <?=$rsuser['nome']?> </td>
                                            <td class="tblColunas" id="colorCampo1"> <?=$rsuser['email']?> </td>
                                            <td class="tblColunas" id="colorCampo1"> <?=$rsuser['cpf']?> </td>
                                            <td class="tblColunas" id="colorCampo1"> <?=$rsuser['celular']?> </td>
                                            <td class="tblColunas" id="colorCampo1"> <?=$rsuser['sigla']?> </td>
                                            <td class="tblColunas display" id="colorCampo1 display" >  
                                            <a href="../model/deleteUser.php?modo=excluir&id=<?=$rsuser['iduser']?>" onclick="return confirm('Deseja realmente excluir esse Registro?')">
                                                        <img src="image/icon/delete.png" alt="Excluir" title="excluir" class="excluir">
                                                    </a>
                                                    <a href="index.php?modo=consultar&id=<?=$rsuser['iduser']?> #abrirModal" id="mostra_attUsuario"> 
                                                    <img src="image/icon/edit.svg" alt="edit" class="editar">
                                                    </a>

                                                    <a href="../model/enableDisable.php?modo=status&id=<?=$rsuser['iduser']?>&status=<?=$rsuser['statusContato']?>">
                                                    <img src="image/icon/<?=$rsuser['statusContato']?>.png" alt="Editar" title="Editar" class="editar">
                                                    </a>
                                                    

                                            </td>
                                            
                                        </tr>
                                        <?php
                                            }
                                        ?>

                        </table>
                    </div>
                </div>
                <div id="registraUsuario "  class="usuario hidden">
                        <div class="listaConteudo">
                            <form name="frmcontato" method="post" action="<?=$action?>">
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
                                            Confirme sua senha:     
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
                                            <input type="password" name="password" value="" class="inputSize"  minlength="8"  required  placeholder="  Minimo de 8 caracteres"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="password" name="confirmePassword" value="" class="inputSize"  minlength="8"  required  placeholder=" Confirme sua senha"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="txtnome" value="" class="inputSize" required  placeholder="  Digite seu Nome" pattern="[a-z A-Z é]*"/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="txtemail" value="" class="inputSize" placeholder="  name@example.com" required/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="numbercpf" value="" class="inputSize" id="cpf" maxlength="14" onkeypress="mascara_cpf(this);" placeholder=" Digite seu CPF"  required/> 
                                        </div>
                                        <div class="contactUs">
                                            <input type="text" name="txtcelular" value="" class="inputSize"  onkeypress="Mascara(this);" maxlength="14" required pattern="[(][0-9]{2}[)][0-9]{5}-[0-9]{4}" placeholder="  (99)99999-9999"/> 
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
                                        
                                    <input type="submit" name="btn_Enviar" value="Enviar" class="sendButton">
                                </div>
                                    
                            </form>
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


    <div id="abrirModal" class="modal">
        <a href="#fechar" title="Fechar" class="fechar">X</a>
        
        <div class="conteudoModal">
            <div class="caixaCadastro">
                    <form name="frmCadatroUsuario" method="POST" action="<?=$action?>">
                        <table class="tblCadastroUsuario">
                            <tr class="tblLinhaTituloCadastro">
                                <td colspan="2">
                                    <h1>Atualizar Cadastro</h1>
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastroFixa">
                                    Nome:
                                </td>
                                <td class="tblColunaCadastro">
                                    <input name="txtNome" type="text" value="<?=$nome?>" placeholder="Digite seu nome" class="tblInput" required> 
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastroFixa">
                                    Usuario:
                                </td>
                                <td class="tblColunaCadastro">
                                    <input name="txtUser" type="text" value="<?=$nomeUser?>" class="tblInput" required placeholder="Digite seu Usuario">
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastroFixa">
                                    Sua antiga senha:
                                </td>
                                <td class="tblColunaCadastro">
                                    <input name="passSenha" type="text" value="" minlength="8"  maxlength="15" placeholder="Minimo 8 caracteres" class="tblInput" >
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastroFixa">
                                    Sua nova senha:
                                </td>
                                <td class="tblColunaCadastro">
                                    <input name="passSenha" type="text" value="" minlength="8" placeholder="Minimo 8 caracteres" class="tblInput" >
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastroFixa">
                                    Digite novamente sua nova senha:
                                </td>
                                <td class="tblColunaCadastro">
                                    <input name="passSenha" type="text" value="" minlength="8" placeholder="Minimo 8 caracteres" class="tblInput" >
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastroFixa">
                                    E-mail:
                                </td>
                                <td class="tblColunaCadastro">
                                    <input name="txtEmail" type="email" value="<?=$email?>" class="tblInput" placeholder="example@example.com" required>
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastroFixa">
                                    CPF:
                                </td>
                                <td class="tblColunaCadastro"> 
                                    <input name="numberCPF" type="text" value="<?=$cpf?>" class="inputSize" maxlength="14" id="cpf_update" onkeypress="mascara_cpf(this);" placeholder="xxx.xxx.xxx-xx"  required>
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastroFixa">
                                    Celular:
                                </td>
                                <td class="tblColunaCadastro">
                                    <input name="telCelular" type="tel" value="<?=$celular?>" class="tblInput" pattern="[(][0-9]{2}[)][0-9]{5}-[0-9]{4}" placeholder="(99)99999-9999" onkeypress="Mascara(this);" maxlength="14" required>
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastroFixa">
                                    Genero:
                                </td>
                                <td class="tblColunaCadastro">
                                    <select name="sltgenero" id="tblSelect">
                                        <?php
                                                if(isset($_GET['modo'])&& strtoupper($_GET['modo'])== "CONSULTAR"){

                                            ?>

                                            <option value="<?=$idgeneros?>"><?=$genero?></option>
                                            <?php } else{ ?>
                                            <option value="">Selecione um Item</option>

                                        <?php
                                            }
                                            $sql = "select * from tblgeneros
                                                    where idgeneros <>".$idgeneros;
                                            $select = mysqli_query($conex, $sql);
                                            while($rsGenero = mysqli_fetch_assoc($select)){

                                        ?>
                                            <option value="<?=$rsGenero['idgeneros']?>"> <?=$rsGenero['genero'];?> </option>
                                        
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr class="tblLinhaTituloCadastro">
                                <td class="tblColunaCadastro" colspan="2">
                                    <input name="sbtEnviar" type="submit" value="Atualizar" class="sendButton">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
        </div>
    </div> 
    <div id="abrirModalLojas" class="modal">
        <a href="#fechar" title="Fechar" class="fechar">X</a>
        
        <div class="conteudoModal">
            <div class="caixaCadastro">
                <form name="frmloja" method="post" action="../model/updateStore.php" enctype="multipart/form-data">
                    <div class="entreEmContato">
                        <h1>Atualizar dados da Loja</h1>
                    </div>
                        <div class="areaTitle-contato">
                            <div class="contactUs">
                                Nome da Loja:  
                            </div>
                            <div class="contactUs">
                                Escolha uma foto  
                            </div>
                            
                            <div class="contactUs">
                                CEP:     
                            </div>
                            <div class="contactUs">
                                Rua:  
                            </div>
                            <div class="contactUs">
                                Bairro:  
                            </div>
                            <div class="contactUs">
                                Cidade:  
                            </div>
                            <div class="contactUs">
                                Estado:  
                            </div>
                        </div>
                        <div class="areaForm-contato">
                            <div class="contactUs">
                                <input type="text" name="txtnome" value="<?=$nome?>"class="inputSize" required  placeholder="  Digite o nome da Loja" pattern="[a-z A-Z é]*"/> 
                            </div>
                            <div class="contactUs">
                                <input type="file" name="fleFoto" accept=".png, .jpg" value="<?=$foto?>" class="inputSize"/> 
                            </div>
                            <div class="contactUs">
                                <input name="cep" type="text" id="cep" class="mascCEP"  value="<?=$cep?>" size="10" maxlength="9" onblur="pesquisacep(this.value);"  placeholder="00000-000" required/>
                            </div>
                            <div class="contactUs">
                            <input name="rua" type="text" id="rua" size="60" value="<?=$rua?>" required placeholder="Digite o nome da rua" />
                            </div>
                            <div class="contactUs">
                                <input name="bairro" type="text" id="bairro" size="40" required value="<?=$bairro?>" placeholder="Digite o nome do bairro" />
                            </div>
                            <div class="contactUs">
                                <input name="cidade" type="text" id="cidade" size="40" required value="<?=$cidade?>" placeholder="Digite a cidade" />
                            </div>
                            <div class="contactUs">
                                <input name="uf" type="text" id="uf" size="2" value="<?=$estado?>" required />
                            </div>
                            
                            <input type="submit" name="btn_Enviar" value="Enviar" class="sendButton">
                        </form>
                    </div>
            </div>
        </div>
    </div> 
    <div id="abrirModalEditarCategoria" class="modal">
        <a href="#fechar" title="Fechar" class="fechar">X</a>
        
        <div class="conteudoModalProdutos">
            <h1>Atualizar Categoria</h1>
            <div class="cadastrarCategoria">

                <form action="../model/updateCategoria.php" method="post">
                    <label>Categoria</label>
                    <input type="text" name="txtcategoria" value="<?=$categoria?>"  placeholder="  Digite o nome da categoria"  />
                    <button class="btnSalvar btnItem">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
    <div id="abrirModalSub" class="modal">
        <a href="#fechar" title="Fechar" class="fechar">X</a>
        
        <div class="conteudoModalProdutos">
            <h1>Atualizar SubCategoria</h1>
            <div class="cadastrarCategoria">

                <form action="../model/updateSubCategoria.php" method="post">
                    <label>SubCategoria</label>
                    <input type="text" name="txtsubcategoria" value="<?=$subcategoria?>"  placeholder="  Digite o nome da Subcategoria"  />
                    <button class="btnSalvar btnItem">Atualizar</button>
                        <select name="sltSubcategoria">
                            <option value="">Selecione a categoria do item</option>
                                <?php
                                    $sql = "select * from tblcategoria";


                                    $select = mysqli_query($conex, $sql);
                                    while($rsCategoria = mysqli_fetch_assoc($select)){                
                                ?>
                                <option value="<?=$rsCategoria['idCategoria']?>"> <?=$rsCategoria['nome'];?> </option>
                                                    
                                <?php
                                    }
                                ?>
                        </select>
                </form>
            </div>
        </div>
    </div>
     <script src="js/cep.js"></script>          
    <script src="js/mascaraCelular.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/mascaraCpf.js"></script>
    <script src="js/contentAdm.js"></script>
</body>
</html>