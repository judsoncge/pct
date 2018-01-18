<?php

function cadastrar_ti($conexao_com_banco, $orgao, $equipamento, $qtd_proprio, $qtd_alugado, $qtd_cedido, $orgao_cedido, $qtd_recebido, $orgao_recebido, $total_disponivel, $observacao, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_ti VALUES ('a', '$orgao', '$equipamento', '$qtd_proprio', '$qtd_alugado', '$qtd_cedido', NULLIF('$orgao_cedido',''),'$qtd_recebido', NULLIF('$orgao_recebido',''), '$total_disponivel', '$observacao', '$data_ultima_atualizacao', '$servidor_atualizou', 'ATIVO')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_ti($conexao_com_banco, $orgao, $equipamento, $qtd_proprio, $qtd_alugado, $qtd_cedido, $orgao_cedido, $qtd_recebido, $orgao_recebido, $total_disponivel, $observacao, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_ti SET ID_ORGAO='$orgao', ID_EQUIPAMENTO='$equipamento', NR_QUANTIDADE_PROPRIO='$qtd_proprio', NR_QUANTIDADE_ALUGADO='$qtd_alugado', NR_QUANTIDADE_CEDIDO='$qtd_cedido', ID_ORGAO_CEDIDO=NULLIF('$orgao_cedido',''), NR_QUANTIDADE_RECEBIDO='$qtd_recebido', ID_ORGAO_ORIGEM=NULLIF('$orgao_recebido',''), NR_TOTAL_DISPONIVEL='$total_disponivel', NM_OBSERVACAO='$observacao', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
	
}

function excluir_ti($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_ti WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>