<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_DIARIAS";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_diarias";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição de diária de <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?>  
		para <?php echo $informacoes["NM_DESTINO"] ?></p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $id ?>&orgao=<?php echo $informacoes["ID_ORGAO"] ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Beneficiário</label>
										<a href="../servidores/cadastrar2.php">cadastrar novo</a>
										<select class="form-control" id="beneficiario" name="beneficiario" required />
											<option value="<?php echo $informacoes["ID_SERVIDOR_BENEFICIARIO"] ?>"><?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?></option>
											<?php $lista = retorna_servidores_orgao($_SESSION["orgao"], $conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_SERVIDOR ?></option>
											<?php } ?>
										</select>
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
										<label class="control-label" for="exampleInputEmail1">Objetivo da viagem</label>
										<input class="form-control" id="objetivo" name="objetivo" placeholder="Digite o objetivo" type="text" maxlength="255" value="<?php echo $informacoes["NM_OBJETIVO"] ?>" required />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Meio de transporte</label>
										<select class="form-control" id="meio_transporte" name="meio_transporte" required />
											<option value="<?php echo $informacoes["NM_MEIO_TRANSPORTE"] ?>"><?php echo $informacoes["NM_MEIO_TRANSPORTE"] ?></option>
											<option value="AEREO">AEREO</option>
											<option value="TERRESTRE">TERRESTRE</option>
										</select>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de início da viagem</label>
										<input class="form-control" id="data_inicio" name="data_inicio" type="date" value="<?php echo $informacoes["DT_INICIO"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número de diárias</label>
										<input class="form-control" id="numero_diarias" name="numero_diarias" type="number" step="0.01" value="<?php echo $informacoes["NR_DIARIAS"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo de diária</label>
										<select class="form-control" id="tipo" name="tipo" required />
											<option value="<?php echo $informacoes["NM_TIPO"] ?>"><?php echo $informacoes["NM_TIPO"] ?></option>
											<option value="A">A - Fora do território nacional</option>
											<option value="B1">B1 - Fora do território estadual - Brasília-DF, Rio de Janeiro-RJ</option>
											<option value="B2">B2 - Fora do território estadual - Demais capitais</option>
											<option value="B3">B3 - Fora do território estadual - Demais</option>
											<option value="C">C - Dentro do território estadual</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número da portaria</label>
										<input class="form-control" id="numero_portaria" name="numero_portaria" placeholder="Digite o número da portaria" type="text" maxlength="255" value="<?php echo $informacoes["NM_NUMERO_PORTARIA"] ?>" required />				  
									</div>				
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de publicação</label>
										<input class="form-control" id="data_publicacao" name="data_publicacao" type="date" value="<?php echo $informacoes["DT_PUBLICACAO"] ?>" required />	  
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