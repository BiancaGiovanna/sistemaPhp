<?php

require_once('../controllers/config.php');

require_once('../controllers/conexaoMysql.php');

if(!$conex = conexaoMysql())
{
    echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    //die; //Finaliza a interpretação da página
}

$categoria = (string) null;

$categoria = $_POST['txtcategoria'];
session_start();

$sql = "update tblcategoria set
        nome= '".$categoria."'
        where idCategoria = ".$_SESSION['id'];
        
unset($_SESSION['id']);

if (mysqli_query($conex, $sql)){
    echo("
            <script>
                alert('Categoria atualizada com sucesso!');
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