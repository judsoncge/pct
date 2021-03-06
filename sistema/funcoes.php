<?php

ini_set('max_execution_time', 10000);

date_default_timezone_set('America/Bahia');

$ROOT = ' http://'.$_SERVER['SERVER_NAME'].'/pct/';

//Funções diversas

function retorna_permissao_cadastro($orgao, $conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT DT_INICIAL_CADASTRO, DT_FINAL_CADASTRO FROM tb_orgaos WHERE ID='$orgao'");

	$datas = mysqli_fetch_row($retornoquery);
	
	$data_inicial = $datas[0];
	
	$data_final = $datas[1];
	
	$data_hoje = Date("Y-m-d");
	
	if($data_inicial <= $data_hoje and $data_hoje <= $data_final){
		return true;
	}else{
		return false;
	}
	
}

function retorna_data_datetime_local($tabela, $nome_campo_data, $id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT DATE_FORMAT($nome_campo_data, '%Y-%m-%dT%H:%i') AS data FROM $tabela WHERE ID='$id'");	

	$data = mysqli_fetch_row($resultado);
	
	return $data[0];	
	
}

function retorna_campos_permissoes_visualizar($conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tb_permissoes' AND COLUMN_NAME LIKE 'VISUALIZAR_%'");

	return $retornoquery;

}

function retorna_campos_permissoes_gerenciar($conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tb_permissoes' AND COLUMN_NAME LIKE 'GERENCIAR_%'");

	return $retornoquery;

}

function retorna_campos_permissoes_diversas($conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tb_permissoes' AND COLUMN_NAME NOT LIKE 'VISUALIZAR_%' AND COLUMN_NAME NOT LIKE 'GERENCIAR_%' AND COLUMN_NAME NOT LIKE 'ID%'");

	return $retornoquery;

}

function retorna_campos_permissoes($conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'tb_permissoes' AND COLUMN_NAME NOT LIKE 'ID%'");

	return $retornoquery;
	
}

function cadastrar_anexo($file, $caminho){
	
	//verifica se de fato é um arquivo que foi anexado
	if(is_file($file['tmp_name'])){

		//a variavel recebe o nome do arquivo anexado pelo usuário
		$novo_anexo = $file['name'];
		
		//a variavel recebe o novo nome sem os caracteres especiais 
		$novo_anexo = retira_caracteres_especiais($novo_anexo);
		
		//verifica se este anexo já está gravado na pasta	
		if(file_exists($caminho.$novo_anexo)){ 
				
				//se sim, coloca um número na frente do anexo, para diferenciar o nome
				$a = 1;
				while(file_exists($caminho."[$a]".$novo_anexo."")){
				$a++;
				}
				//a variavel recebe [1]nome caso já tenha um gravado, [2]nome caso já tenham dois gravados na pasta, e assim por diante
				$novo_anexo = "[".$a."]".$novo_anexo;
			}
		
		//salva o arquivo na pasta de acordo com o tipo de anexo
		move_uploaded_file($file['tmp_name'], $caminho.$novo_anexo);
		
		return $novo_anexo;
			
	}

}


function retira_caracteres_especiais($string){
	
	$string = str_replace(" ","-",$string);
	
	$string = str_replace("á","a",$string);
	$string = str_replace("Á","A",$string);
	$string = str_replace("à","a",$string);
	$string = str_replace("ã","a",$string);
	$string = str_replace("Ã","A",$string);
	$string = str_replace("â","a",$string);
	$string = str_replace("ä","a",$string);
	
	$string = str_replace("é","e",$string);
	$string = str_replace("è","e",$string);
	$string = str_replace("ê","e",$string);
	$string = str_replace("ë","e",$string);
	
	$string = str_replace("í","i",$string);
	$string = str_replace("ì","i",$string);
	$string = str_replace("î","i",$string);
	$string = str_replace("ï","i",$string);
	
	$string = str_replace("ó","o",$string);
	$string = str_replace("ò","o",$string);
	$string = str_replace("õ","o",$string);
	$string = str_replace("ô","o",$string);
	$string = str_replace("ö","o",$string);
	
	$string = str_replace("ú","u",$string);
	$string = str_replace("ù","u",$string);
	$string = str_replace("û","u",$string);
	$string = str_replace("ü","u",$string);
	
	$string = str_replace("ç","c",$string);
	
	$string = str_replace("Á","A",$string);
	$string = str_replace("À","A",$string);
	$string = str_replace("Ã","A",$string);
	$string = str_replace("Â","A",$string);
	$string = str_replace("Ä","A",$string);
	
	$string = str_replace("É","E",$string);
	$string = str_replace("È","E",$string);
	$string = str_replace("Ê","E",$string);
	$string = str_replace("Ë","E",$string);
	
	$string = str_replace("Í","I",$string);
	$string = str_replace("Ì","I",$string);
	$string = str_replace("Î","I",$string);
	$string = str_replace("Ï","I",$string);
	
	$string = str_replace("Ó","O",$string);
	$string = str_replace("Ò","O",$string);
	$string = str_replace("Õ","O",$string);
	$string = str_replace("Ô","O",$string);
	$string = str_replace("Ö","O",$string);
	
	$string = str_replace("Ú","U",$string);
	$string = str_replace("Ù","U",$string);
	$string = str_replace("Û","U",$string);
	$string = str_replace("Ü","U",$string);
	
	$string = str_replace("Ç","C",$string);
	
	return $string;
		
}

//Funções de componentes em geral

function retorna_dados_componente($tabela, $ordem, $conexao_com_banco){
		
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM $tabela WHERE NM_STATUS='ATIVO' ORDER BY $ordem");
	
	return $resultado;
	
}

function retorna_dados_componente_orgao($tabela, $ordem, $id, $conexao_com_banco){
		
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM $tabela WHERE ID_ORGAO='$id' ORDER BY $ordem");
	
	return $resultado;
	
}


function retorna_informacoes($tabela, $id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM $tabela WHERE ID='$id'");
	
	$informacoes = mysqli_fetch_array($resultado);
	
	return $informacoes;
	
}

//Funções de grupos
function retorna_grupos($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_grupos ORDER BY ID");
	
	return $resultado;	
	
}

function retorna_grupo($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_GRUPO, NM_NIVEL FROM tb_grupos WHERE ID='$id'");
	
	$dados = mysqli_fetch_array($resultado);
	
	return $dados;
	
}

function retorna_nivel_grupo($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_NIVEL FROM tb_grupos WHERE ID='$id'");
	
	$nivel = mysqli_fetch_row($resultado);
	
	return $nivel[0];
	
}


//Funções de órgão

function retorna_orgaos($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_orgaos ORDER BY CD_ORGAO");
	
	return $resultado;

}


function retorna_nome_orgao($orgao, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_ORGAO FROM tb_orgaos WHERE ID='$orgao'");
	
	$nome = mysqli_fetch_row($resultado);
	
	return $nome[0];

}

function retorna_sigla_orgao($orgao, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT CD_ORGAO FROM tb_orgaos WHERE ID='$orgao'");
	
	$nome = mysqli_fetch_row($resultado);
	
	return $nome[0];

}

function retorna_ug_orgao($orgao, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT UG_ORGAO FROM tb_orgaos WHERE ID='$orgao'");
	
	$ug = mysqli_fetch_row($resultado);
	
	return $ug[0];

}

function retorna_cargos_orgao($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT DISTINCT(NM_CARGO) FROM tb_servidores WHERE ID_ORGAO='$id'");
	
	return $resultado;

}

//Funções de servidores

function retorna_servidores($conexao_com_banco){
		
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_servidores order by NM_SERVIDOR");
	
	return $resultado;
	
}

function retorna_campos_valores_permissoes_visualizar_servidor($id, $conexao_com_banco) {
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT DISTINCT(ID), COLUMN_NAME FROM tb_permissoes, INFORMATION_SCHEMA.COLUMNS WHERE ID_SERVIDOR='$id' AND TABLE_NAME = 'tb_permissoes' AND COLUMN_NAME LIKE 'VISUALIZAR_%'");
	
	return $retornoquery;
}

function retorna_campos_valores_permissoes_gerenciar_servidor($id, $conexao_com_banco) {
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT DISTINCT(ID), COLUMN_NAME FROM tb_permissoes, INFORMATION_SCHEMA.COLUMNS WHERE ID_SERVIDOR='$id' AND TABLE_NAME = 'tb_permissoes' AND COLUMN_NAME LIKE 'GERENCIAR_%'");
	
	return $retornoquery;
}

function retorna_campos_valores_permissoes_diversas_servidor($id, $conexao_com_banco) {
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT DISTINCT(ID), COLUMN_NAME FROM tb_permissoes, INFORMATION_SCHEMA.COLUMNS WHERE ID_SERVIDOR='$id' AND TABLE_NAME = 'tb_permissoes' AND COLUMN_NAME NOT LIKE 'GERENCIAR_%' AND COLUMN_NAME NOT LIKE 'VISUALIZAR_%' AND COLUMN_NAME NOT LIKE 'ID%'");
	
	return $retornoquery;
}

function retorna_permissao_servidor($id, $permissao, $conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT $permissao FROM tb_permissoes WHERE ID_SERVIDOR='$id'");

	$permissao = mysqli_fetch_row($retornoquery);
	
	return $permissao[0];
	
	
}

function retorna_nome_servidor($id, $conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT NM_SERVIDOR FROM tb_servidores WHERE ID='$id'");

	$nome = mysqli_fetch_row($retornoquery);
	
	return $nome[0];
	
	
}

function retorna_servidores_orgao($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_servidores WHERE ID_ORGAO='$id' order by NM_SERVIDOR");
	
	return $resultado;
	
}

function retorna_servidores_orgao_nao_bolsista($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_servidores WHERE ID_ORGAO='$id' and NM_CONDICAO!='BOLSISTA' order by NM_SERVIDOR");
	
	return $resultado;
	
}
	
function retorna_orgao_servidor($id, $conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT ID_ORGAO FROM tb_servidores WHERE ID='$id'");

	$orgao = mysqli_fetch_row($retornoquery);
	
	return $orgao[0];

}

function retorna_grupo_servidor($id, $conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT ID_GRUPO FROM tb_servidores WHERE ID='$id'");

	$grupo = mysqli_fetch_row($retornoquery);
	
	return $grupo[0];

}

function retorna_condicao_servidor($id, $conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT NM_CONDICAO FROM tb_servidores WHERE ID='$id'");

	$condicao = mysqli_fetch_row($retornoquery);
	
	return $condicao[0];

}

function retorna_cargo_servidor($id, $conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT NM_CARGO FROM tb_servidores WHERE ID='$id'");

	$cargo = mysqli_fetch_row($retornoquery);
	
	return $cargo[0];

}

function retorna_matricula_servidor($id, $conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT NM_MATRICULA FROM tb_servidores WHERE ID='$id'");

	$matricula = mysqli_fetch_row($retornoquery);
	
	return $matricula[0];

}

function retorna_cnh_servidor($id, $conexao_com_banco){
	
	$retornoquery = mysqli_query($conexao_com_banco, "SELECT CNH_SERVIDOR FROM tb_servidores WHERE ID='$id'");

	$cnh = mysqli_fetch_row($retornoquery);
	
	return $cnh[0];

}

//Funções de contratos


function retorna_informacoes_contrato($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_contratos WHERE ID='$id'");
	
	$informacoes = mysqli_fetch_array($resultado);
	
	return $informacoes;
	
}

function retorna_numero_contrato($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_NUMERO_CONTRATO FROM tb_contratos WHERE ID='$id'");
	
	$nr_contrato = mysqli_fetch_row($resultado);
	
	return $nr_contrato[0];
	
}

function retorna_numero_contratos_orgao($id_orgao, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT ID, NM_NUMERO_CONTRATO FROM tb_contratos WHERE ID_ORGAO='$id_orgao'");
	
	return $resultado;
	
}

function validar_vigencia_contrato($data_assinatura, $data_publicacao, $data_inicio, $data_termino){
		
	$mensagem = "";	
		
	if($data_assinatura > $data_publicacao){
		$mensagem = "A data de assinatura não pode ser maior que a data de publicação";	
	}elseif($data_publicacao > $data_inicio){
		$mensagem = "A data de publicação não pode ser maior que a data de início do contrato";
	}elseif($data_inicio > $data_termino){
		$mensagem = "A data de início não pode ser maior que a data de término do contrato";
	}
	
	return $mensagem;

}

function validar_valores_contrato($valor_global, $valor_empenhado, $valor_liquidado, $valor_pago){
		
	$mensagem = "";	
		
	if($valor_global < $valor_empenhado){
		$mensagem = "O valor global não pode ser menor que o valor empenhado";	
	}elseif($valor_empenhado < $valor_liquidado){
		$mensagem = "O valor empenhado não pode ser menor que o valor liquidado";
	}elseif($valor_empenhado < $valor_pago){
		$mensagem = "O valor empenhado não pode ser menor que o valor pago";
	}elseif($valor_liquidado < $valor_pago){
		$mensagem = "O valor liquidado não pode ser menor que o valor pago";
	}
	
	return $mensagem;

}


//Funções de convênios

function validar_datas_convenio($data_inicio, $data_termino, $data_ultima_liberacao, $data_prorrogacao, $data_prestacao_contas){
		
	$mensagem = "";	
		
	if($data_inicio > $data_termino){
		$mensagem = "A data de início não pode ser maior que a data de término do contrato";	
	}
	if($data_inicio >= $data_ultima_liberacao){
		$mensagem = "A data de início não pode ser maior que a data da última liberação";	
	}
	if($data_inicio > $data_prorrogacao){
		$mensagem = "A data de início não pode ser maior que a data de prorrogação";	
	}
	if($data_inicio > $data_prestacao_contas){
		$mensagem = "A data de início não pode ser maior que a data de prestação de contas";	
	}
	if($data_termino > $data_prorrogacao){
		$mensagem = "A data de término não pode ser maior que a data de prorrogação";	
	}
	
	return $mensagem;

}


function validar_valores_convenio($valor_partida, $valor_aditivo_partida, $valor_partida_liberado, $valor_contrapartida, $valor_aditivo_contrapartida, $valor_contrapartida_liberado){
		
	$mensagem = "";	
		
	if($valor_partida_liberado > ($valor_partida + $valor_aditivo_partida)){
		$mensagem = "O valor liberado da partida não pode ser maior que o valor total da partida acrescido do aditivo de partida";	
	}
	if($valor_contrapartida_liberado > ($valor_contrapartida + $valor_contrapartida_liberado)){
		$mensagem = "O valor liberado da contrapartida não pode ser maior que o valor total da contrapartida acrescido do aditivo de contrapartida";	
	}
	
	
	return $mensagem;

}




//Funções de empresa

function retorna_empresas($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_empresas ORDER BY NM_EMPRESA");
	
	return $resultado;
	
}

function retorna_nome_empresa($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_EMPRESA FROM tb_empresas WHERE ID='$id'");
	
	$nome = mysqli_fetch_row($resultado);
	
	return $nome[0];
	
}

function retorna_cnpj_empresa($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT CD_EMPRESA FROM tb_empresas WHERE ID='$id'");
	
	$cnpj = mysqli_fetch_row($resultado);
	
	return $cnpj[0];
	
}


//Funções de diárias

function retorna_valor_diaria($numero_diarias, $tipo, $nome_grupo){
	
	if($numero_diarias <= 15){
		$adicional = 0;
	}else{
		$adicional = $numero_diarias - 15;	
		$numero_diarias = 15;
	}
	
	if($nome_grupo == "I"){
		if($tipo == "A"){
			$valor = ($numero_diarias*550) + ($adicional*275);
		}elseif($tipo == "B1"){
			$valor = ($numero_diarias*420) + ($adicional*210);
		}elseif($tipo == "B2"){
			$valor = ($numero_diarias*350) + ($adicional*175);
		}elseif($tipo == "B3"){
			$valor = ($numero_diarias*280) + ($adicional*140);
		}elseif($tipo == "C"){
			$valor = ($numero_diarias*100) + ($adicional*50);
		}
	}elseif($nome_grupo == "II"){
		if($tipo == "A"){
			$valor = ($numero_diarias*550) + ($adicional*275);
		}elseif($tipo == "B1"){
			$valor = ($numero_diarias*350) + ($adicional*175);
		}elseif($tipo == "B2"){
			$valor = ($numero_diarias*280) + ($adicional*140);
		}elseif($tipo == "B3"){
			$valor = ($numero_diarias*220) + ($adicional*110);
		}elseif($tipo == "C"){
			$valor = ($numero_diarias*80) + ($adicional*40);
		}
	}elseif($nome_grupo == "III"){
		if($tipo == "A"){
			$valor = ($numero_diarias*550) + ($adicional*275);
		}elseif($tipo == "B1"){
			$valor = ($numero_diarias*280) + ($adicional*140);
		}elseif($tipo == "B2"){
			$valor = ($numero_diarias*220) + ($adicional*110);
		}elseif($tipo == "B3"){
			$valor = ($numero_diarias*200) + ($adicional*100);
		}elseif($tipo == "C"){
			$valor = ($numero_diarias*70) + ($adicional*35);
		}
	}elseif($nome_grupo == "IV" or $nome_grupo == "sem grupo"){
		if($tipo == "A"){
			$valor = ($numero_diarias*550) + ($adicional*275);
		}elseif($tipo == "B1"){
			$valor = ($numero_diarias*220) + ($adicional*110);
		}elseif($tipo == "B2"){
			$valor = ($numero_diarias*180) + ($adicional*90);
		}elseif($tipo == "B3"){
			$valor = ($numero_diarias*160) + ($adicional*80);
		}elseif($tipo == "C"){
			$valor = ($numero_diarias*60) + ($adicional*30);
		}
	}
	
	return $valor;
	
}

function validar_datas_diaria($data_publicacao, $data_inicio, $data_termino, $data_prestacao_contas){
		
	$mensagem = "";	
		
	if($data_publicacao > $data_inicio){
		$mensagem = "A data de publicação não pode ser maior que a data de início";	
	}elseif($data_inicio > $data_termino){
		$mensagem = "A data de início não pode ser maior que a data de término";
	}elseif($data_termino > $data_prestacao_contas){
		$mensagem = "A data de término não pode ser maior que a data de prestação de contas";
	}elseif($data_prestacao_contas >= $data_termino){
		$data_termino  = new DateTime($data_termino);
		$data_prestacao_contas = new DateTime($data_prestacao_contas);	
		$diferenca = $data_termino->diff($data_prestacao_contas);
		$diferenca = $diferenca->format("%a");
		$diferenca = (int)$diferenca;
		if($diferenca > 5){
			$mensagem = "A diferença entre a data de prestação de contas e a data de termino não pode ser superior a 5 dias";	
		}	
	}
	
	return $mensagem;

}


//Funções de adiantamentos

function validar_datas_adiantamento($data_recebimento, $data_prestacao_contas){
		
	$mensagem = "";	
		
	if($data_recebimento > $data_prestacao_contas){
		$mensagem = "A data de recebimento não pode ser maior que a data de prestação de contas";	
	}
	
	return $mensagem;

}



//Funções de grupos


function retorna_nome_grupo($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_GRUPO FROM tb_grupos WHERE ID='$id'");
	
	$grupo = mysqli_fetch_row($resultado);
	
	return $grupo[0];
	
}

//Funções de veículos

function retorna_veiculos_orgao($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_veiculos WHERE ID_ORGAO='$id'");
	
	return $resultado;
	
}

function retorna_nome_veiculo($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_MODELO, NM_PLACA FROM tb_veiculos WHERE ID='$id'");
	
	$nome = mysqli_fetch_row($resultado);
	
	return $nome[0] . " - " . $nome[1];
	
}

function retorna_modelo_veiculo($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_MODELO FROM tb_veiculos WHERE ID='$id'");
	
	$modelo = mysqli_fetch_row($resultado);
	
	return $modelo[0];
	
}

function retorna_placa_veiculo($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_PLACA FROM tb_veiculos WHERE ID='$id'");
	
	$placa = mysqli_fetch_row($resultado);
	
	return $placa[0];
	
}

function retorna_locado_proprio_veiculo($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_LOCADO_PROPRIO FROM tb_veiculos WHERE ID='$id'");
	
	$locadoProprio = mysqli_fetch_row($resultado);
	
	return $locadoProprio[0];
	
}

function retorna_chipado_veiculo($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT BL_CHIPADO FROM tb_veiculos WHERE ID='$id'");
	
	$chipado = mysqli_fetch_row($resultado);
	
	if($chipado){
		return "Sim";
		
	}else{
		return "Não";	
	
	}
	
}


function retorna_orgao_veiculo($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT ID_ORGAO FROM tb_veiculos WHERE ID='$id'");
	
	$orgao = mysqli_fetch_row($resultado);
	
	return $orgao[0];
	
}

function validar_locacao_veiculo($locado_proprio, $locadora, $padrao, $valor_aluguel){
		
	$mensagem = "";	
		
	if($locado_proprio == 'LOCADO' && $locadora == NULL){
		$mensagem = "Selecione a empresa onde o veículo foi locado, caso não esteja na lista, cadastre uma nova empresa.";	
	}
	if($locado_proprio == 'LOCADO' && $padrao == NULL){
		$mensagem = "Adicione o padrão do veículo locado.";	
	}
	if($locado_proprio == 'LOCADO' && $valor_aluguel == NULL){
		$mensagem = "Adicione o valor do aluguel mensal do veículo locado.";	
	}
	if($locado_proprio == 'PROPRIO' && $locadora != NULL){
		$mensagem = "Em caso de veículo próprio, o campo referente a empresa locadora de veículos não dever ser preenchido.";	
	}
	if($locado_proprio == 'PROPRIO' && $padrao != NULL){
		$mensagem = "Em caso de veículo próprio, o campo referente ao padrão do veículo locado não dever ser preenchido.";	
	}
	if($locado_proprio == 'PROPRIO' && $valor_aluguel != NULL){
		$mensagem = "Em caso de veículo próprio, o campo referente ao valor do aluguel mensal não dever ser preenchido.";	
	}
	
	return $mensagem;

}

function validar_cessao_veiculo($orgao_cedido, $termo_cessao){
		
	$mensagem = "";	
		
	if($orgao_cedido == NULL && $termo_cessao != NULL){
		$mensagem = "O campo referente ao termo de cessão ou autorização só deve ser preenchido caso o veículo esteja cedido a algum órgão, se for o caso, selecione também o órgão.";	
	}
	if($orgao_cedido != NULL && $termo_cessao == NULL){
		$mensagem = "O campo referente ao órgão de destino só deve ser preenchido caso o veículo esteja cedido, se for o caso, informe também o termo de cessão ou autorização.";	
	}
	
	return $mensagem;

}




//Funções de rmb


function retorna_classificacao_contabil_rmb($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_CLASSIFICACAO_CONTABIL FROM tb_classificacao_contabil_rmb WHERE ID='$id'");
	
	$cl_contabil = mysqli_fetch_row($resultado);
	
	return $cl_contabil[0];
	
}

function retorna_denominacao_contabil_rmb($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_DENOMINACAO FROM tb_classificacao_contabil_rmb WHERE ID='$id'");
	
	$denominacao = mysqli_fetch_row($resultado);
	
	return $denominacao[0];
	
}

function retorna_denominacoes_contabeis_rmb($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT ID, NM_DENOMINACAO FROM tb_classificacao_contabil_rmb");
	
	return $resultado;
	
}

function validar_saldo_rmb($saldo_anterior, $entradas, $entradas_extras, $saidas){
		
	$mensagem = "";	
		
	if($saidas > ($saldo_anterior + $entradas + $entradas_extras)){
		$mensagem = "O valor de saída não pode ser maior que o saldo atual (saldo anterior + entradas + entradas extras)";	
	}	
	
	return $mensagem;

}


//Funções de rma


function retorna_classificacao_contabil_rma($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_CLASSIFICACAO_CONTABIL FROM tb_classificacao_contabil_rma WHERE ID='$id'");
	
	$cl_contabil = mysqli_fetch_row($resultado);
	
	return $cl_contabil[0];
	
}

function retorna_denominacao_contabil_rma($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_DENOMINACAO FROM tb_classificacao_contabil_rma WHERE ID='$id'");
	
	$denominacao = mysqli_fetch_row($resultado);
	
	return $denominacao[0];
	
}

function retorna_denominacoes_contabeis_rma($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT ID, NM_DENOMINACAO FROM tb_classificacao_contabil_rma");
	
	return $resultado;
	
}

function validar_saldo_rma($saldo_anterior, $entradas, $entradas_extras, $saidas){
		
	$mensagem = "";	
		
	if($saidas > ($saldo_anterior + $entradas + $entradas_extras)){
		$mensagem = "O valor de saída não pode ser maior que o saldo atual (saldo anterior + entradas + entradas extras)";	
	}	
	
	return $mensagem;

}

//Funções de uf


function retorna_ufs($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_estados");

	return $resultado;
	
}

function retorna_uf($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_estados WHERE ID='$id'");

	return $resultado;
	
}

//Funções de receitas/despesas

function retorna_receitas_ano($ano, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT DISTINCT(r.ID_RECEITA), t.NM_RECEITA AS NM_RECEITA FROM tb_receitas AS r LEFT JOIN tb_tipos_receitas t ON r.ID_RECEITA = t.ID WHERE NR_ANO='$ano' order by NR_MES");

	return $resultado;	

}

function retorna_receitas_ano_orgao($ano, $orgao, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT DISTINCT(r.ID_RECEITA), t.NM_RECEITA AS NM_RECEITA FROM tb_receitas AS r LEFT JOIN tb_tipos_receitas t ON r.ID_RECEITA = t.ID WHERE NR_ANO='$ano' and ID_ORGAO='$orgao' order by NR_MES");

	return $resultado;	

}

function retorna_despesas_tipo($tipo, $ano, $conexao_com_banco){
		
	$resultado = mysqli_query($conexao_com_banco, "SELECT DISTINCT(d.ID_DESPESA), t.NM_DESPESA as NM_DESPESA FROM tb_despesas d LEFT JOIN tb_tipos_despesas t ON d.ID_DESPESA = t.ID WHERE d.NR_ANO='$ano' and t.NM_TIPO='$tipo' ORDER BY NM_DESPESA");
	
	return $resultado;
	
}

function retorna_despesas_tipo_orgao($tipo, $ano, $orgao, $conexao_com_banco){
		
	$resultado = mysqli_query($conexao_com_banco, "SELECT DISTINCT(d.ID_DESPESA), t.NM_DESPESA as NM_DESPESA FROM tb_despesas d LEFT JOIN tb_tipos_despesas t ON d.ID_DESPESA = t.ID WHERE d.NR_ANO='$ano' and t.NM_TIPO='$tipo' and d.ID_ORGAO='$orgao' ORDER BY NM_DESPESA");
	
	return $resultado;
	
}


function retorna_total_receitas_mes_ano($mes, $ano, $conexao_com_banco){
	
	
		$resultado = mysqli_query($conexao_com_banco, "SELECT SUM(VL_RECEITA) FROM tb_receitas WHERE NR_MES='$mes' and NR_ANO='$ano'");
	
		$total = mysqli_fetch_row($resultado);
	
		return $total[0];

}

function retorna_total_receitas_mes_ano_orgao($mes, $ano, $orgao, $conexao_com_banco){
	
	if($mes==1){
		$resultado = mysqli_query($conexao_com_banco, "SELECT SUM(VL_RECEITA) FROM tb_receitas WHERE NR_MES='$mes' and NR_ANO='$ano' and ID_ORGAO='$orgao'");
	
		$total = mysqli_fetch_row($resultado);
	
		return $total[0];
	
	}else{
		$resultado = mysqli_query($conexao_com_banco, "SELECT SUM(VL_RECEITA) FROM tb_receitas WHERE NR_MES='$mes' and NR_ANO='$ano' and ID_ORGAO='$orgao'");
	
		$total = mysqli_fetch_row($resultado);
		
		$saldo_mes_anterior = retorna_saldo($mes-1,$ano, $conexao_com_banco);
		
		return $total[0]+$saldo_mes_anterior;
	}

}

function retorna_saldo($mes, $ano, $conexao_com_banco){
	
	    $receita_total = 0;
		$despesa_total = 0;
		$saldo = 0;
		
		for($i = $mes; $i >= 1; $i--){
			
			$resultado1 = mysqli_query($conexao_com_banco, "SELECT SUM(VL_RECEITA) FROM tb_receitas WHERE NR_MES='$i' and NR_ANO='$ano'");
	
			$receita_mes = mysqli_fetch_row($resultado1);
		
			$receita_total += $receita_mes[0];
			
			$resultado2 = mysqli_query($conexao_com_banco, "SELECT SUM(VL_DESPESA) FROM tb_despesas WHERE NR_MES='$i' and NR_ANO='$ano'");
	
			$despesa_mes = mysqli_fetch_row($resultado2);
		
			$despesa_total += $despesa_mes[0];
			
		}
		
		$saldo = $receita_total - $despesa_total;
		
		return $saldo;
	
}


function retorna_saldo_orgao($mes, $ano, $orgao, $conexao_com_banco){
	
	    $receita_total = 0;
		$despesa_total = 0;
		$saldo = 0;
		
		for($i = $mes; $i >= 1; $i--){
			
			$resultado1 = mysqli_query($conexao_com_banco, "SELECT SUM(VL_RECEITA) FROM tb_receitas WHERE NR_MES='$i' and NR_ANO='$ano' and ID_ORGAO='$orgao'");
	
			$receita_mes = mysqli_fetch_row($resultado1);
		
			$receita_total += $receita_mes[0];
			
			$resultado2 = mysqli_query($conexao_com_banco, "SELECT SUM(VL_DESPESA) FROM tb_despesas WHERE NR_MES='$i' and NR_ANO='$ano' and ID_ORGAO='$orgao'");
	
			$despesa_mes = mysqli_fetch_row($resultado2);
		
			$despesa_total += $despesa_mes[0];
			
		}
		
		$saldo = $receita_total - $despesa_total;
		
		return $saldo;
	
}

function retorna_total_despesas_mes_ano_tipo($mes, $ano, $tipo, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT SUM(VL_DESPESA) AS SOMATORIO FROM tb_despesas,tb_tipos_despesas WHERE tb_despesas.ID_DESPESA = tb_tipos_despesas.ID AND NR_MES='$mes' and NR_ANO='$ano' and NM_TIPO='$tipo'");
	
	$total = mysqli_fetch_row($resultado);
	
	return $total[0];
	
}

function retorna_total_despesas_mes_ano_tipo_orgao($mes, $ano, $tipo, $orgao, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT SUM(VL_DESPESA) AS SOMATORIO FROM tb_despesas,tb_tipos_despesas WHERE tb_despesas.ID_DESPESA = tb_tipos_despesas.ID AND NR_MES='$mes' and NR_ANO='$ano' and NM_TIPO='$tipo' AND ID_ORGAO='$orgao'");
	
	$total = mysqli_fetch_row($resultado);
	
	return $total[0];
	
}

function retorna_valor_receita($id, $mes, $ano, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT SUM(VL_RECEITA) FROM tb_receitas WHERE ID_RECEITA='$id' and NR_MES='$mes' and NR_ANO='$ano'");
	
	$valor = mysqli_fetch_row($resultado);
	
	return $valor[0];

}

function retorna_valor_receita_orgao($id, $mes, $ano, $orgao, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT SUM(VL_RECEITA) FROM tb_receitas WHERE ID_RECEITA='$id' and NR_MES='$mes' and NR_ANO='$ano' and ID_ORGAO='$orgao'");
	
	$valor = mysqli_fetch_row($resultado);
	
	return $valor[0];

}


function retorna_valor_despesa($id, $mes, $ano, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT SUM(VL_DESPESA) FROM tb_despesas WHERE ID_DESPESA='$id' and NR_MES='$mes' and NR_ANO='$ano'");
	
	$valor = mysqli_fetch_row($resultado);
	
	return $valor[0];

}

function retorna_valor_despesa_orgao($id, $mes, $ano, $orgao, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT SUM(VL_DESPESA) FROM tb_despesas WHERE ID_DESPESA='$id' and NR_MES='$mes' and NR_ANO='$ano' and ID_ORGAO='$orgao'");
	
	$valor = mysqli_fetch_row($resultado);
	
	return $valor[0];

}

function retorna_descricoes_despesa($id, $ano, $conexao_com_banco){
		
	$resultado = mysqli_query($conexao_com_banco, "SELECT DISTINCT(DS_DESPESA) as DS_DESPESA, ID_ORGAO, ID_DESPESA FROM tb_despesas WHERE ID_DESPESA='$id' and NR_ANO='$ano'");
	
	return $resultado;

}

function retorna_valor_despesa_descricao($codigo, $descricao, $mes, $ano, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT sum(VL_DESPESA) FROM tb_despesas WHERE ID_DESPESA='$codigo' and DS_DESPESA='$descricao' and NR_MES='$mes' and NR_ANO='$ano'");
	
	$valor = mysqli_fetch_row($resultado);
	
	return $valor[0];

}

function retorna_tipos_receitas($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_tipos_receitas ORDER BY NM_RECEITA");
	
	return $resultado;
	
}

function retorna_tipos_despesas($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_tipos_despesas ORDER BY NM_DESPESA");
	
	return $resultado;
	
}


//Funções de LAI

function validar_prazo($dt_abertura_processo, $dt_recebimento_solicitacao, $dt_final_expedicao_resposta, $prorrogacao, $dt_envio_resposta, $dt_final_recebimento_recurso){
	
	$dt_abertura_mais_20 = date('Y-m-d', strtotime("+20 days",strtotime($dt_abertura_processo)));
	$mensagem = "";	
	$dt_abertura_mais_30 = date('Y-m-d', strtotime("+30 days",strtotime($dt_abertura_processo)));
	$mensagem = "";	
		
	if($dt_recebimento_solicitacao > $dt_abertura_processo){
		$mensagem = "A data de recebimento da solicitação não deve ser maior que a data de abertura do processo.";	
	}
	if($dt_abertura_processo > $dt_envio_resposta){
		$mensagem = "A data de abertura do processo não deve ser maior que a data de envio de resposta.";	
	}	
	if(($prorrogacao == 'SIM') and ($dt_final_expedicao_resposta > $dt_abertura_mais_30)){		
		$mensagem = "Em caso de prorrogação, a data final para expedição da resposta não deve ultrapassar 30 dias após a abertura do processo.";		
	}
	if(($prorrogacao == 'NÃO') and ($dt_final_expedicao_resposta > $dt_abertura_mais_20)){
		$mensagem = "A data final para expedição da resposta não deve ultrapassar 20 dias após a abertura do processo.";		
	}
	if($dt_abertura_processo > $dt_final_recebimento_recurso){
		$mensagem = "A data de abertura do processo não deve ser maior que a data final de recebimento de recurso.";		
	}
	
	
	return $mensagem;

}



//Funções de LAI Pedidos

function retorna_total_classificacao_informacao($mes, $ano, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NR_TOTAL_PEDIDOS_CLASSIFICACAO_INFORMACAO FROM tb_lai_pedidos WHERE NR_MES=$mes AND NR_ANO='$ano'");
	$valor = mysqli_fetch_row($resultado);
	
	return $valor[0];		
}

function retorna_total_classificacao_informacao_orgao($mes, $ano, $orgao, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NR_TOTAL_PEDIDOS_CLASSIFICACAO_INFORMACAO FROM tb_lai_pedidos WHERE '$orgao'=ID_ORGAO AND NR_ANO='$ano' AND NR_MES='$mes'");	
	
	$valor = mysqli_fetch_row($resultado);
	
	return $valor[0];
	
}

//Funções de cidades
function retorna_estados_cidades($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT e.UF_ESTADO, c.ID, c.NM_CIDADE FROM tb_cidades c, tb_estados e WHERE c.ID_ESTADO = e.ID ORDER BY UF_ESTADO, NM_CIDADE");	

	return $resultado;
	
	
}

function retorna_nome_cidade($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_CIDADE FROM tb_cidades WHERE ID='$id'");	

	$nome = mysqli_fetch_row($resultado);
	
	return $nome[0];
	
}

//Funções de estados
function retorna_uf_estado_cidade($cidade, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT e.UF_ESTADO FROM tb_cidades c, tb_estados e WHERE c.ID_ESTADO = e.ID AND c.ID='$cidade'");	

	$uf = mysqli_fetch_row($resultado);
	
	return $uf[0];
	
}

//Funções de passagens aéreas
function validar_datas_passagens_aereas($data_ida, $data_volta, $data_prestacao_contas){
	
	$mensagem = "";	
		
	if($data_ida > $data_volta){
		$mensagem = "A data de ida não pode ser maior que a data de volta";	
	}elseif($data_volta > $data_prestacao_contas){
		$mensagem = "A data de volta não pode ser maior que a data de prestação de contas";
	}
	
	return $mensagem;
	
}


//Funções de equipamentos
function retorna_equipamentos($conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT * FROM tb_ti_equipamentos");	

	return $resultado;	
	
}

function retorna_nome_equipamento($id, $conexao_com_banco){
	
	$resultado = mysqli_query($conexao_com_banco, "SELECT NM_EQUIPAMENTO FROM tb_ti_equipamentos WHERE ID='$id'");	

	$nome = mysqli_fetch_row($resultado);
	
	return $nome[0];
	
	
	
}

//Funções de obras
function validar_datas_obra($data_inicio, $data_termino, $data_referencia){
	
	$mensagem = "";	
		
	if($data_termino < $data_inicio){
		$mensagem = "A data de termino nao pode ser menor que a data de inicio";	
	}elseif($data_termino < data_referencia or $data_inicio > data_referencia){
		$mensagem = "A data de referencia deve estar entre a data de inicio e termino da obra";
	}
	
	return $mensagem;
	
	
}

//Funções de ouvidoria
function validar_datas_ouvidoria($data_recebimento, $data_abertura, $data_email_confirmacao, $data_email_resposta){
		
	$mensagem = "";	
		
	if($data_recebimento > $data_abertura){
		$mensagem = "A data de recebimento não pode ser maior que a data de abertura";	
	}elseif($data_abertura > $data_email_confirmacao){
		$mensagem = "A data de abertura não pode ser maior que a data de confirmação";
	}elseif($data_email_confirmacao > $data_email_resposta){
		$mensagem = "A data de confirmação não pode ser maior que a data de resposta";
	}
	
	return $mensagem;

}

//Funções de correição
function validar_datas_correicao($data_portaria, $data_instauracao, $data_decreto){
		
	$mensagem = "";	
		
	if($data_portaria > $data_instauracao){
		$mensagem = "A data de portaria não pode ser maior que a data de instauração";	
	}elseif($data_instauracao > $data_decreto){
		$mensagem = "A data de instauração não pode ser maior que a data de decreto";
	}
	
	return $mensagem;

}
?>