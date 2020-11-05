<?php 
/*Abre a conexão com o BD*/

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

/*Variaveis*/
$usuario =(string) null;
$senha=(string) null;
$nome = (string) null;
$email = (string) null;
$cpf = (string) null;
$celular = (string) null;
$idgenero = (string) null;

/*Recebe todos os dados do formulário*/

$usuario = $_POST['txtusuario'];
$senha= $_POST['password'];
$nome = $_POST['txtnome'];
$email = $_POST['txtemail'];
$cpf = $_POST['numbercpf'];
$celular = $_POST['txtcelular'];
$idgenero = $_POST['sltgenero'];

$senha = md5($senha);

$sql = "insert into tbluser(
            usuario,
            senha,
            nome,
            email,
            cpf,
            celular,
            idgeneros        
        )
            values
            (
                '". $usuario ."',
                '". $senha ."',
                '". $nome ."',
                '". $email ."',
                '". $cpf ."',
                '". $celular ."',
                '". $idgenero ."'
            )
        ";

// Executa no BD o Script SQL

if (mysqli_query($conex, $sql))
{
    echo("
            <script>
                alert('Registro Inserido com sucesso!');
                location.href = '../view/index.php';
            </script>
    ");
    
}
else
    echo("
            <script>
                alert('Erro ao Inserir os dados no Banco de Dados! Favor verificar a digitação de todos os dados.');
                location.href = '../view/index.php';
                window.history.back();
            </script>
    
        ");

?>