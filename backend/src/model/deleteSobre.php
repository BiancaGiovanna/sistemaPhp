<?php

if(isset($_GET['modo']))
{
    if(strtoupper($_GET['modo']) == 'EXCLUIR')
    {
        if(isset($_GET['id']) && $_GET['id'] != "")
        {
            
            
            require_once('../controllers/config.php');

            require_once('../controllers/conexaoMysql.php');

            if(!$conex = conexaoMysql()){
                echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
            }
            
            $idsobre = $_GET['id'];

            $sql = "delete from tblsobre
                    where idsobre = " . $idsobre;

            if (mysqli_query($conex, $sql))
            {
                echo("
                        <script>
                            alert('Registro Excluido com sucesso!');
                            location.href = '../view/index.php';
                        </script>
                ");
            }
            else
                echo("
                        <script>
                            alert('Erro ao Excluir os dados do Banco de Dados!');

                            window.history.back();
                        </script>

                    ");
            
            //###################### FIM DA EXCLUSÃO DO REGISTRO #####################################
            
        }else
            echo("
            <script>
                alert('Nenhum registro foi informado para realizar a exclusão');
                location.href = '../view/index.php';
            </script>
    
        ");
        
    }else 
        echo("
            <script>
                alert('Requisição inválida para excluir um registro!');
                location.href = '../view/index.php';
            </script>
    
        ");
    
}else
    echo("
            <script>
                alert('Acesso inválido para esse arquivo!');
                location.href = '../view/index.php';
            </script>
    
        ");

