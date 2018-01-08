<?php

function cadastrar_ti($conexao_com_banco, $orgao, $equipamento, $qtd_proprio, $qtd_alugado, $qtd_cedido, $orgao_cedido, $qtd_recebido, $orgao_recebido, $total_disponivel, $observacao, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_ti (ID, ID_ORGAO, NM_EQUIPAMENTO, NR_QUANTIDADE_PROPRIO, NR_QUANTIDADE_ALUGADO, NR_QUANTIDADE_CEDIDO, NR_QUANTIDADE_RECEBIDO, NR_TOTAL_DISPONIVEL, NM_OBSERVACAO, DT_ULTIMA_ATUALIZACAO, ID_SERVIDOR_ATUALIZOU) VALUES ('a', '$orgao', '$equipamento', '$qtd_proprio', '$qtd_alugado', '$qtd_cedido', '$qtd_recebido', '$total_disponivel', '$observacao', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
	$id = mysqli_insert_id($conexao_com_banco);
	
	if($orgao_cedido != NULL){
		mysqli_query($conexao_com_banco, "UPDATE tb_ti SET ID_ORGAO_CEDIDO='$orgao_cedido' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	}
	
	
	if($orgao_recebido != NULL){
		mysqli_query($conexao_com_banco, "UPDATE tb_ti SET ID_ORGAO_ORIGEM='$orgao_recebido' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	}
	
}

function editar_ti($conexao_com_banco, $orgao, $equipamento, $qtd_proprio, $qtd_alugado, $qtd_cedido, $orgao_cedido, $qtd_recebido, $orgao_recebido, $total_disponivel, $observacao, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_ti SET ID_ORGAO='$orgao', NM_EQUIPAMENTO='$equipamento', NR_QUANTIDADE_PROPRIO='$qtd_proprio', NR_QUANTIDADE_ALUGADO='$qtd_alugado', NR_QUANTIDADE_CEDIDO='$qtd_cedido', NR_QUANTIDADE_RECEBIDO='$qtd_recebido', NR_TOTAL_DISPONIVEL='$total_disponivel', NM_OBSERVACAO='$observacao', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
	if($orgao_cedido != ""){
		mysqli_query($conexao_com_banco, "UPDATE tb_ti SET ID_ORGAO_CEDIDO='$orgao_cedido' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	}
	
	
	if($orgao_recebido != ""){
		mysqli_query($conexao_com_banco, "UPDATE tb_ti SET ID_ORGAO_RECEBIDO='$orgao_recebido' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	}
	
}

function excluir_ti($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_ti WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>