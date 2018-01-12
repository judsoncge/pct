<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "GERENCIAR_CONVENIOS";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_convenios";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição de convênio de <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  
		com <?php echo $informacoes["NM_CONCEDENTE"] ?></p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $informacoes["ID"] ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Tipo</label>
										<select class="form-control" id="tipo" name="tipo" required />
											<option value="<?php echo $informacoes["NM_TIPO"] ?>"><?php echo $informacoes["NM_TIPO"] ?></option>
											<option value="CONVÊNIO">CONVÊNIO</option>
											<option value="CONTRATO DE REPASSE">CONTRATO DE REPASSE</option>
											<option value="TERMO DE COMPROMISSO">TERMO DE COMPROMISSO</option>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Concedente</label>
										<input class="form-control" id="concedente" name="concedente" placeholder="Digite o concedente" type="text" maxlength="255" value="<?php echo $informacoes["NM_CONCEDENTE"] ?>" required />				  
									</div>				
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Convenente</label>
										<input class="form-control" id="convenente" name="convenente" placeholder="Digite o convenente" type="text" maxlength="255" value="<?php echo $informacoes["NM_CONVENENTE"] ?>" required />				  
									</div>				
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">FECOEP?</label>
										<select class="form-control" id="fecoep" name="fecoep" required/>
											<option value="<?php echo $informacoes["BL_FECOEP"] ?>">
												<?php if($informacoes["BL_FECOEP"]){ 
														echo "Sim";	
												}else{
														echo "Não";
												} ?>
											</option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-9">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Objeto do convênio</label>
										<input class="form-control" id="objeto" name="objeto" placeholder="Digite o objeto" type="text" maxlength="255" value="<?php echo $informacoes["NM_OBJETO"] ?>" required />				  
									</div>				
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de início</label>
										<input class="form-control" id="data_inicio" name="data_inicio" type="date" value="<?php echo $informacoes["DT_INICIO"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de término</label>
										<input class="form-control" id="data_termino" name="data_termino" type="date" value="<?php echo $informacoes["DT_TERMINO"] ?>" required />
									</div>				
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do SIAFE</label>
										<input class="form-control" id="numero_siafe" name="numero_siafe" type="text" maxlength="255" value="<?php echo $informacoes["NM_NUMERO_SIAFE"] ?>" />
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do SICONV</label>
										<input class="form-control" id="numero_siconv" name="numero_siconv" type="text" value="<?php echo $informacoes["NM_NUMERO_SICONV"] ?>" maxlength="255" />
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Número do SIAFI</label>
										<input class="form-control" id="numero_siafi" name="numero_siafi" type="text" maxlength="255" value="<?php echo $informacoes["NM_NUMERO_SIAFI"] ?>" />
									</div> 
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de partida</label>
										<input class="form-control" id="valor_partida" name="valor_partida" type="number" step="0.01" value="<?php echo $informacoes["VL_PARTIDA"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de partida liberado</label>
										<input class="form-control" id="valor_partida_liberado" name="valor_partida_liberado" type="number" step="0.01" value="<?php echo $informacoes["VL_PARTIDA_LIBERADO"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de contrapartida</label>
										<input class="form-control" id="valor_contrapartida" name="valor_contrapartida" type="number" step="0.01" value="<?php echo $informacoes["VL_CONTRAPARTIDA"] ?>" required />	  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de contrapartida liberado</label>
										<input class="form-control" id="valor_contrapartida_liberado" name="valor_contrapartida_liberado" type="number" step="0.01" value="<?php echo $informacoes["VL_CONTRAPARTIDA_LIBERADO"] ?>" required />
									</div>				
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de aditivo Partida</label>
										<input class="form-control" id="valor_aditivo_partida" name="valor_aditivo_partida" type="number" step="0.01" value="<?php echo $informacoes["VL_ADITIVO_PARTIDA"] ?>" />	  
									</div> 
								</div>								
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor de aditivo Contrapartida</label>
										<input class="form-control" id="valor_aditivo_contrapartida" name="valor_aditivo_contrapartida" type="number" step="0.01" value="<?php echo $informacoes["VL_ADITIVO_CONTRAPARTIDA"] ?>" />	  
									</div> 
								</div>														
							</div>
							<hr>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data da última liberação</label>
										<input class="form-control" id="data_ultima_liberacao" name="data_ultima_liberacao" type="date" value="<?php echo $informacoes["DT_ULTIMA_LIBERACAO"] ?>" />	  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data de prorrogação</label>
										<input class="form-control" id="data_prorrogacao" name="data_prorrogacao" type="date" value="<?php echo $informacoes["DT_PRORROGACAO"] ?>" />	  
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Data da última prestação de contas</label>
										<input class="form-control" id="data_prestacao_contas" name="data_prestacao_contas" type="date" value="<?php echo $informacoes["DT_PRESTACAO_CONTAS"] ?>" />	  
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