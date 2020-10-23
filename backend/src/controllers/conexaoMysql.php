<?php 

function conexaoMysql ()
{
    
    
    /*Variaveis para conexão com o BD*/
    $server = (string) "localhost";
    $user = (string) "root";
    $password = (string) "bcd127";
    $dataBase = (string) "dbcms2020";

    /*Cria a conexão com o BD MySQL*/
    if ($conexao = @mysqli_connect($server, $user, $password, $dataBase))
        return $conexao;
    else
        return false;

}

?>