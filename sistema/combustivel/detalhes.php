<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_COMBUSTIVEL";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_combustivel";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Combustível do Veículo <?php echo retorna_nome_veiculo($informacoes["ID_VEICULO"], $conexao_com_banco) ?>  
		da <?php echo retorna_sigla_orgao(retorna_orgao_veiculo($informacoes["ID_VEICULO"], $conexao_com_banco),$conexao_com_banco) ?></p>		
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
							
							<h2>INFORMAÇÕES DO VEÍCULO</h2>
							<hr>
							<b>Modelo</b>:         <?php echo retorna_modelo_veiculo($informacoes["ID_VEICULO"], $conexao_com_banco) ?><br>
							<b>Placa</b>:            <?php echo retorna_placa_veiculo($informacoes["ID_VEICULO"], $conexao_com_banco) ?><br>
							<b>Locado/Proprio</b>:             <?php echo retorna_locado_proprio_veiculo($informacoes["ID_VEICULO"], $conexao_com_banco) ?><br>
							<b>Adesivo do carro</b>:              <?php echo retorna_chipado_veiculo($informacoes["ID_VEICULO"], $conexao_com_banco) ?><br>
							<hr>
							<h2>INFORMAÇÕES DO COMBUSTÍVEL</h2>
							<hr>
							<b>Data de abastecimento</b>:          <?php echo date_format(new DateTime($informacoes["DT_ABASTECIMENTO"]), 'd/m/Y') ?><br>
							<b>Total de Litros Abastecidos</b>:    <?php echo number_format($informacoes["NR_TOTAL_LITROS_ABASTECIDOS"] , 2, ",", ".") . " L" ?><br>
							<b>Valor do litro abastecido</b>:      <?php echo "R$ " . number_format($informacoes["VL_LITRO_ABASTECIDO"] , 2, ",", ".")?><br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>