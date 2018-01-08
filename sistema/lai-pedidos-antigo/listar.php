<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_LAI_PEDIDOS";
include('../includes/verificacao-permissao.php');
$p = retorna_permissao_servidor($_SESSION['id'], "GERENCIAR_LAI_PEDIDOS", $conexao_com_banco);
$ano = date('Y');  
$o = retorna_permissao_servidor($_SESSION['id'], "VISAO_TODOS_ORGAOS", $conexao_com_banco);	
?>

<script type="text/javascript">
	function mostrarDetalhes(id){
		$('.' + id).toggle();
	}
</script>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Transparência - Lei de Acesso a Informação (LAI) - Pedidos</p>
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
								<h3>Cadastrar Novo Pedido<?php if($p){ ?><a href="cadastrar.php"><i class="fa fa-plus-circle"></i></a><?php } ?></h3>
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
									<td>Total de Pedidos de Classificação de Informação</td>
									<?php for($i=1;$i<=12;$i++){ ?>
												<td>
												<?php 
													if($o){														
														$classificacao_informacao = retorna_total_classificacao_informacao($i, $ano, $conexao_com_banco);
														if($classificacao_informacao == NULL){
															echo 0;
														}else{
															echo $classificacao_informacao;
														}														
													}else{														
														$classificacao_informacao = retorna_total_classificacao_informacao_orgao($i, $ano, $_SESSION['orgao'], $conexao_com_banco);
														if($classificacao_informacao == NULL){
															echo 0;
														}else{
															echo $classificacao_informacao;
														}	
													} 
												?>
												</td>
											
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