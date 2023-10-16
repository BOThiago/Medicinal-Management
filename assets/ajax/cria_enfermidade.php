<?php
session_start();
include "../../include/mysqlconecta.php";

$enfermidade = $_POST['enfermidade'];

if(isset($enfermidade)){

    $SQL = "INSERT INTO enfermidade(nome_enfermidade) VALUES ('$enfermidade');";
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