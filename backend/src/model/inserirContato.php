<?php 
/*Abre a conexão com o BD*/

    //Import do arquivo de Variaveis e Constantes
    require_once('./config.php');

    //Import do arquivo de função para conectar no BD
    require_once('conexaoMysql.php');

    //chama a função que vai estabelecer a conexão com o BD
    if(!$conex = conexaoMysql())
    {
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
        //die; //Finaliza a interpretação da página
    }

/*Variaveis*/
$nome = (string) null;
$telefone = (string) null;
$celular = (string) null;
$email = (string) null;
$homepage = (string) null;
$facebook = (string) null;
$tipomensagem = (string) null;
$mensagem = (string) null;
$sexo = (string) null;
$profissao = (string) null;

/*Recebe todos os dados do formulário*/
$nome = $_POST['txtnome'];
$telefone = $_POST['txttelefone'];
$celular = $_POST['txtcelular'];
$email = $_POST['txtemail'];
$homepage = $_POST['txthome'];
$tipomensagem = $_POST['txttipomensagem'];
$mensagem = $_POST['txtcomentario'];
$sexo = $_POST['rdosexo'];
$profissao = $_POST['txtprofissao'];


$sql = "insert into tblfaleconosco 
            (
                nome,
                telefone,
                celular, 
                email, 
                homepage, 
                tipomensagem,
                mensagem, 
                sexo, 
                profissao
            )
            values
            (
                '". $nome ."',
                '".$telefone."',
                '". $celular ."',
                '". $email ."', 
                '".$homepage."',
                '".$tipomensagem."',
                '".$mensagem."',
                '". $sexo ."', 
                '". $profissao ."' 
            )
        ";

//Executa no BD o Script SQL

if (mysqli_query($conex, $sql))
{
    echo("
            <script>
                alert('Registro Inserido com sucesso!');
                location.href = '../../../web/public/index.php';
            </script>
    ");
    
}
else
    echo("
            <script>
                alert('Erro ao Inserir os dados no Banco de Dados! Favor verificar a digitação de todos os dados.');
                location.href = '../index.php';
                window.history.back();
            </script>
    
        ");

?>