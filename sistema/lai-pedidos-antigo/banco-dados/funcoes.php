<?php

function cadastrar_obra($conexao_com_banco, $orgao, $denominacao, $objeto, $local, $data_inicio, $data_termino, $status, $percentual_execucao, $data_referencia, $beneficiarios, $id_contrato, $valor_obra, $origem_recurso, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_obras VALUES ('a', '$orgao', '$denominacao', '$objeto', '$local', '$data_inicio', '$data_termino', '$status', '$percentual_execucao', '$data_referencia', '$beneficiarios', '$id_contrato', '$valor_obra', '$origem_recurso', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_obra($conexao_com_banco, $orgao, $denominacao, $objeto, $local, $data_inicio, $data_termino, $status, $percentual_execucao, $data_referencia, $beneficiarios, $id_contrato, $valor_obra, $origem_recurso, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_obras SET ID_ORGAO='$orgao', NM_DENOMINACAO_OBRA='$denominacao', NM_OBJETO='$objeto', NM_LOCAL='$local', DT_INICIO='$data_inicio', DT_TERMINO='$data_termino', NM_STATUS='$status', NM_PERCENTUAL_EXECUCAO='$percentual_execucao', DT_REFERENCIA_EXECUCAO='$data_referencia', NM_BENEFICIARIOS='$beneficiarios', ID_CONTRATO='$id_contrato', VL_OBRA='$valor_obra', NM_ORIGEM_RECURSOS='$origem_recurso', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_obra($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_obras WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>