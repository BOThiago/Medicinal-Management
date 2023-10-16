<?php	
include "../../include/mysqlconecta.php";

$SQL = "select * from paciente p
left join enfermidade e on p.id_enfermidade = e.id_enfermidade
left join medicamento m ON p.id_medicamento = m.id_medicamento";

$result_id = @mysqli_query($conexao,$SQL) or die("Ocorreu um erro! 001");
$linhas_json = array();

while($rows = mysqli_fetch_array($result_id)){
    $anmpac_nome = $rows['nome'];
    $anmpac_cpf = $rows['cpf'];
    $anmpac_sexo = $rows['sexo'] == 'M' ? 'Masculino' : 'Feminino';
    $anmpac_idade = $rows['idade'];
    if($rows['nome_enfermidade'] == null){
        $anmpac_enfermidade = "<button type='button' class='btn btn-success' onclick='addEfermidade($anmpac_cpf)'>Adicionar</button>";    
    }else{
        $anmpac_enfermidade = $rows['nome_enfermidade'];
    }
    if($rows['nome_medicamento'] == null){
        $anmpac_medicamento = "<button type='button' class='btn btn-success' onclick='addMedicamento($anmpac_cpf)'>Adicionar</button>";    
    }else{
        $anmpac_medicamento = $rows['nome_medicamento'];
    }
    $linha_json = array(
        'anmpac_nome'=>$anmpac_nome,
        'anmpac_cpf'=>$anmpac_cpf,
        'anmpac_sexo'=>$anmpac_sexo,
        'anmpac_idade'=>$anmpac_idade,
        'anmpac_enfermidade'=>$anmpac_enfermidade,
        'anmpac_medicamento'=>$anmpac_medicamento,
    ); 
    $linhas_json[] = $linha_json; 
}
echo json_encode($linhas_json);
?>