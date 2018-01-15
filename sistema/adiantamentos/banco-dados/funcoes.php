<?php

function cadastrar_adiantamento($conexao_com_banco, $beneficiario, $orgao, $valor_recebido, $data_recebimento, $ordem_bancaria, $valor_material, $valor_pf, $valor_pj, $valor_devolvido_consumo, $valor_devolvido_pf, $valor_devolvido_pj, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_adiantamentos VALUES ('a', '$beneficiario', '$orgao', '$valor_recebido', '$data_recebimento', '$ordem_bancaria', '$valor_material', '$valor_pf', '$valor_pj', '$valor_devolvido_consumo', '$valor_devolvido_pf', '$valor_devolvido_pj', '$data_prestacao_contas', '$data_ultima_atualizacao', '$servidor_atualizou', 'ATIVO')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_adiantamento($conexao_com_banco, $beneficiario, $orgao, $valor_recebido, $data_recebimento, $ordem_bancaria, $valor_material, $valor_pf, $valor_pj, $valor_devolvido_consumo, $valor_devolvido_pf, $valor_devolvido_pj, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_adiantamentos SET ID_SERVIDOR_BENEFICIARIO='$beneficiario', ID_ORGAO='$orgao', VL_RECEBIDO='$valor_recebido', DT_RECEBIMENTO='$data_recebimento', NM_ORDEM_BANCARIA='$ordem_bancaria', VL_MATERIAL_CONSUMO='$valor_material', VL_SERVICOS_PF='$valor_pf', VL_SERVICOS_PJ='$valor_pj', VL_DEVOLVIDO_MATERIAL_CONSUMO='$valor_devolvido_consumo', VL_DEVOLVIDO_PF='$valor_devolvido_pf', VL_DEVOLVIDO_PJ='$valor_devolvido_pj', DT_PRESTACAO_CONTAS='$data_prestacao_contas', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou', NM_STATUS='ATIVO' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_adiantamento($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_adiantamentos SET NM_STATUS='INATIVO' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>
