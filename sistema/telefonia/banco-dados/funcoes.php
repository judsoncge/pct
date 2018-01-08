<?php

function cadastrar_telefonia($conexao_com_banco, $orgao, $numero, $tipo, $cota_mensal, $responsavel, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_telefonia VALUES ('a', '$orgao', '$numero', '$tipo', '$cota_mensal', '$responsavel', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_telefonia($conexao_com_banco, $orgao, $numero, $tipo, $cota_mensal, $responsavel, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_telefonia SET ID_SERVIDOR_RESPONSAVEL='$responsavel', ID_ORGAO='$orgao', NM_NUMERO='$numero', NM_TIPO='$tipo', VL_COTA_MENSAL='$cota_mensal', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_telefonia($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_telefonia WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>
