<?php 
    require_once('../controllers/config.php');

    require_once('../controllers/conexaoMysql.php');

    if(!$conex = conexaoMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $nome = (string) null;
    $descricao = (string) null;
    $preco = (string) null;
    $destaque = (string) null;

    $statusProduto = (string) 0;

//     $sobre = $_POST['txtcomentario'];
    
//     $sql = " insert into tblsobre 
//             (
//                 sobre
//             )
//             values 
//             (
//                 '".$sobre."'
//             )";
// // echo ($sql);
// if(mysqli_query($conex, $sql)){
//     echo ("
//             <script>
//                 alert('Texto inserido com sucesso!');
//                 location.href = '../view/index.php';
//             </script>
//         ");
// }
// else
//     echo ("
//             <script>
//                 alert('Favor verifique se voce preencheu todos os campos corretamente.');
//                 location.href = '../view/index.php';
//                 </script>
//         ");