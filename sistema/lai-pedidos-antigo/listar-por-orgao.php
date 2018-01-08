<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_RECEITAS_DESPESAS";
include('../includes/verificacao-permissao.php');
$p = retorna_permissao_servidor($_SESSION['id'], "GERENCIAR_RECEITAS_DESPESAS", $conexao_com_banco);
$mes = date('m'); 
$ano = date('Y');  
$id = isset($_GET["orgao"]) ? $_GET["orgao"] : 1;
$tabela = "tb_orgaos";
include('../includes/verificacao-id.php');
?>

<script type="text/javascript">
	function mostrarDetalhes(id){
		$('.' + id).toggle();
	}
</script>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Receitas/Despesas de <?php echo retorna_sigla_orgao($id, $conexao_com_banco) ?></p>
	</div>
	<?php include('../includes/mensagem.php') ?>
	
	<?php if($o){ ?>
	<form method="GET" action="listar-por-orgao.php" enctype="multipart/form-data"> 
		<div class="col-md-10">
			<label class="control-label" for="exampleInputEmail1">Selecione outro órgão ou <a href="listar.php"> Voltar para todos os órgãos</a></label>
			<select class="form-control" id="orgao" name="orgao" required/>
				<option value="">selecione</option>
				<?php $lista = retorna_orgaos($conexao_com_banco);
				while($r = mysqli_fetch_object($lista)){ ?>
				<option value="<?php echo $r->ID ?>"><?php echo retorna_sigla_orgao($r->ID, $conexao_com_banco) . " - ".  $r->NM_ORGAO ?></option><?php } ?>
			</select>
		</div>
		<div class="col-md-2">
			<button type="submit" class="btn btn-default" id="botao-cadastrar">>></button>
		</div>
	</form>
	<br>
	<br>
	<br>
	<br>
	<?php } ?>
	
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<div class="col-md-12 table-responsive" style="overflow: auto; width: 100%; padding: 20px 15px;">
						<div class="row">
							<div class="col-sm-6">
								<h3>Receitas <?php if($p){ ?><a href="cadastrar-receita.php"><i class="fa fa-plus-circle"></i></a><?php } ?></h3>
							</div>			
						</div>
							<table class="table table-hover tabela-dados tabela-fluxo">
								<thead>
									<tr>
										<th>Descrição</th>
										<th>Jan</th>
										<th>Fev</th>
										<th>Mar</th>
										<th>Abr</th>
										<th>Mai</th>
										<th>Jun</th>
										<th>Jul</th>
										<th>Ago</th>
										<th>Set</th>
										<th>Out</th>
										<th>Nov</th>
										<th>Dez</th>
									</tr>	
								</thead>
								<tbody>
								<tr>
									<td>Saldo do mês anterior</td>
									<?php for($i=1;$i<13;$i++){ ?>
											<?php if($i==1){ ?>
												<td>-</td>
											<?php }else if($i<=$mes){ ?>
												<td>
												<?php 
													echo number_format(retorna_saldo_orgao($i-1, $ano, $id, $conexao_com_banco) , 2, ",", "."); 
												?>
												</td>
											<?php }else if($i>$mes){ ?>
												<td><?php echo "0,00"; ?></td>
											<?php } ?>
									<?php } ?>
								</tr>
									
									<?php 
									$lista = retorna_receitas_ano_orgao($ano, $id, $conexao_com_banco);
									while($r = mysqli_fetch_object($lista)){ ?>
										<tr>
											<td><?php echo $r->NM_RECEITA;?></td>
											
											<?php for($i=1;$i<13;$i++){ ?>
											
												<td>
													<?php if($i <= $mes){
														$valor_receita = retorna_valor_receita_orgao($r->ID_RECEITA, $mes, $ano, $id, $conexao_com_banco); 
														echo number_format($valor_receita, 2, ",", "."); 
													} else{
														echo "0,00";	
													}?><br>
												</td>
											<?php } ?>
										</tr>
									<?php } ?>	
								</tbody>
						</table>
					</div>
					
					<div class="col-md-12 table-responsive" style="overflow: auto; width: 100%; padding: 20px 15px;">
						<h3>Despesas 
							<?php if($p){ ?>
								<a href="cadastrar-despesa.php"><i class="fa fa-plus-circle"></i></a>
							<?php } ?>
						</h3>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<h3>Fixas</h3>
							</div>	
						</div>
							<table class="table table-hover tabela-dados tabela-fluxo">
								<thead>
									<tr>
										<th>Descrição</th>
										<th>Jan</th>
										<th>Fev</th>
										<th>Mar</th>
										<th>Abr</th>
										<th>Mai</th>
										<th>Jun</th>
										<th>Jul</th>
										<th>Ago</th>
										<th>Set</th>
										<th>Out</th>
										<th>Nov</th>
										<th>Dez</th>
									</tr>	
								</thead>
								<tbody>
									<?php 
									$lista = retorna_despesas_tipo_orgao('Fixa', $ano, $id, $conexao_com_banco); 
									while($r = mysqli_fetch_object($lista)){ $codigo = $r->ID_DESPESA;
									?>
									
										<tr>
											<td><?php echo $r->NM_DESPESA; ?></td>
											
											<?php for($i=1;$i<13;$i++){ ?>
												<td>
													<?php 
													if($i <= $mes){
														$valor_despesa = retorna_valor_despesa_orgao($r->ID_DESPESA, $mes, $ano, $id, $conexao_com_banco); 
														echo number_format($valor_despesa, 2, ",", ".");
													}else{
														echo "0,00";	
													}
													?>
												</td>
											<?php } ?>
										</tr>
								<?php } ?>
								
								</tbody>
						</table>
					</div>
					<div class="col-md-12 table-responsive" style="overflow: auto; width: 100%; padding: 20px 15px;">
						<div class="row">
							<div class="col-sm-6">
								<h3>Variaveis</h3>
							</div>	
						</div>
							<table class="table table-hover tabela-dados tabela-fluxo">
								<thead>
									<tr>
										<th>Descrição</th>
										<th>Jan</th>
										<th>Fev</th>
										<th>Mar</th>
										<th>Abr</th>
										<th>Mai</th>
										<th>Jun</th>
										<th>Jul</th>
										<th>Ago</th>
										<th>Set</th>
										<th>Out</th>
										<th>Nov</th>
										<th>Dez</th>
									</tr>	
								</thead>
								<tbody>
									<?php 
									$lista = retorna_despesas_tipo_orgao('Variável', $ano, $id, $conexao_com_banco); 
									while($r = mysqli_fetch_object($lista)){ $codigo = $r->ID_DESPESA;
									?>
									
										<tr>
											<td><?php echo $r->NM_DESPESA; ?></td>
											
											<?php for($i=1;$i<13;$i++){ ?>
												<td>
													<?php 
													if($i <= $mes){
														$valor_despesa = retorna_valor_despesa_orgao($r->ID_DESPESA, $mes, $ano, $id, $conexao_com_banco); 
														echo number_format($valor_despesa, 2, ",", ".");
													}else{
														echo "0,00";	
													}
													?>
												</td>
											<?php } ?>
										</tr>
								<?php } ?>
								
								</tbody>
						</table>
					</div>
					<div class="col-md-12 table-responsive" style="overflow: auto; width: 100%; padding: 20px 15px;">
						<div class="row">
							<div class="col-sm-12">
								<h3>Saldo</h3>
							</div>
						</div>
							<table class="table table-hover tabela-dados tabela-fluxo">
								<thead>
									<tr>
										<th>Descrição</th>
										<th>Jan</th>
										<th>Fev</th>
										<th>Mar</th>
										<th>Abr</th>
										<th>Mai</th>
										<th>Jun</th>
										<th>Jul</th>
										<th>Ago</th>
										<th>Set</th>
										<th>Out</th>
										<th>Nov</th>
										<th>Dez</th>
									</tr>	
								</thead>
								<tbody>
									<tr>
										<td><?php echo "Total de Receitas" ?></td>
										<?php for($i=1;$i<13;$i++){ ?>
											<?php if($i<=$mes){ ?>
												<td><?php $total_receitas = retorna_total_receitas_mes_ano_orgao($i, $ano,$id, $conexao_com_banco); echo number_format($total_receitas , 2, ",", "."); ?></td>
											<?php }else{ ?>
												<td><?php echo "0,00"; ?></td>
											<?php } ?>
										<?php } ?>
									</tr>
									<tr>
										<td><?php echo "Total de Despesas Fixas" ?></td>
										<?php for($i=1;$i<13;$i++){ ?>
											<td><?php $total_despesas_fixas = retorna_total_despesas_mes_ano_tipo_orgao($i, $ano, 'Fixa', $id, $conexao_com_banco); echo number_format($total_despesas_fixas , 2, ",", "."); ?></td>
										<?php } ?>
									</tr>
									<tr>
										<td><?php echo "Total de Despesas Variáveis" ?></td>
										<?php for($i=1;$i<13;$i++){ ?>
											<td><?php $total_despesas_variaveis = retorna_total_despesas_mes_ano_tipo_orgao($i, $ano, 'Variável', $id, $conexao_com_banco); echo number_format($total_despesas_variaveis , 2, ",", "."); ?></td>										
										<?php } ?>
									</tr>
									<tr>
										<td><?php echo "Saldo" ?></td>
										<?php for($i=1;$i<13;$i++){ ?>
											<td><?php if($i<=$mes){ ?>
												<?php echo number_format(retorna_saldo_orgao($i, $ano, $id,  $conexao_com_banco), 2, ",", ".") ?>
											<?php }else{ 
												 echo "0,00"; ?></td>
											<?php } ?>
										<?php } ?>
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