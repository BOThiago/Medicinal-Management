<?php
session_start();
include "../../include/mysqlconecta.php";

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($username) && isset($password)){
    $SQL = "select * from usuario where email = '$username'";
    $result = @mysqli_query($conexao,$SQL) or die("Erro, código:001");
    $rows = mysqli_fetch_array($result);
    $password = md5($password);
    
    if(!strcmp($password, $rows['senha'])){
        $_SESSION["ia_med_nome"] = $rows['nome'];
        $_SESSION["ia_med_email"] = $rows['email'];
                        
        $linhas_json = array(
            'success'=>true,
            'msg'=>'Login bem-sucedido.'
        );
        echo json_encode($linhas_json);
        exit;
    } else {

        $linhas_json = array(
            'success'=>false,
            'msg'=>'Login mal-sucedido.'
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