<?php

    require_once('../controllers/config.php');

    require_once('../controllers/conexaoMysql.php');

    if(!$conex = conexaoMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");

    }

    $nome = (string) null;
    $nomeUser= (string) null;
    $senha = (string) null;
    $email = (string) null;
    $cpf = (string) null;
    $celular = (string) null;
    $idgeneros = (int) null;

    $nome = $_POST['txtNome'];
    $nomeUser = $_POST['txtUser'];
    $senha = $_POST['passSenha'];
    $email = $_POST['txtEmail'];
    $cpf = $_POST['numberCPF'];
    $celular = $_POST['telCelular'];
    $idgeneros = $_POST['sltgenero'];

    $senha = md5($senha);
    session_start();

    $sql = "update tbluser set
            nome = '".$nome."',
            usuario = '".$nomeUser."',
            senha = '".$senha."',
            email = '".$email."',
            cpf = '".$cpf."',
            celular = '".$celular."',
            idgeneros = '".$idgeneros."'
            where idUser = ".$_SESSION['id'];



    unset($_SESSION['id']);

    if (mysqli_query($conex, $sql)){
        echo("
                <script>
                    alert('Registro atualizado com sucesso!');
                    location.href = '../view/index.php';
                </script>
        "); 
    }
    else
        echo("
                <script>
                    alert('Erro ao atualizar! Favor verificar a digitação de todos os dados.');
                    location.href = '../view/index.php';
                    window.history.back();
                </script>
            ");
