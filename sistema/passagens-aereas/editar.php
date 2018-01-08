<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_PASSAGENS_AEREAS";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_passagens_aereas";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição de Passagem de <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?> para <?php echo $informacoes["NM_DESTINO"] ?></p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $id ?>&orgao=<?php echo $informacoes["ID_ORGAO"] ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Beneficiário</label>
										<a href="../servidores/cadastrar2.php">cadastrar novo</a>
										<select class="form-control" id="beneficiario" name="beneficiario" required />
											<option value="<?php echo $informacoes["ID_SERVIDOR_BENEFICIARIO"]?>"><?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?></option>
											<?php $lista = retorna_servidores_orgao($_SESSION["orgao"], $conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_SERVIDOR ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Previsão de ida</label>
										<input class="form-control" id="data_ida" name="data_ida" type="date" value="<?php echo $informacoes["DT_IDA"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Previsão de volta</label>
										<input class="form-control" id="data_volta" name="data_volta" type="date" value="<?php echo $informacoes["DT_VOLTA"] ?>" required />	  
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor pago ida</label>
										<input class="form-control" id="valor_ida" name="valor_ida" type="number" step="0.01" value="<?php echo $informacoes["VL_IDA"] ?>" required />  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor pago volta</label>
										<input class="form-control" id="valor_volta" name="valor_volta" type="number" step="0.01" value="<?php echo $informacoes["VL_VOLTA"] ?>" required />  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Destino</label>
										<input class="form-control" id="destino" name="destino" placeholder="Digite o destino" type="text" maxlength="255" value="<?php echo $informacoes["NM_DESTINO"] ?>" required />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de prestação de contas</label>
										<input class="form-control" id="data_prestacao_contas" name="data_prestacao_contas" type="date" value="<?php echo $informacoes["DT_PRESTACAO_CONTAS"] ?>" required />	  
									</div> 
								</div>
							</div>
							<div class="row" id="cad-button">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Finalidade</label>
										<input class="form-control" id="finalidade" name="finalidade" placeholder="Digite a finalidade" type="text" maxlength="255" value="<?php echo $informacoes["NM_FINALIDADE"] ?>" required />				  
									</div>				
								</div>
							</div>
							<div class="row" id="cad-button">
								<div class="col-md-12">
									<button type="submit" class="btn btn-default" name="submit" value="Send" id="submit">Editar</button>
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