<?php

function cadastrar_combustivel($conexao_com_banco, $veiculo, $data_abastecimento, $total_litros, $valor_litro, $cota_semanal, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_combustivel VALUES ('a', '$veiculo', '$data_abastecimento', '$total_litros', '$valor_litro', '$cota_semanal', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_combustivel($conexao_com_banco, $veiculo, $data_abastecimento, $total_litros, $valor_litro, $cota_semanal, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_combustivel SET ID_VEICULO='$veiculo', DT_ABASTECIMENTO='$data_abastecimento', NR_TOTAL_LITROS_ABASTECIDOS='$total_litros', VL_LITRO_ABASTECIDO='$valor_litro', NR_COTA_SEMANAL='$cota_semanal		', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_combustivel($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_combustivel WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>