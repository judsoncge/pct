<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_LAI_PEDIDOS";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_lai_pedidos";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Pedido do(a) <?php echo retorna_nome_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  de  <?php echo $informacoes['NR_MES'] . '/' . $informacoes['NR_ANO'] ?> 	
	</div>
	
	<div class="container caixa-conteudo">
	<div id="uatualizacao">
		<span style="color: red;">Última atualização por <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_ATUALIZOU"], $conexao_com_banco) ?> em <?php echo date_format(new DateTime($informacoes["DT_ULTIMA_ATUALIZACAO"]), 'd/m/Y') ?></span>
	</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<div class="col-md-12 table-responsive" style="overflow: auto; width: 100%;">
						<table class="table table-hover tabela-dados table-bordered"  style="width:50%;float:left">
							<tbody align = 'center'>
									<tr>
										<th>Total de Pedidos de Classificação de Informação</th>
										<td><?php echo $classificacao = $informacoes['NR_TOTAL_PEDIDOS_CLASSIFICACAO_INFORMACAO'] ?></td>
									</tr>
									<tr>
										<th>Total de Pedidos de Desclassificação de Informação</th>
										<td><?php echo $desclassificacao = $informacoes['NR_TOTAL_PEDIDOS_DESCLASSIFICACAO_INFORMACAO'] ?></td>
									</tr>
									<tr>
										<th>Total de Pedidos de Reavaliação  de Informação</th>
										<td><?php echo $reavaliacao = $informacoes['NR_TOTAL_PEDIDOS_REAVALIACAO_INFORMACAO'] ?></td>
									<tr>
									<tr>
										<th>Total de Pedidos</th>
										<td><?php echo $classificacao + $desclassificacao + $reavaliacao ?></td>
									</tr>
							</tbody>
						</table>
						
						<table class="table table-hover tabela-dados table-bordered" style="width:50%;float:left">
							<tbody align = 'center'>
										<th>Total de Pedidos Atendidos</th>
										<td><?php echo $atendidos = $informacoes['NR_TOTAL_PEDIDOS_ATENDIDOS'] ?></td>
									</tr>
									<tr>
										<th>Total de Pedidos Não Atendidos</th>
										<td><?php echo $nao_atendidos = $informacoes['NR_TOTAL_PEDIDOS_NAO_ATENDIDOS'] ?></td>
									</tr>
									<tr>
										<th>Total de Pedidos Indeferidos</th>
										<td><?php echo $indeferidos = $informacoes['NR_TOTAL_PEDIDOS_INDEFERIDOS'] ?></td>
									</tr>
									<tr>
										<th>Total de Pedidos</th>
										<td><?php echo $atendidos + $nao_atendidos + $indeferidos ?></td>
									</tr>
								
							</tbody>
					</table>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>