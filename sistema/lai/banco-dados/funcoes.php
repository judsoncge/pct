<?php

function cadastrar_lai($conexao_com_banco, $orgao, $numero_processo, $numero_protocolo, $canal_acesso, $assunto, $dt_abertura_processo, $dt_recebimento_solicitacao, $dt_final_expedicao_resposta, $prorrogacao, $dt_envio_resposta, $dt_final_recebimento_recurso, $tipo_pessoa, $uf, $situacao, $data_ultima_atualizacao, $servidor_atualizou){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_lai VALUES ('a', '$orgao', '$numero_processo', '$numero_protocolo', '$canal_acesso', '$assunto', '$dt_abertura_processo', '$dt_recebimento_solicitacao', '$dt_final_expedicao_resposta', '$prorrogacao', '$dt_envio_resposta', '$dt_final_recebimento_recurso', '$tipo_pessoa', NULLIF('$uf',''), '$situacao', '$data_ultima_atualizacao', '$servidor_atualizou', 'ATIVO')") or die(mysqli_error($conexao_com_banco));	
	
}

function editar_lai($conexao_com_banco, $orgao, $numero_processo, $numero_protocolo, $canal_acesso, $assunto, $dt_abertura_processo, $dt_recebimento_solicitacao, $dt_final_expedicao_resposta, $prorrogacao, $dt_envio_resposta, $dt_final_recebimento_recurso, $tipo_pessoa, $uf, $situacao, $data_ultima_atualizacao, $servidor_atualizou, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_lai SET ID_ORGAO='$orgao', NM_NUMERO_PROCESSO='$numero_processo', NM_NUMERO_PROTOCOLO='$numero_protocolo', 	NM_CANAL_ACESSO='$canal_acesso', NM_ASSUNTO='$assunto', DT_ABERTURA_PROCESSO='$dt_abertura_processo', DT_RECEBIMENTO_SOLICITACAO='$dt_recebimento_solicitacao', DT_FINAL_EXPEDICAO_RESPOSTA='$dt_final_expedicao_resposta', NM_PRORROGACAO='$prorrogacao', DT_ENVIO_RESPOSTA='$dt_envio_resposta', DT_FINAL_RECEBIMENTO_RECURSO='$dt_final_recebimento_recurso', NM_TIPO_PESSOA='$tipo_pessoa', ID_UF=NULLIF('$uf',''), NM_SITUACAO='$situacao', DT_ULTIMA_ATUALIZACAO='$data_ultima_atualizacao', ID_SERVIDOR_ATUALIZOU='$servidor_atualizou' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

function excluir_lai($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_lai SET NM_STATUS='INATIVO' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
}

?>