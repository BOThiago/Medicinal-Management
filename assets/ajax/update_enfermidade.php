<?php
include "../../include/valida_session_usuario.php";
include "../../include/mysqlconecta.php";

$cpf = $_POST['cpfenf'];
$enfermidade = $_POST['enfermidade'];

if(isset($cpf) && isset($enfermidade)){  

    $SQL = "update paciente set id_enfermidade='$enfermidade' where cpf='$cpf'"; 
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