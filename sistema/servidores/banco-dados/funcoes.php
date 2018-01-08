<?php
function existe_servidor($conexao_com_banco, $CPF){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT * FROM tb_servidores WHERE CPF_SERVIDOR='$CPF'");
	
	if(mysqli_num_rows($retornoquery) > 0){
		return true;
	}else{
		return false;
	}
	
}

function cadastrar_servidor($conexao_com_banco, $nome, $CPF, $CNH, $orgao, $matricula, $cargo, $grupo, $condicao, $email){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_servidores(NM_SERVIDOR, CPF_SERVIDOR, CNH_SERVIDOR, ID_ORGAO, NM_MATRICULA, NM_CARGO, ID_GRUPO, NM_CONDICAO, NM_EMAIL) VALUES ('$nome','$CPF', '$CNH', '$orgao', '$matricula', '$cargo', '$grupo', '$condicao' , '$email')") or die (mysqli_error($conexao_com_banco));
	
	$id = mysqli_insert_id($conexao_com_banco);
	
	if($CNH==NULL){
		mysqli_query($conexao_com_banco, "UPDATE tb_servidores SET CNH_SERVIDOR = NULL WHERE ID='$id'") or die (mysqli_error($conexao_com_banco));
	}
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_permissoes(ID_SERVIDOR) VALUES ('$id')") or die (mysqli_error($conexao_com_banco));

	return $id;
}

function editar_servidor($conexao_com_banco, $nome, $CPF, $CNH, $orgao, $matricula, $cargo, $grupo, $condicao, $email, $id){
	
	
	mysqli_query($conexao_com_banco, "UPDATE tb_servidores SET NM_SERVIDOR='$nome', CPF_SERVIDOR='$CPF', CNH_SERVIDOR='$CNH', ID_ORGAO='$orgao', NM_MATRICULA='$matricula' , NM_CARGO='$cargo', ID_GRUPO='$grupo', NM_CONDICAO='$condicao', NM_EMAIL='$email' WHERE ID='$id'") or die (mysqli_error($conexao_com_banco));
	
	if($CNH==NULL){
		mysqli_query($conexao_com_banco, "UPDATE tb_servidores SET CNH_SERVIDOR = NULL WHERE ID='$id'") or die (mysqli_error($conexao_com_banco));
	}
	
}

function editar_foto_servidor($conexao_com_banco, $nome_arquivo, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_servidores SET NM_ARQUIVO_FOTO='$nome_arquivo' WHERE ID='$id'") or die (mysqli_error($conexao_com_banco));
	
}

function editar_senha_servidor($conexao_com_banco, $senha, $id){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_servidores SET SENHA='$senha' WHERE ID='$id'") or die (mysqli_error($conexao_com_banco));	
	
}

function editar_permissao_servidor($conexao_com_banco, $id, $permissao, $valor){
	
	mysqli_query($conexao_com_banco, "UPDATE tb_permissoes SET $permissao='$valor' WHERE ID_SERVIDOR='$id'") or die (mysqli_error($conexao_com_banco));	
	
}

function excluir_servidor($conexao_com_banco, $id){
	
	mysqli_query($conexao_com_banco, "DELETE FROM tb_permissoes WHERE ID_SERVIDOR='$id'") or die (mysqli_error($conexao_com_banco));
	mysqli_query($conexao_com_banco, "DELETE FROM tb_servidores WHERE ID='$id'") or die (mysqli_error($conexao_com_banco));
	
	
}
?>
