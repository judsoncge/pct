<?php
function existe_empresa($conexao_com_banco, $CNPJ){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT * FROM tb_empresas WHERE CD_EMPRESA='$CNPJ'");
	
	if(mysqli_num_rows($retornoquery) > 0){
		return true;
	}else{
		return false;
	}
	
}

function cadastrar_empresa($conexao_com_banco, $nome, $CNPJ){
	
	mysqli_query($conexao_com_banco, "INSERT INTO tb_empresas(NM_EMPRESA, CD_EMPRESA) VALUES ('$nome','$CNPJ')") or die (mysqli_error($conexao_com_banco));

}


?>
