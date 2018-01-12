<?php 
include("../head.php");
include("../body.php");
$permissao_verificar = "VISUALIZAR_CONTRATOS";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_contratos";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Contrato de <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  
		com <?php echo retorna_nome_empresa($informacoes["ID_EMPRESA"], $conexao_com_banco) ?></p>		
	</div>
	
	<div class="container caixa-conteudo">
		<div id="uatualizacao">
			<span style="color: red;">Última atualização por <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_ATUALIZOU"], $conexao_com_banco) ?> em <?php echo date_format(new DateTime($informacoes["DT_ULTIMA_ATUALIZACAO"]), 'd/m/Y') ?></span>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							
							<h2>INFORMAÇÕES</h2>
							<hr>
							<b>Contratado</b>: 
								<?php echo retorna_nome_empresa($informacoes["ID_EMPRESA"],$conexao_com_banco) ?>
								<br>
							<b>CNPJ</b>:
								<?php echo retorna_cnpj_empresa($informacoes["ID_EMPRESA"], $conexao_com_banco) ?>
								<br>
							<b>Órgão</b>:
								<?php echo retorna_nome_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?> - <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>
								<br>
							<b>UG</b>:
								<?php echo retorna_ug_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>
								<br>
							<b>Gestor do contrato</b>:
								<?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_GESTOR"], $conexao_com_banco) ?><br>
							<b>Objeto do contrato</b>:
								<?php echo $informacoes["NM_OBJETO"] ?>
								<br>
							<b>Modalidade</b>:
								<?php echo $informacoes["NM_MODALIDADE"] ?>
								<br>
							<b>Processo administrativo</b>:
								<?php echo $informacoes["NM_PROCESSO"] ?>
								<br>
							<b>Vinculação</b>:
								<?php echo $informacoes["NM_VINCULACAO"] ?>
								<br>
							<hr>
							<h2>VIGÊNCIA</h2>
							<hr>
							<b>Data de assinatura</b>:
								<?php echo date_format(new DateTime($informacoes["DT_ASSINATURA"]), 'd/m/Y') ?>
								<br>
							<b>Data de publicação</b>:
								<?php echo date_format(new DateTime($informacoes["DT_PUBLICACAO"]), 'd/m/Y') ?>
								<br>
							<b>Data de início</b>:
								<?php echo date_format(new DateTime($informacoes["DT_INICIO"]), 'd/m/Y') ?>
								<br>
							<b>Data de término</b>:
								<?php echo date_format(new DateTime($informacoes["DT_TERMINO"]), 'd/m/Y') ?>
								<br>
							<hr>
							<h2>IDENTIFICAÇÃO</h2>
							<hr>
							<b>Número do contrato</b>:
								<?php echo $informacoes["NM_NUMERO_CONTRATO"] ?>
								<br>
							<b>Número do contrato no SIAFI</b>:
								<?php echo $informacoes["NM_NUMERO_CONTRATO_SIAFI"] ?>
								<br>
							<hr>
							<h2>VALOR</h2>
							<hr>
							<b>Valor global</b>:
								<?php echo "R$ " . number_format($informacoes["VL_GLOBAL"],2, ",", ".") ?>
								<br>
							<b>Valor empenhado</b>:
								<?php echo "R$ " . number_format($informacoes["VL_EMPENHADO"],2, ",", ".") ?>
								<br>
							<b>Valor liquidado</b>:
								<?php echo "R$ " . number_format($informacoes["VL_LIQUIDADO"],2, ",", ".") ?>
								<br>
							<b>Valor pago até o momento</b>:
								<?php echo "R$ " . number_format($informacoes["VL_PAGO"],2, ",", ".") ?>
								<br>
							<b>Diferença</b>:
								<?php echo "R$ " . number_format($informacoes["VL_GLOBAL"]-$informacoes["VL_PAGO"],2, ",", ".") ?>
								<br>
							<hr>
							<h2>OUTRAS INFORMAÇÕES</h2>
							<hr>
							<b>É Prorrogável?</b>
								<?php if($informacoes["BL_PRORROGAVEL"]){echo "Sim";}else{echo "Não";} ?>
								<br>
							<b>Termo aditivo</b>:
								<?php echo $informacoes["NR_TERMO_ADITIVO"] ?>º
								<br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>