<?php 
    require_once('../controllers/config.php');


    require_once('../controllers/conexaoMysql.php');

    require_once('./uploadPhotoProduto.php');

    if(!$conex = conexaoMysql()){

        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");

    }
    $foto = (string) "no-photo.jpg";
    $nomeProduto = (string) null;
    $descricao = (string) null;
    $preco = (string) null;
    
    //operação para ralizar o desconto
    $recebendoDesconto = (integer) 0;
    $desconto = (integer) 0;
    $precoFinal = (integer) 0;
    //********************
    $destaque = (string) 0;
    $idSubcategoria = (string) null;


    $foto = uploadPhotoProduto($_FILES['fleFoto']);
    $nomeProduto = $_POST['txtnome'];
    $descricao = $_POST['txtdescricao'];

    $preco = $_POST['txtpreco'];
    $recebendoDesconto = $_POST['sltdesconto'];
    $desconto = ($recebendoDesconto/100)*$preco;
    $precoFinal = $preco-$desconto;

    $idSubcategoria = $_POST['sltsubcategoria'];

    session_start();

    $sql = "update tblprodutos set
                foto ='".$foto."', 
                nomeProduto = '". $nomeProduto."',
                descricao = '". $descricao."', 
                preco = '". $preco."',
                desconto = '". $desconto."',
                precoFinal = '". $precoFinal."',
                idSubcategoria = '". $idSubcategoria."'
                where idProduto = ".$_SESSION['id'];
    
    unset($_SESSION['id']);

// echo($sql);
    if (mysqli_query($conex, $sql)){
        echo("
                <script>
                    alert('Produto atualizado com sucesso!');
                    location.href = '../view/index.php';
                </script>
            ");
            }
    else
        echo("
            <script>
                alert('Erro ao enviar os dados.');
                location.href = '../view/index.php';
                window.history.back();
            </script>
            
        ");


