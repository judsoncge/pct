<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_RECEITAS_DESPESAS";
include('../includes/verificacao-permissao.php');
$p = retorna_permissao_servidor($_SESSION['id'], "GERENCIAR_RECEITAS_DESPESAS", $conexao_com_banco);
$mes = date('m'); 
$ano = date('Y');  
$o = retorna_permissao_servidor($_SESSION['id'], "VISAO_TODOS_ORGAOS", $conexao_com_banco);	
if(!$o){
	$orgao = $_SESSION["orgao"];
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=listar-por-orgao.php?orgao=$orgao'>";	
}
?>

<script type="text/javascript">
	function mostrarDetalhes(id){
		$('.' + id).toggle();
	}
</script>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Receitas/Despesas</p>
	</div>
	<?php include('../includes/mensagem.php') ?>
	
	<?php if($o){ ?>
	<form method="GET" action="listar-por-orgao.php" enctype="multipart/form-data"> 
		<div class="col-md-10">
			<label class="control-label" for="exampleInputEmail1">Este é um resumo de todos os órgãos. Para ver somente de um órgão, selecione aqui</label>
			<select class="form-control" id="orgao" name="orgao" required />
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
								
									
									<?php 
										$lista = retorna_receitas_ano($ano, $conexao_com_banco);
										while($r = mysqli_fetch_object($lista)){
									?>
										<tr>
											<td><?php echo $r->NM_RECEITA;?></td>
											
											<?php for($i=1;$i<13;$i++){ ?>
											
												<td>
													<?php if($i <= $mes){								
															$valor_receita = retorna_valor_receita($r->ID_RECEITA, $mes, $ano,  $conexao_com_banco); 
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
										$lista = retorna_despesas_tipo('Fixa', $ano, $conexao_com_banco); 
										while($r = mysqli_fetch_object($lista)){ $codigo = $r->ID_DESPESA;
									?>
									
										<tr>
											<td><a href="javascript:void(0)" onclick="mostrarDetalhes('<?php echo str_replace(".", "", $r->ID_DESPESA);  ?>')"><i class="fa fa-plus-circle"></i> </a><?php echo $r->NM_DESPESA;  ?></td>
											
											<?php for($i=1;$i<13;$i++){ ?>
												<td>
													<?php 
													if($i <= $mes){
														$valor_despesa = retorna_valor_despesa($r->ID_DESPESA, $mes, $ano, $conexao_com_banco); 
														echo number_format($valor_despesa, 2, ",", ".");
													}else{
														echo "0,00";
													}
													?>
												</td>
											<?php } ?>
										</tr>
									
								
									<?php 
									$lista2 = retorna_descricoes_despesa($codigo, $ano, $conexao_com_banco); 
									while($r2 = mysqli_fetch_object($lista2)){ 
									?>
										<tr style="display:none;" class="<?php echo str_replace(".","",$r->ID_DESPESA) ?>">
											<td class="despesa-abs"><?php echo retorna_sigla_orgao($r2->ID_ORGAO, $conexao_com_banco) ?></td>
											
											<?php for($i=1;$i<13;$i++){ ?>
												<td>
													<?php $valor_despesa = retorna_valor_despesa_descricao($r2->ID_DESPESA, $r2->DS_DESPESA, $i, $ano, $conexao_com_banco); 
													echo number_format($valor_despesa, 2, ",", ".");
													?>
												</td>
											<?php } ?>
										</tr>
									<?php } ?>
									
								<?php } ?>
								
								</tbody>
						</table>
					</div>
					<div class="col-md-12 table-responsive" style="overflow: auto; width: 100%; padding: 20px 15px;">
						<div class="row">
							<div class="col-sm-6">
								<h3>Variáveis</h3>
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
										$lista = retorna_despesas_tipo('Variável', $ano, $conexao_com_banco); 
										while($r = mysqli_fetch_object($lista)){ $codigo = $r->ID_DESPESA;
									?>
									
										<tr>
											<td><a href="javascript:void(0)" onclick="mostrarDetalhes('<?php echo str_replace(".", "", $r->ID_DESPESA);  ?>')"><i class="fa fa-plus-circle"></i> </a><?php echo $r->NM_DESPESA;  ?></td>
											
											<?php for($i=1;$i<13;$i++){ ?>
												<td>
													<?php 
													if($i <= $mes){
														$valor_despesa = retorna_valor_despesa($r->ID_DESPESA, $mes, $ano,$conexao_com_banco); 
														echo number_format($valor_despesa, 2, ",", ".");
													}else{
														echo "0,00";
													}
													?>
												</td>
											<?php } ?>
										</tr>
									
								
									<?php 
									$lista2 = retorna_descricoes_despesa($codigo, $ano, $conexao_com_banco); 
									while($r2 = mysqli_fetch_object($lista2)){ 
									?>
										<tr style="display:none;" class="<?php echo str_replace(".","",$r->ID_DESPESA) ?>">
											<td class="despesa-abs"><?php echo retorna_sigla_orgao($r2->ID_ORGAO, $conexao_com_banco) ?></td>
											
											<?php for($i=1;$i<13;$i++){ ?>
												<td>
													<?php $valor_despesa = retorna_valor_despesa_descricao($r2->ID_DESPESA, $r2->DS_DESPESA, $i, $ano, $conexao_com_banco); 
													echo number_format($valor_despesa, 2, ",", ".");
													?>
												</td>
											<?php } ?>
										</tr>
									<?php } ?>
									
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
										<td>Saldo do mês anterior</td>
										<?php for($i=1;$i<13;$i++){ ?>
												<?php if($i==1){ ?>
													<td>-</td>
												<?php }else if($i<=$mes+1){ ?>
													<td>
													<?php 
														echo number_format(retorna_saldo($i-1, $ano, $conexao_com_banco) , 2, ",", ".");  
													?>
													</td>
												<?php }else if($i>$mes){ ?>
													<td><?php echo "0,00"; ?></td>
												<?php } ?>
										<?php } ?>
									</tr>
									<tr>
										<td><?php echo "Total de Receitas" ?></td>
										<?php for($i=1;$i<13;$i++){ ?>
											<?php if($i<=$mes){ ?>
												<td><?php $total_receitas = retorna_total_receitas_mes_ano($i, $ano, $conexao_com_banco); echo number_format($total_receitas , 2, ",", "."); ?></td>
											<?php }else{ ?>
												<td><?php echo "0,00"; ?></td>
											<?php } ?>
										<?php } ?>
									</tr>
									<tr>
										<td><?php echo "Total de Despesas Fixas" ?></td>
										<?php for($i=1;$i<13;$i++){ ?>
											<?php if($i<=$mes){ ?>
											<td><?php $total_despesas_fixas = retorna_total_despesas_mes_ano_tipo($i, $ano, 'Fixa', $conexao_com_banco); echo number_format($total_despesas_fixas , 2, ",", "."); ?></td>
										<?php }else{ ?>
												<td><?php echo "0,00"; ?></td>
										<?php }} ?>
									</tr>
									<tr>
										<td><?php echo "Total de Despesas Variáveis" ?></td>
										<?php for($i=1;$i<13;$i++){ ?>
											<?php if($i<=$mes){ ?>
											<td><?php $total_despesas_fixas = retorna_total_despesas_mes_ano_tipo($i, $ano, 'Fixa', $conexao_com_banco); echo number_format($total_despesas_fixas , 2, ",", "."); ?></td>
										<?php }else{ ?>
												<td><?php echo "0,00"; ?></td>
										<?php }} ?>
									</tr>
									<tr>
										<td><?php echo "Saldo" ?></td>
										<?php for($i=1;$i<13;$i++){ ?>
											<?php if($i<=$mes){ ?>
												<td><?php echo number_format(retorna_saldo($i, $ano, $conexao_com_banco), 2, ",", ".") ?></td>
											<?php }else{ ?>
												<td><?php echo "0,00"; ?></td>
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