<?php

function cadastrar_veiculo($conexao_com_banco, $orgao, $placa, $locado_proprio, $locadora, $padrao, $valor_aluguel, $modelo, $renavam, $ano_veiculo, $licenciado, $orgao_cedido, $termo_cessao, $manutencao, $logomarca, $seguro, $chipado, $mapa_controle, $condutor, $recolhido_garagem, $multa, $avaria, $observacoes, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_veiculos VALUES ('a', '$orgao', '$placa', '$locado_proprio', NULLIF('$locadora',''), '$padrao', '$valor_aluguel', '$modelo', '$renavam', '$ano_veiculo', '$licenciado', NULLIF('$orgao_cedido',''), '$termo_cessao', '$manutencao', '$logomarca', '$seguro', '$chipado', '$mapa_controle', '$condutor', '$recolhido_garagem', '$multa', '$avaria', NULLIF('$observacoes',''), '$data_ultima_atualizacao', '$servidor_atualizou', 'ATIVO')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_veiculo($conexao_com_banco, $placa, $locado_proprio, $locadora, $padrao, $valor_aluguel, $modelo, $renavam, $ano_veiculo, $licenciado, $orgao, $orgao_cedido, $termo_cessao, $manutencao, $logomarca, $seguro, $chipado, $mapa_controle, $condutor, $recolhido_garagem, $multa, $avaria, $observacoes, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_veiculos SET NM_PLACA='$placa', NM_LOCADO_PROPRIO='$locado_proprio', ID_EMPRESA=NULLIF('$locadora',''), NM_PADRAO='$padrao', VL_ALUGUEL_MENSAL='$valor_aluguel', NM_MODELO='$modelo', NM_RENAVAM='$renavam', NM_ANO_FABRICACAO='$ano_veiculo', BL_LICENCIADO='$licenciado', ID_ORGAO='$orgao', ID_ORGAO_CEDIDO=NULLIF('$orgao_cedido',''), NR_TERMO_CESSAO='$termo_cessao', DT_ULTIMA_MANUTENCAO='$manutencao', BL_LOGOMARCA='$logomarca', BL_SEGURO='$seguro', BL_CHIPADO='$chipado', NM_MAPA_CONTROLE='$mapa_controle', ID_SERVIDOR_CONDUTOR='$condutor', BL_RECOLHIDO_NOITE='$recolhido_garagem', BL_MULTA='$multa', NM_AVARIA='$avaria', NM_OBSERVACOES=NULLIF('$observacoes',''), DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou', NM_STATUS='ATIVO' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_veiculo($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_veiculos SET NM_STATUS='INATIVO' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>