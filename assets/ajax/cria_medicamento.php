<?php
session_start();
include "../../include/mysqlconecta.php";

$medicamento = $_POST['medicamento'];

if(isset($medicamento)){

    $SQL = "INSERT INTO medicamento(nome_medicamento) VALUES ('$medicamento');";
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