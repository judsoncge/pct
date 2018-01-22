<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_OBRAS";
include('../includes/verificacao-permissao.php');
$p = retorna_permissao_servidor($_SESSION['id'], "GERENCIAR_OBRAS", $conexao_com_banco); 
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Obras</p>
	</div>
	<?php include('../includes/mensagem.php') ?>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<div class="well">
						<?php if($p and $c){ ?>	
							<div class="row">
								<div class="col-sm-10">
									<div class="input-group margin-bottom-sm">
										<span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span> <input type="text" class="input-search form-control" alt="tabela-dados" placeholder="Buscar por órgão, número do Contrato, data de início e fim, local e status da obra" id="search" autofocus="autofocus" />
									</div>
								</div>
								<div class="col-sm-2 pull-right">
									<a href="cadastrar.php" id="botao-cadastrar">
									<i class="fa fa-plus-circle"></i> Nova Obra</a>
								</div>
							</div>
						<?php } else{ ?>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group margin-bottom-sm">
										<span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span> <input type="text" class="input-search form-control" alt="tabela-dados" placeholder="Buscar por órgão, número do Contrato, data de início e fim, local e status da obra" id="search" autofocus="autofocus" />
									</div>
									<?php if(!$c){ ?>
										<div class="alert alert-warning" role="alert" id="mensagem_aviso"><center>O seu órgão não está no período de cadastro/edição. Apenas as visualizações dos módulos estão disponíveis.</center></div>
									<?php } ?>
								</div>
							</div>
						<?php } ?>


					</div>
					<div class="col-md-12 table-responsive" style="overflow: auto; width: 100%; height: 300px;">
						<table class="table table-hover tabela-dados">
							<thead>
								<tr>
									<th><center>Órgão</center></th>
									<th><center>Número do Contrato</center></th>
									<th><center>Data de Início</center></th>
									<th><center>Data de Término</center></th>									
									<th><center>Situação</center></th>
									<th><center>Detalhes</center></th>
									<?php if($p and $c){ ?>	
										<th><center>Ação</center></th>
									<?php } ?>	
								</tr>	
							</thead>
							<tbody>
								<?php 
								$o = retorna_permissao_servidor($_SESSION['id'], "VISAO_TODOS_ORGAOS", $conexao_com_banco); 
								if($o){
									$lista = retorna_dados_componente("tb_obras", "ID_ORGAO desc", $conexao_com_banco);
								}else{
									$lista = retorna_dados_componente_orgao("tb_obras", "ID_ORGAO desc", $_SESSION["orgao"], $conexao_com_banco);
								}
								while($r = mysqli_fetch_object($lista)){ $id = $r->ID ?>
								
								<tr>
									<td>
										<center>
											<?php echo retorna_sigla_orgao($r->ID_ORGAO, $conexao_com_banco) ?>
										</center>
									</td>
									<td>
										<center>
											<?php echo retorna_numero_contrato($r->ID_CONTRATO, $conexao_com_banco) ?>
										</center>
									</td>
									<td>
										<center>
											<?php echo date_format(new DateTime($r->DT_INICIO), 'd/m/Y') ?>
										</center>
									</td>
									<td>
										<center>
											<?php echo date_format(new DateTime($r->DT_TERMINO), 'd/m/Y') ?>
										</center>
									</td>
									<td>
										<center>
											<?php echo $r->NM_SITUACAO ?>											
										</center>
									</td>
									<td>
										<center>
											<a href="detalhes.php?id=<?php echo $id ?>">Ver detalhes</a>
										</center>
									</td>
									<?php if($p and $c){ ?>
										<td>
											<center>
												
												<a href='editar.php?id=<?php echo $id ?>'>
													<button type='button' class='btn btn-secondary btn-sm' title="Editar">
														<i class="fa fa-pencil" aria-hidden="true"></i>
													</button>
												</a>
												
												<a href='logica/excluir.php?id=<?php echo $id ?>'onclick="return confirm('Você tem certeza que deseja apagar este registro?');">
													<button type='button' class='btn btn-secondary btn-sm' title="Excluir">
														<i class="fa fa-trash" aria-hidden="true"></i>
													</button>
												</a>
												
											</center>
										</td>
									<?php } ?>		
								</tr>
								<?php } ?>	
							</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- informa o número de processos que está "comigo" -->
	<div class="pull-right" style="margin-right: 50px; margin-top: 20px;" id="qtde"></div>
</div>


<?php include('../foot.php')?>