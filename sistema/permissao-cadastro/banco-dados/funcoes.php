<?php

function atualizar_datas_cadastro($data_inicial, $data_final, $id, $conexao_com_banco){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_orgaos SET DT_INICIAL_CADASTRO='$data_inicial', DT_FINAL_CADASTRO='$data_final' WHERE ID='$id'") or die(mysqli_error($conexao_com_banco));	
	
	return mysqli_affected_rows($conexao_com_banco);
	
}

?>
