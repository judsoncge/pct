<?php

function cadastrar_rma($conexao_com_banco, $orgao, $classificacao_contabil, $saldo_anterior, $entradas, $entradas_extras, $saidas, $saldo_atual, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_rma VALUES ('a', '$orgao', '$classificacao_contabil', '$saldo_anterior', '$entradas', '$entradas_extras', '$saidas', '$saldo_atual', '$data_ultima_atualizacao', '$servidor_atualizou', 'ATIVO')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_rma($conexao_com_banco, $orgao, $classificacao_contabil, $saldo_anterior, $entradas, $entradas_extras, $saidas, $saldo_atual, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_rma SET ID_ORGAO='$orgao', ID_CLASSIFICACAO_CONTABIL='$classificacao_contabil', VL_SALDO_ANTERIOR='$saldo_anterior', VL_ENTRADAS='$entradas', VL_ENTRADAS_EXTRAS='$entradas_extras', VL_SAIDAS='$saidas', VL_SALDO_ATUAL='$saldo_atual', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou', NM_STATUS='ATIVO' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_rma($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_rma SET NM_STATUS='INATIVO' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>