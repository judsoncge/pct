<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_TI";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_ti";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição de <?php echo $informacoes["NM_EQUIPAMENTO"] ?> em <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?></p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $id ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Equipamento</label>
										<select class="form-control" id="equipamento" name="equipamento" required />
											<option value="<?php echo $informacoes["NM_EQUIPAMENTO"] ?>"><?php echo $informacoes["NM_EQUIPAMENTO"] ?></option>
											<option value="COMPUTADOR">Computador</option>
											<option value="NOTEBOOK">Notebook</option>
											<option value="MONITOR">Monitor</option>
											<option value="ESTABILIZADOR">Estabilizador</option>
											<option value="IMPRESSORA">Impressora</option>
											<option value="SCANNER">Scanner</option>
											<option value="SWITCH">Switch</option>
											<option value="ROTEADOR">Roteador</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Quantidade Próprio</label>
										<input class="form-control" id="qtd_proprio" name="qtd_proprio" type="number" value="<?php echo $informacoes["NR_QUANTIDADE_PROPRIO"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Quantidade Alugado</label>
										<input class="form-control" id="qtd_alugado" name="qtd_alugado" type="number" value="<?php echo $informacoes["NR_QUANTIDADE_ALUGADO"] ?>" required />	  
									</div> 
								</div>							
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Quantidade Cedido</label>
										<input class="form-control" id="qtd_cedido" name="qtd_cedido" type="number" value="<?php echo $informacoes["NR_QUANTIDADE_CEDIDO"] ?>" required />	  
									</div> 
								</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Órgão Cedido</label>
										<select class="form-control" id="orgao_cedido" name="orgao_cedido" />
											<option value="<?php echo $informacoes["ID_ORGAO_CEDIDO"] ?>"><?php echo $informacoes["ID_ORGAO_CEDIDO"] ?></option>
											<?php $lista = retorna_orgaos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ORGAO ?></option><?php } ?>
										</select>
									</div> 
								</div>							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Quantidade Recebido</label>
										<input class="form-control" id="qtd_recebido" name="qtd_recebido" type="number" value="<?php echo $informacoes["NR_QUANTIDADE_CEDIDO"] ?>" required />	  
									</div> 
								</div>	 	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Órgão Origem</label>
										<select class="form-control" id="orgao_recebido" name="orgao_recebido" />
											<option value="<?php echo $informacoes["ID_ORGAO_ORIGEM"] ?>"><?php echo $informacoes["ID_ORGAO_ORIGEM"] ?></option>
											<?php $lista = retorna_orgaos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ORGAO ?></option><?php } ?>
										</select>
									</div> 
								</div>								
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Observação</label>
										<input class="form-control" id="observacao" name="observacao" placeholder="Digite a observação" type="text" maxlength="255" value="<?php echo $informacoes["NM_OBSERVACAO"] ?>" required />				  
									</div>				
								</div>							
							</div>
							<div class="row" id="cad-button">
								<div class="col-md-12">
									<button type="submit" class="btn btn-default" name="submit" value="Send" id="submit">Cadastrar</button>
								</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>

</div>
<!-- /#Conteúdo da Página/-->

</div>

<?php include('../foot.php')?>