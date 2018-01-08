<?php

function cadastrar_veiculos($conexao_com_banco, $placa, $locado_proprio, $locadora, $padrao, $valor_aluguel, $modelo, $renavam, $ano_veiculo, $licenciado, $orgao, $orgao_cedido, $termo_cessao, $manutencao, $logomarca, $seguro, $chipado, $mapa_controle, $condutor, $recolhido_garagem, $multa, $avaria, $observacoes, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_veiculos VALUES ('a', '$placa', '$locado_proprio', '$locadora', '$padrao', '$valor_aluguel', '$modelo', '$renavam', '$ano_veiculo', '$licenciado', '$orgao', '$orgao_cedido', '$termo_cessao', '$manutencao', '$logomarca', '$seguro', '$chipado', '$mapa_controle', '$condutor', '$recolhido_garagem', '$multa', '$avaria', '$observacoes', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_veiculos($conexao_com_banco, $placa, $locado_proprio, $locadora, $padrao, $valor_aluguel, $modelo, $renavam, $ano_veiculo, $licenciado, $orgao, $orgao_cedido, $termo_cessao, $manutencao, $logomarca, $seguro, $chipado, $mapa_controle, $condutor, $recolhido_garagem, $multa, $avaria, $observacoes, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_veiculos SET NM_PLACA='$placa', NM_LOCADO_PROPRIO='$locado_proprio', NM_LOCADORA='$locadora', NM_PADRAO='$padrao', VL_ALUGUEL_MENSAL='$valor_aluguel', NM_MODELO='$modelo', NM_RENAVAM='$renavam', NM_ANO_FABRICACAO='$ano_veiculo', BL_LICENCIADO='$licenciado', ID_ORGAO='$orgao', ID_ORGAO_RECEBIDO='$orgao_cedido', NR_TERMO_CESSAO='$termo_cessao', DT_ULTIMA_MANUTENCAO='$manutencao', BL_LOGOMARCA='$logomarca', BL_SEGURO='$seguro', BL_CHIPADO='$chipado', NM_MAPA_CONTROLE='$mapa_controle', ID_SERVIDOR_CONDUTOR='$condutor', BL_RECOLHIDO_NOITE='$recolhido_garagem', BL_MULTA='$multa', NM_AVARIA='$avaria', NM_OBSERVACOES='$observacoes', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_veiculo($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_veiculos WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>