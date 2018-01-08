<?php

function cadastrar_ouvidoria($conexao_com_banco, $orgao, $processo, $data_recebimento, $data_abertura, $tipo_manifestacao, $caracteristica, $assunto, $canal, $tipo_pessoa, $data_email_confirmacao, $data_email_resposta, $orgao_vinculado, $situacao, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_ouvidoria VALUES ('a', '$orgao', '$processo', '$data_recebimento', '$data_abertura', '$tipo_manifestacao', '$caracteristica', '$assunto', '$canal', '$tipo_pessoa', '$data_email_confirmacao', '$data_email_resposta', '$orgao_vinculado', '$situacao', '$data_ultima_atualizacao', '$servidor_atualizou')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_ouvidoria($conexao_com_banco, $orgao, $processo, $data_recebimento, $data_abertura, $tipo_manifestacao, $caracteristica, $assunto, $canal, $tipo_pessoa, $data_email_confirmacao, $data_email_resposta, $orgao_vinculado, $situacao, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_ouvidoria SET ID_ORGAO='$orgao', NM_NUMERO_PROCESSO='$processo', DT_RECEBIMENTO_MANIFESTACAO='$data_recebimento', DT_ABERTURA='$data_abertura', NM_TIPO_MANIFESTACAO='$tipo_manifestacao', NM_CARACTERISTICA_MANIFESTACAO='$caracteristica', NM_ASSUNTO='$assunto', NM_CANAL_RECEBIMENTO_MANIFESTACAO='$canal', NM_TIPO_PESSOA='$tipo_pessoa', DT_EMAIL_CONFIRMACAO='$data_email_confirmacao', DT_EMAIL_RESPOSTA='$data_email_resposta', 	ID_ORGAO_VINCULADO_ENCAMINHADO='$orgao_vinculado', NM_SITUACAO='$situacao', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_ouvidoria($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_ouvidoria WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>