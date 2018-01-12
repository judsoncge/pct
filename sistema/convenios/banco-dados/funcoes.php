<?php

function cadastrar_convenio($conexao_com_banco, $orgao, $tipo, $concedente, $convenente, $fecoep, $objeto, $data_inicio, $data_termino, $numero_siafe, $numero_siconv, $numero_siafi, $valor_partida, $valor_partida_liberado, $valor_contrapartida, $valor_contrapartida_liberado, $valor_aditivo_partida, $valor_aditivo_contrapartida, $data_ultima_liberacao, $data_prorrogacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_convenios VALUES ('a', '$orgao', '$tipo', '$concedente', '$convenente', '$fecoep', '$objeto', '$data_inicio', '$data_termino', NULLIF('$numero_siafe',''), NULLIF('$numero_siconv',''), NULLIF('$numero_siafi',''), '$valor_partida', '$valor_partida_liberado', '$valor_contrapartida', '$valor_contrapartida_liberado', NULLIF('$valor_aditivo_partida',''), NULLIF('$valor_aditivo_contrapartida',''), '$data_ultima_liberacao', '$data_prorrogacao', '$data_prestacao_contas', '$data_ultima_atualizacao', '$servidor_atualizou', 'ATIVO')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_convenio($conexao_com_banco, $orgao, $tipo, $concedente, $convenente, $fecoep, $objeto, $data_inicio, $data_termino, $numero_siafe, $numero_siconv, $numero_siafi, $valor_partida, $valor_partida_liberado, $valor_contrapartida, $valor_contrapartida_liberado, $valor_aditivo_partida, $valor_aditivo_contrapartida, $data_ultima_liberacao, $data_prorrogacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_convenios SET ID_ORGAO='$orgao', NM_TIPO='$tipo', NM_CONCEDENTE='$concedente', NM_CONVENENTE='$convenente', BL_FECOEP='$fecoep',NM_OBJETO='$objeto',DT_INICIO='$data_inicio',DT_TERMINO='$data_termino', NM_NUMERO_SIAFE=NULLIF('$numero_siafe',''), NM_NUMERO_SICONV=NULLIF('$numero_siconv',''), NM_NUMERO_SIAFI=NULLIF('$numero_siafi',''), VL_PARTIDA='$valor_partida', VL_PARTIDA_LIBERADO='$valor_partida_liberado', VL_CONTRAPARTIDA='$valor_contrapartida', VL_CONTRAPARTIDA_LIBERADO='$valor_contrapartida_liberado', VL_ADITIVO_PARTIDA=NULLIF('$valor_aditivo_partida',''), VL_ADITIVO_CONTRAPARTIDA=NULLIF('$valor_aditivo_contrapartida',''), DT_ULTIMA_LIBERACAO='$data_ultima_liberacao', DT_PRORROGACAO='$data_prorrogacao', DT_PRESTACAO_CONTAS='$data_prestacao_contas', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou', NM_STATUS='ATIVO' WHERE ID='$id' ") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_convenio($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_convenios SET NM_STATUS='INATIVO' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>
