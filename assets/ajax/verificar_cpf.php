<?php	
include "../../include/mysqlconecta.php";

// Verificar se o dado existe no banco de dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $anmpac_cpf = $_POST['anmpac_cpf'];
    $query = "SELECT * FROM tanam_dados_pacientes WHERE anmpac_cpf = '$anmpac_cpf'";
    $resultado = $conexao->query($query);
    if ($resultado->num_rows > 0) {
        echo 1; // Dado já existe no banco de dados
    } else {
        echo 0; // Dado não existe no banco de dados
    }
}