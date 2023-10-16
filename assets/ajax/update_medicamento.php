<?php
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$cpf = $_POST['cpfmed'];
$medicamento = $_POST['medicamento'];

if(isset($cpf) && isset($medicamento)){  

    $SQL = "update paciente set id_medicamento='$medicamento' where cpf='$cpf'"; 
    $result = @mysqli_query($conexao,$SQL) or die("Erro, código:001");

    if($result){  
        $linhas_json = array(
            'success'=>true,
            'msg'=>'Cadastro bem-sucedido.'
        );
        echo json_encode($linhas_json);
        exit;
    } else {

        $linhas_json = array(
            'success'=>false,
            'msg'=>'Cadastro mal-sucedido.'
        ); 
        echo json_encode($linhas_json);
        exit; 
    }

}
?>