<?php
require_once('../controllers/config.php');

//Import do arquivo de função para conectar no BD
require_once('../controllers/conexaoMysql.php');

//chama a função que vai estabelecer a conexão com o BD
if(!$conex = conexaoMysql())
{
    echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    //die; //Finaliza a interpretação da página
}

$nome = (string) null;
$statuscategoria = (string) 0;


$nome = $_POST['txtNome'];

$sql = "insert into tblcategoria
        (
            nome,
            statusCategoria
        )
        values 
        (
            '".$nome."',
            '".$statuscategoria."'
        )";

if(mysqli_query($conex, $sql)){
    echo ("
            <script>
                alert('Registro Inserido com Sucesso!');
                location.href = '../view/index.php';
            </script>
        ");
}
else
    echo ("
            <script>
                alert('Erro na conexão com o Banco de Dados! Favor verifique se voce preencheu todos os campos.');
                location.href = '../view/index.php';
                </script>
        ");
?>