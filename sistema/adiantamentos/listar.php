<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "VISUALIZAR_ADIANTAMENTOS";
include("../includes/verificacao-permissao.php");
$p = retorna_permissao_servidor($_SESSION["id"], "GERENCIAR_ADIANTAMENTOS", $conexao_com_banco); 
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Adiantamentos</p>
	</div>
	<?php include('../includes/mensagem.php') ?>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<div class="well">
						<?php if($p and $_SESSION["periodo-cadastro"]){ ?>	
							<div class="row">
								<div class="col-sm-9">
									<div class="input-group margin-bottom-sm">
										<span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span> <input type="text" class="input-search form-control" alt="tabela-dados" placeholder="Buscar pelo órgão e beneficiário" id="search" autofocus="autofocus" />
									</div>
								</div>
								<div class="col-sm-3 pull-right">
									<a href="cadastrar.php" id="botao-cadastrar">
									<i class="fa fa-plus-circle"></i> Novo Adiantamento</a>
								</div>
							</div>
						<?php } else{ ?>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group margin-bottom-sm">
										<span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span> <input type="text" class="input-search form-control" alt="tabela-dados" placeholder="Buscar pelo órgão e beneficiário" id="search" autofocus="autofocus" />
									</div>
								</div>
							</div>
						<?php } ?>


					</div>
					<div class="col-md-12 table-responsive" style="overflow: auto; width: 100%; height: 300px;">
						<table class="table table-hover tabela-dados">
							<thead>
								<tr>
									<th><center>Órgão</center></th>
									<th><center>Beneficiário</center></th>
									<th><center>Data do recebimento</center></th>
									<th><center>Valor recebido</center></th>
									<th><center>Detalhes</center></th>
									<?php if($p){ ?>	
										<th><center>Ação</center></th>
									<?php } ?>	
								</tr>	
							</thead>
							<tbody>
								<?php 
								$o = retorna_permissao_servidor($_SESSION["id"], "VISAO_TODOS_ORGAOS", $conexao_com_banco); 
								if($o){
									$lista = retorna_dados_componente("tb_adiantamentos", "DT_RECEBIMENTO desc", $conexao_com_banco);
								}else{
									$lista = retorna_dados_componente_orgao("tb_adiantamentos", "DT_RECEBIMENTO desc", $_SESSION["orgao"], $conexao_com_banco);
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
											<?php echo retorna_nome_servidor($r->ID_SERVIDOR_BENEFICIARIO, $conexao_com_banco) ?>
										</center>
									</td>
									<td>
										<center>
											<?php echo date_format(new DateTime($r->DT_RECEBIMENTO), 'd/m/Y') ?>
										</center>
									</td>
									<td>
										<center><?php echo "R$ " . number_format($r->VL_RECEBIDO, 2, ",", ".") ?></center>
									</td>
									<td>
										<center>
											<a href="detalhes.php?id=<?php echo $id ?>">Ver detalhes</a>
										</center>
									</td>
									<?php if($p and $_SESSION["periodo-cadastro"]){ ?>
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