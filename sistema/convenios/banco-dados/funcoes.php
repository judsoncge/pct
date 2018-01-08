<?php

function cadastrar_convenio($conexao_com_banco, $tipo, $concedente, $orgao, $fecoep, $objeto, $data_inicio, $data_termino, $numero_siafe, $numero_siconv, $numero_siafi, $valor_partida_total, $valor_partida_liberado, $valor_contrapartida_total, $valor_contrapartida_liberado, $valor_aditivo, $prazo_aditivo, $data_ultima_liberacao, $data_prorrogacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_convenios VALUES ('a', '$tipo', '$concedente', '$orgao', '$fecoep', '$objeto', '$data_inicio', '$data_termino', '$numero_siafe', '$numero_siconv', '$numero_siafi', '$valor_partida_total', '$valor_partida_liberado', '$valor_contrapartida_total', '$valor_contrapartida_liberado', '$valor_aditivo', '$prazo_aditivo', '$data_ultima_liberacao', '$data_prorrogacao', '$data_prestacao_contas', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_convenio($conexao_com_banco, $tipo, $concedente, $orgao, $fecoep, $objeto, $data_inicio, $data_termino, $numero_siafe, $numero_siconv, $numero_siafi, $valor_partida_total, $valor_partida_liberado, $valor_contrapartida_total, $valor_contrapartida_liberado, $valor_aditivo, $prazo_aditivo, $data_ultima_liberacao, $data_prorrogacao, $data_prestacao_contas, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_convenios SET NM_TIPO='$tipo', NM_CONCEDENTE='$concedente', ID_ORGAO='$orgao',BL_FECOEP='$fecoep',NM_OBJETO='$objeto',DT_INICIO='$data_inicio',DT_TERMINO='$data_termino',NM_NUMERO_SIAFE='$numero_siafe',NM_NUMERO_SICONV='$numero_siconv',NM_NUMERO_SIAFE='$numero_siafi',VL_PARTIDA_TOTAL='$valor_partida_total',VL_PARTIDA_TOTAL='$valor_partida_liberado',VL_CONTRAPARTIDA_TOTAL='$valor_contrapartida_total',VL_CONTRAPARTIDA_LIBERADO='$valor_contrapartida_liberado',VL_ADITIVO='$valor_aditivo',DT_PRAZO_ADITIVO='$prazo_aditivo',DT_ULTIMA_LIBERACAO='$data_ultima_liberacao',DT_PRORROGACAO='$data_prorrogacao',DT_PRESTACAO_CONTAS='$data_prestacao_contas',DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao',ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id' ") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_convenio($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_convenios WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>
