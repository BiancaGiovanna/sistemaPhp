<?php 
    
if(isset($_GET['modo']))
{
    if(strtoupper($_GET['modo']) == 'STATUS')
    {
        if(isset($_GET['id']) && $_GET['id'] != ""){

            require_once('../controllers/config.php');

            require_once('../controllers/conexaoMysql.php');

            if(!$conex = conexaoMysql()){
                echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
            }
            $idsobre = $_GET['id'];
            
            if($_GET['status'] == 0)
                $statusSobre = 1;
            else
                $statusSobre = 0;
            

            $sql = "update tblsobre set statusSobre = '".$statusSobre."'
                    where idsobre = " . $idsobre;

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
            
            
        }else
            echo("
            <script>
                alert('Nenhum registro foi informado para realizar a modificação');
                location.href = '../view/index.php';
            </script>
    
        ");
        
    }else 
        echo("
            <script>
                alert('Requisição inválida para modificar esse usuario!');
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