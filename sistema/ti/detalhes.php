<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_TI";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_ti";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p><?php echo retorna_nome_equipamento($informacoes["ID_EQUIPAMENTO"], $conexao_com_banco)  ?> em <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?></p>		
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
							
							<h2>INFORMAÇÕES GERAIS</h2>
							<hr>
							<b>Órgão</b>:         
							<?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?><br>
							
							<b>Equipamento</b>:       
							<?php echo retorna_nome_equipamento($informacoes["ID_EQUIPAMENTO"], $conexao_com_banco)  ?><br>
								
							<hr>
							<h2>INFORMAÇÕES DE QUANTIDADE E CESSÃO</h2>
							<hr>
							
							<b>Quantidade Total</b>:       
							<?php echo ($informacoes["NR_QUANTIDADE_PROPRIO"] +  $informacoes["NR_QUANTIDADE_ALUGADO"] + $informacoes["NR_QUANTIDADE_RECEBIDO"] + $informacoes["NR_QUANTIDADE_CEDIDO"])-$informacoes["NR_QUANTIDADE_CEDIDO"]  ?><br>
							
							<b>Quantidade Próprio</b>:       
							<?php echo $informacoes["NR_QUANTIDADE_PROPRIO"] ?><br>
							
							<b>Quantidade Alugado</b>:       
							<?php echo $informacoes["NR_QUANTIDADE_ALUGADO"] ?><br>
							
							<b>Quantidade Recebido</b>:       
							<?php echo $informacoes["NR_QUANTIDADE_RECEBIDO"] ?><br>
							
							<b>Quantidade Cedido</b>:       
							<?php echo $informacoes["NR_QUANTIDADE_CEDIDO"] ?><br>
							
							<b>Órgão Cedido</b>:       
							<?php echo retorna_sigla_orgao($informacoes["ID_ORGAO_CEDIDO"], $conexao_com_banco) ?><br>
							
							<b>Órgão Origem</b>:       
							<?php echo retorna_sigla_orgao($informacoes["ID_ORGAO_ORIGEM"], $conexao_com_banco) ?><br>
							
							<b>Total Disponível</b>:       
							<?php echo $informacoes["NR_TOTAL_DISPONIVEL"] ?><br>

						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>