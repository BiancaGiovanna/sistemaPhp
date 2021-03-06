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
    $statusProduto = (integer) 0;
    $idSubcategoria = (string) null;


    $foto = uploadPhotoProduto($_FILES['fleFoto']);
    $nomeProduto = $_POST['txtnome'];
    $descricao = $_POST['txtdescricao'];

    $preco = $_POST['txtpreco'];
    $recebendoDesconto = $_POST['sltdesconto'];
    $desconto = ($recebendoDesconto/100)*$preco;
    $precoFinal = $preco-$desconto;

    $idSubcategoria = $_POST['sltsubcategoria'];

    $sql = "
    insert into tblprodutos 
        (
            foto, 
            nomeProduto,
            descricao, 
            preco,
            desconto,
            precoFinal,
            destaque,
            idSubcategoria, 
            statusProduto)
        values 
        (
            '".$foto."', 
            '".$nomeProduto."',
            '".$descricao."', 
            '".$preco."', 
            '".$recebendoDesconto."',
            '".$precoFinal."',
            '".$destaque."' , 
            '".$idSubcategoria."',
            '".$statusProduto."')";

// echo ($sql);
if(mysqli_query($conex, $sql)){
    echo ("
            <script>
                alert('Produto inserido com sucesso!');
                location.href = '../view/index.php';
            </script>
        ");
}
else
    echo ("
            <script>
                alert('Favor verifique se voce preencheu todos os campos corretamente.');
                location.href = '../view/index.php';
                </script>
        ");