<?php
session_start();
include "../../include/mysqlconecta.php";

$nome = $_POST['nome'];
$username = $_POST['username'];
$password = $_POST['password'];

if(isset($username) && isset($password)){
    $password = md5($password);
    $SQL = "INSERT INTO usuario(nome, email, senha) VALUES ('$nome', '$username', '$password');";
    $result = @mysqli_query($conexao,$SQL) or die("Erro, código:001");

    if($result){
        $_SESSION["ia_med_nome"] = $nome;
        $_SESSION["ia_med_email"] = $username;
                        
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

} else {    
	
    $linhas_json = array(
        'success'=>false,
        'msg'=>'Login mal-sucedido.'
    ); 
    
    echo json_encode($linhas_json);
    exit; 
}
?>