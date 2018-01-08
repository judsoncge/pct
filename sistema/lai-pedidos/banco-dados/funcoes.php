<?php

function cadastrar_lai_pedidos($conexao_com_banco, $orgao, $pedidos_classificacao_informacao, $pedidos_desclassificacao_informacao, $pedidos_reavaliacao_informacao, $pedidos_atendidos, $pedidos_nao_atendidos, $pedidos_indeferidos, $mes, $ano, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_lai_pedidos VALUES ('a', '$orgao', '$pedidos_classificacao_informacao', '$pedidos_desclassificacao_informacao', '$pedidos_reavaliacao_informacao', '$pedidos_atendidos', '$pedidos_nao_atendidos', '$pedidos_indeferidos', '$mes', '$ano', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_lai_pedidos($conexao_com_banco, $orgao, $pedidos_classificacao_informacao, $pedidos_desclassificacao_informacao, $pedidos_reavaliacao_informacao, $pedidos_atendidos, $pedidos_nao_atendidos, $pedidos_indeferidos, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_lai_pedidos SET ID_ORGAO='$orgao', NR_TOTAL_PEDIDOS_CLASSIFICACAO_INFORMACAO='$pedidos_classificacao_informacao', NR_TOTAL_PEDIDOS_DESCLASSIFICACAO_INFORMACAO='$pedidos_desclassificacao_informacao', NR_TOTAL_PEDIDOS_REAVALIACAO_INFORMACAO='$pedidos_reavaliacao_informacao', NR_TOTAL_PEDIDOS_ATENDIDOS='$pedidos_atendidos', NR_TOTAL_PEDIDOS_NAO_ATENDIDOS='$pedidos_nao_atendidos', NR_TOTAL_PEDIDOS_INDEFERIDOS='$pedidos_indeferidos', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_lai_pedidos($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_lai_pedidos WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>