<?php

require_once('../controllers/config.php');

require_once('../controllers/conexaoMysql.php');

if(!$conex = conexaoMysql())
{
    echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    //die; //Finaliza a interpretação da página
}

$subcategoria = (string) null;
$idcategoria = (string) null;

$subcategoria = $_POST['txtsubcategoria'];
$idcategoria = $_POST ['sltSubcategoria'];

session_start();

$sql = "update tblsubcategoria set
        nomesub = '".$subcategoria."',
        idCategoria = '".$idcategoria."'
        where idSubcategoria = ".$_SESSION['id'];
        
unset($_SESSION['id']);

if (mysqli_query($conex, $sql)){
    echo("
            <script>
                alert('Sub-Categoria atualizada com sucesso!');
                location.href = '../view/index.php';
            </script>
    "); 
}
else
    echo("
            <script>
                alert('Erro ao atualizar!');
                location.href = '../view/index.php';
                window.history.back();
            </script>
        ");

?>