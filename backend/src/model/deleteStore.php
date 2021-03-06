<?php

//validação para tratar o acesso do arquivo direto pela URL
if(isset($_GET['modo']))
{
    //Validação para tratar se a requisição é realmente para excluir um registro
    if(strtoupper($_GET['modo']) == 'EXCLUIR')
    {
        //Validação para tratar se foi informado um ID para exclusão
        if(isset($_GET['id']) && $_GET['id'] != "")
        {
            
         //###################### INICIO DA EXCLUSÃO DO REGISTRO #####################################  
            
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
            
            //Recebendo o id para a exclusão
            $idlojas = $_GET['id'];

            $sql = "delete from tbllojas
                    where idlojas = " . $idlojas;

            //Executa no BD o Script SQL

            if (mysqli_query($conex, $sql))
            {
                $photoName = $_GET['foto'];
                
                if($photoName != "no-photo.jpg")
                    
                    unlink('../files/'. $photoName);
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

?>