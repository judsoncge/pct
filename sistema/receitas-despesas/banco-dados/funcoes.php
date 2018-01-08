<?php

function cadastrar_receita($conexao_com_banco, $orgao, $tipo, $mes, $ano, $descricao, $valor, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_receitas VALUES ('a', '$orgao', '$tipo', '$mes', '$ano', '$descricao', '$valor', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function cadastrar_despesa($conexao_com_banco, $orgao, $tipo, $mes, $ano, $descricao, $valor, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_despesas VALUES ('a', '$orgao', '$tipo', '$mes', '$ano', '$descricao', '$valor', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

?>