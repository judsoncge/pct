<?php

function cadastrar_diaria($conexao_com_banco, $beneficiario, $orgao, $destino, $objetivo, $meio_transporte, $data_inicio, $data_termino, $numero_diarias, $tipo, $valor, $numero_portaria, $data_publicacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_diarias VALUES ('a', '$beneficiario', '$orgao', '$destino', '$objetivo', '$meio_transporte', '$data_inicio', '$data_termino', '$numero_diarias', '$tipo', '$valor', '$numero_portaria', '$data_publicacao', '$data_prestacao_contas', '$data_ultima_atualizacao', '$servidor_atualizou', 'ATIVO')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_diaria($conexao_com_banco, $beneficiario, $orgao, $destino, $objetivo, $meio_transporte, $data_inicio, $data_termino, $numero_diarias, $tipo, $valor, $numero_portaria, $data_publicacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_diarias SET ID_SERVIDOR_BENEFICIARIO='$beneficiario', ID_ORGAO='$orgao', NM_DESTINO='$destino', NM_OBJETIVO='$objetivo', NM_MEIO_TRANSPORTE='$meio_transporte', DT_INICIO='$data_inicio', DT_TERMINO='$data_termino', NR_DIARIAS='$numero_diarias', NM_TIPO='$tipo', VL_PAGO='$valor', NM_NUMERO_PORTARIA='$numero_portaria', DT_PUBLICACAO='$data_publicacao', DT_PRESTACAO_CONTAS='$data_prestacao_contas', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_diaria($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_diarias SET NM_STATUS='INATIVO' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>
