<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_RMB";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_rmb";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>RMB do(a) <?php echo retorna_nome_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  de Denominação <?php echo retorna_denominacao_contabil_rmb($informacoes["ID_CLASSIFICACAO_CONTABIL"], $conexao_com_banco) ?> 	
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
							
							<h2>CLASSIFICAÇÃO DO PATRIMÔNIO</h2>
							<hr>							
							<b>Tipo</b>: <?php echo $informacoes["NM_TIPO_PATRIMONIO"]?><br>
							<b>Classificação Contábil</b>:	<?php echo retorna_classificacao_contabil_rmb($informacoes["ID_CLASSIFICACAO_CONTABIL"], $conexao_com_banco) ?> <br>
							<b>Denominação</b>:	<?php echo retorna_denominacao_contabil_rmb($informacoes["ID_CLASSIFICACAO_CONTABIL"], $conexao_com_banco) ?><br>	
							<hr>							
							<h2>INFORMAÇÕES DE VALORES</h2>
							<hr>
							<b>Saldo Anterior</b>: <?php echo "R$ " . number_format($informacoes["VL_SALDO_ANTERIOR"],2, ",", ".") ?><br>
							<b>Entradas</b>: <?php echo "R$ " . number_format($informacoes["VL_ENTRADAS"],2, ",", ".") ?><br>
							<b>Entradas Extras</b>: <?php echo "R$ " . number_format($informacoes["VL_ENTRADAS_EXTRAS"],2, ",", ".") ?><br>
							<b>Saídas</b>: <?php echo "R$ " . number_format($informacoes["VL_SAIDAS"],2, ",", ".") ?><br>
							<b>Saldo Atual</b>: <?php echo "R$ " . number_format($informacoes["VL_SALDO_ATUAL"],2, ",", ".") ?><br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>