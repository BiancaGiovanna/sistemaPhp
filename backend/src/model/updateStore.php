<?php 
    require_once('../controllers/config.php');


    require_once('../controllers/conexaoMysql.php');

    require_once('./uploadPhoto.php');

    if(!$conex = conexaoMysql()){

        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");

    }
    $nomeLoja = (string) null;
    $foto = (string) "no-photo.png";
    $cep = (string) null;
    $rua = (string) null;
    $bairro = (string) null;
    $cidade = (string) null;
    $estado = (string) null;
    $statusLoja = (integer) 0;

    $nomeLoja = $_POST['txtnome'];
    $foto = uploadPhoto($_FILES['fleFoto']);
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['uf'];

    session_start();

    $sql = "update tbllojas set
                nome = '". $nomeLoja."',
                cep = '". $cep."',
                rua = '". $rua."',
                bairro = '". $bairro."',
                cidade = '". $cidade."',
                estado = '". $estado."',
                statusLoja= '".$statusLoja."',
                foto = '". $foto."' 
                where idlojas = ".$_SESSION['id'];
    
    unset($_SESSION['id']);

// echo($sql);
    if (mysqli_query($conex, $sql)){
        echo("
                <script>
                    alert('Loja cadastrarda com sucesso!');
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


