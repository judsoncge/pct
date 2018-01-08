<?php

function cadastrar_passagem_aerea($conexao_com_banco, $beneficiario, $orgao, $data_ida, $data_volta, $valor_ida, $valor_volta, $finalidade, $destino, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_passagens_aereas VALUES ('a', '$beneficiario', '$orgao', '$data_ida', '$data_volta', '$valor_ida', '$valor_volta', '$finalidade', '$destino', '$data_prestacao_contas', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_passagem_aerea($conexao_com_banco, $beneficiario, $orgao, $data_ida, $data_volta, $valor_ida, $valor_volta, $finalidade, $destino, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_passagens_aereas SET ID_SERVIDOR_BENEFICIARIO='$beneficiario', ID_ORGAO='$orgao', DT_IDA='$data_ida', DT_VOLTA='$data_volta', VL_IDA='$valor_ida', VL_VOLTA='$valor_volta', NM_FINALIDADE='$finalidade', NM_DESTINO='$destino', DT_PRESTACAO_CONTAS='$data_prestacao_contas', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_passagem_aerea($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_passagens_aereas WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>