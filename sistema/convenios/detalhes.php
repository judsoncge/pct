<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "VISUALIZAR_CONVENIOS";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_convenios";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Convênio de <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  
		com <?php echo $informacoes["NM_CONCEDENTE"] ?></p>		
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
							<b>Tipo</b>:                 <?php echo $informacoes["NM_TIPO"] ?><br>
							<b>Concedente</b>:           <?php echo $informacoes["NM_CONCEDENTE"] ?><br>
							<b>Convenente</b>:           <?php echo retorna_nome_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?> - <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?> <br>
							<b>FECOEP?</b> <?php if($informacoes["BL_FECOEP"]){echo "Sim";}else{echo "Não";} ?><br>
							<b>Objeto do convênio</b>:      <?php echo $informacoes["NM_OBJETO"] ?><br>
							<hr>
							<h2>VIGÊNCIA</h2>
							<hr>
							<b>Data de início</b>:          <?php echo date_format(new DateTime($informacoes["DT_INICIO"]), 'd/m/Y') ?><br>
							<b>Data de término</b>:         <?php echo date_format(new DateTime($informacoes["DT_TERMINO"]), 'd/m/Y') ?><br>
							<hr>
							<h2>IDENTIFICAÇÃO</h2>
							<hr>
							<b>Número do convênio no SIAFE</b>:  <?php echo $informacoes["NM_NUMERO_SIAFE"] ?><br>
							<b>Número do convênio no SICONV</b>: <?php echo $informacoes["NM_NUMERO_SICONV"] ?><br>
							<b>Número do contrato no SIAFI</b>:  <?php echo $informacoes["NM_NUMERO_SIAFI"] ?><br>
							<hr>
							<h2>VALOR</h2>
							<hr>
							<b>Valor de partida total</b>:             <?php echo "R$ " . number_format($informacoes["VL_PARTIDA_TOTAL"],2, ",", ".") ?><br>
							<b>Valor de partida liberado</b>:          <?php echo "R$ " . number_format($informacoes["VL_PARTIDA_LIBERADO"],2, ",", ".") ?><br>
							<b>Porcentagem de partida liberado/total</b>:          <?php echo number_format(($informacoes["VL_PARTIDA_LIBERADO"]/$informacoes["VL_PARTIDA_TOTAL"])*100,1,".","") . "%" ?><br>
							<br>
							<b>Valor de contrapartida total</b>:             <?php echo "R$ " . number_format($informacoes["VL_CONTRAPARTIDA_TOTAL"],2, ",", ".") ?><br>
							<b>Valor de contrapartida liberado</b>:          <?php echo "R$ " . number_format($informacoes["VL_CONTRAPARTIDA_LIBERADO"],2, ",", ".") ?><br>
							<b>Porcentagem de contrapartida liberado/total</b>:          <?php echo number_format(($informacoes["VL_CONTRAPARTIDA_LIBERADO"]/$informacoes["VL_CONTRAPARTIDA_TOTAL"])*100,1,".","") . "%" ?><br>
							<br>
							<b>Valor total</b>:             <?php echo "R$ " . number_format($informacoes["VL_PARTIDA_TOTAL"]+$informacoes["VL_CONTRAPARTIDA_TOTAL"],2, ",", ".")+$informacoes["VL_ADITIVO"],2, ",", ".") ?><br>
							<b>Valor total liberado</b>:          <?php echo "R$ " . number_format($informacoes["VL_PARTIDA_LIBERADO"]+$informacoes["VL_CONTRAPARTIDA_LIBERADO"],2, ",", ".") ?><br>
							<b>Porcentagem liberado/total</b>:          <?php echo number_format((($informacoes["VL_PARTIDA_LIBERADO"]+$informacoes["VL_CONTRAPARTIDA_LIBERADO"])/($informacoes["VL_PARTIDA_TOTAL"]+$informacoes["VL_CONTRAPARTIDA_TOTAL"])+$informacoes["VL_ADITIVO"])*100,1,".","") . "%" ?><br>
							<br>
							<b>Valor aditivo</b>:             <?php echo "R$ " . number_format($informacoes["VL_ADITIVO"],2, ",", ".") ?><br>
							<b>Prazo de aditivo</b>:          <?php echo date_format(new DateTime($informacoes["DT_PRAZO_ADITIVO"]), 'd/m/Y') ?>
							<br>
							<hr>
							<h2>OUTRAS INFORMAÇÕES</h2>
							<hr>
							<b>Data da última liberação</b>:    <?php echo date_format(new DateTime($informacoes["DT_ULTIMA_LIBERACAO"]), 'd/m/Y') ?><br>
							<b>Data de prorrogação</b>:         <?php echo date_format(new DateTime($informacoes["DT_PRORROGACAO"]), 'd/m/Y') ?><br>
							<b>Data de prestação de contas</b>: <?php echo date_format(new DateTime($informacoes["DT_PRESTACAO_CONTAS"]), 'd/m/Y')  ?><br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>