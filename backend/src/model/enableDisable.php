<?php 
    
//validação para tratar o acesso do arquivo direto pela URL
if(isset($_GET['modo']))
{
    //Validação para tratar se a requisição é realmente para excluir um registro
    if(strtoupper($_GET['modo']) == 'STATUS')
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
            
            //Recebendo o id para ativar
            $idContato = $_GET['id'];
            
            //Lógica para alterar no BD o status do registro
            if($_GET['status'] == 0)
                $statusContato = 1;
            else
                $statusContato = 0;
            

            $sql = "update tbluser set statusContato = '".$statusContato."'
                    where iduser = " . $idContato;

            //Executa no BD o Script SQL

            if (mysqli_query($conex, $sql))
            {
                echo("
                        <script>
                            alert('Status alterado com sucesso!');
                            location.href = '../view/index.php';
                        </script>
                ");

            }
            else
                echo("
                        <script>
                            alert('Erro ao atualizar o status!');

                            window.history.back();
                        </script>

                    ");
            
            //###################### FIM DA EXCLUSÃO DO REGISTRO #####################################
            
        }else //Condição para tratar se foi informado um ID válido para excluir o registro
            echo("
            <script>
                alert('Nenhum registro foi informado para realizar a modificação');
                location.href = '../view/index.php';
            </script>
    
        ");
        
    }else //Condição para tratar a variavel modo se é igual a EXCLUIR
        echo("
            <script>
                alert('Requisição inválida para ativar esse usuario!');
                location.href = '../view/index.php';
            </script>
    
        ");
    
}else //Condição para tratar o acesso do arquivo
    echo("
            <script>
                alert('Acesso inválido para esse arquivo!');
                location.href = '../view/index.php';
            </script>
    
        ");


?>