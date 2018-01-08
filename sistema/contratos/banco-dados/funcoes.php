<?php

function cadastrar_contrato($conexao_com_banco, $empresa, $orgao, $gestor, $objeto, $modalidade, $processo, $vinculacao, $data_assinatura, $data_inicio, $data_publicacao, $data_termino, $numero_contrato, $numero_contrato_siafi, $valor_global, $valor_empenhado, $valor_liquidado, $valor_pago, $prorrogavel, $termo, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_contratos VALUES ('a', '$empresa', '$orgao', '$gestor', '$objeto', '$modalidade', '$processo', '$vinculacao', '$data_assinatura', '$data_inicio', '$data_publicacao', '$data_termino', '$numero_contrato', '$numero_contrato_siafi', '$valor_global', '$valor_empenhado', '$valor_liquidado', '$valor_pago', '$prorrogavel', '$termo', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_contrato($conexao_com_banco, $empresa, $orgao, $gestor, $objeto, $modalidade, $processo, $vinculacao, $data_assinatura, $data_inicio, $data_publicacao, $data_termino, $numero_contrato, $numero_contrato_siafi, $valor_global, $valor_empenhado, $valor_liquidado, $valor_pago, $prorrogavel, $termo, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_contratos SET ID_EMPRESA='$empresa',ID_ORGAO='$orgao',NM_GESTOR='$gestor',NM_OBJETO='$objeto',NM_MODALIDADE='$modalidade',NM_PROCESSO='$processo',NM_VINCULACAO='$vinculacao',DT_ASSINATURA='$data_assinatura',DT_INICIO='$data_inicio',DT_PUBLICACAO='$data_publicacao',DT_TERMINO='$data_termino',NM_NUMERO_CONTRATO='$numero_contrato',NM_NUMERO_CONTRATO_SIAFI='$numero_contrato_siafi',VL_GLOBAL='$valor_global',VL_EMPENHADO='$valor_empenhado',VL_LIQUIDADO='$valor_liquidado',VL_PAGO='$valor_pago',BL_PRORROGAVEL='$prorrogavel',NR_TERMO_ADITIVO='$termo',DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao',ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id' ") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_contrato($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_contratos WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>
