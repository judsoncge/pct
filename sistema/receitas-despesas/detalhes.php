<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_OBRAS";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_obras";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p><?php echo $informacoes["NM_DENOMINACAO_OBRA"] ?> do(a) <?php echo retorna_nome_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  		
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
							
							<h2>INFORMAÇÕES DA OBRA</h2>
							<hr>
							<b>Denominação da obra</b>:         	<?php echo $informacoes["NM_DENOMINACAO_OBRA"] ?><br>
							<b>Objeto</b>:            				<?php echo $informacoes["NM_OBJETO"] ?><br>
							<b>Local</b>:             				<?php echo $informacoes["NM_LOCAL"] ?><br>
							<b>Data de início</b>:          		<?php echo date_format(new DateTime($informacoes["DT_INICIO"]), 'd/m/Y') ?><br>
							<b>Data prevista para término</b>:  	<?php echo date_format(new DateTime($informacoes["DT_TERMINO"]), 'd/m/Y') ?><br>
							<b>Status da obra</b>:              	<?php echo $informacoes["NM_STATUS"] ?><br>
							<b>Percentual de execução da obra</b>:	<?php echo $informacoes["NM_PERCENTUAL_EXECUCAO"] ?><br>
							<b>Data de referência</b>: 				<?php echo $informacoes["DT_REFERENCIA_EXECUCAO"] ?><br> 
							<b>Número do(s) contrato(s)</b>:		<?php echo retorna_numero_contrato($informacoes["ID_CONTRATO"], $conexao_com_banco) ?><br>
							<b>Valor da obra</b>: 					<?php echo "R$ " . number_format($informacoes["VL_OBRA"] , 2, ",", ".")?><br>
							<hr>							
							<h2>OUTRAS INFORMAÇÕES</h2>
							<hr>
							<b>Beneficiários</b>:    	<?php echo $informacoes["NM_BENEFICIARIOS"] ?><br>							
							<b>Origem dos Recursos</b>: <?php echo $informacoes["NM_ORIGEM_RECURSOS"] ?><br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>