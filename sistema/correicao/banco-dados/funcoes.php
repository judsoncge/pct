<?php

function cadastrar_correicao($conexao_com_banco, $orgao, $numero_portaria, $data_portaria, $tipo_procedimento, $processo, $data_instauracao, $situacao, $numero_decreto, $data_decreto, $penalidade, $motivo, $cargo, $data_ultima_atualizacao, $servidor_atualizou){
	mysqli_query($conexao_com_banco, "INSERT INTO tb_correicao VALUES ('a', '$orgao', '$numero_portaria', '$data_portaria', '$tipo_procedimento', '$processo', '$data_instauracao', '$situacao', '$numero_decreto', '$data_decreto', '$penalidade', '$motivo', '$cargo', '$data_ultima_atualizacao', '$servidor_atualizou', 'ATIVO')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_correicao($conexao_com_banco, $orgao, $numero_portaria, $data_portaria, $tipo_procedimento, $processo, $data_instauracao, $situacao, $numero_decreto, $data_decreto, $penalidade, $motivo, $cargo, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_correicao  SET ID_ORGAO='$orgao', NM_NUMERO_PORTARIA='$numero_portaria', DT_PUBLICACAO_PORTARIA='$data_portaria', NM_TIPO_PROCEDIMENTO='$tipo_procedimento', NM_NUMERO_PROCESSO='$processo', DT_INSTAURACAO='$data_instauracao', NM_SITUACAO='$situacao', NM_NUMERO_DECRETO='$numero_decreto', DT_PUBLICACAO_DECRETO='$data_decreto', NM_PENALIDADE='$penalidade', NM_MOTIVO='$motivo', NM_CARGO_OCUPADO='$cargo', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_correicao($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_correicao SET NM_STATUS='INATIVO'") or die(mysqli_error($conexao_com_banco));	
	
}

?>
