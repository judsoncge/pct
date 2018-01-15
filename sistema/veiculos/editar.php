<?php 
include("../head.php");
include("../body.php");
$permissao_verificar = "GERENCIAR_VEICULOS";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_veiculos";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição do Veículo <?php echo retorna_nome_veiculo($informacoes["ID"], $conexao_com_banco) ?> 
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?id=<?php echo $informacoes["ID"] ?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Condutor</label>
										<a href="../servidores/cadastrar2.php">cadastrar novo</a>
										<select class="form-control" id="condutor" name="condutor" required />
											<option value="<?php echo $informacoes["ID_SERVIDOR_CONDUTOR"] ?>"><?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_CONDUTOR"], $conexao_com_banco) ?></option>
											<?php $lista = retorna_servidores_orgao($_SESSION["orgao"], $conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_SERVIDOR ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-2">
									<div class="form-group">										
										<label class="control-label" for="exampleInputEmail1">Placa</label>
										<input class="form-control" id="placa" name="placa" type="text" maxlength="255" value="<?php echo $informacoes["NM_PLACA"] ?>" required />				  
									</div>	  
								</div>
								<div class="col-md-4">
									<div class="form-group">										
										<label class="control-label" for="exampleInputEmail1">Modelo</label>
										<input class="form-control" id="modelo" name="modelo" type="text" maxlength="255" value="<?php echo $informacoes["NM_MODELO"] ?>" required />				  
									</div>	  
								</div>								
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Locado ou Próprio</label>
										<select class="form-control" id="locado_proprio" name="locado_proprio" required />
											<option value="<?php echo $informacoes["NM_LOCADO_PROPRIO"] ?>"><?php echo $informacoes["NM_LOCADO_PROPRIO"] ?></option>
											<option value="LOCADO">Locado</option>
											<option value="PROPRIO">Próprio</option>
										</select>
									</div> 
								</div>								
							</div>
							<strong><h4>Em caso de veículo locado</h4></strong>			
							<div class="row">
								<div class="col-md-6">									
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Selecione a Locadora </label>
										<a href="../empresas/cadastrar.php">cadastrar nova</a>
										<select class="form-control" id="locadora" name="locadora" />
											<option value="<?php echo $informacoes["ID_EMPRESA"] ?>"><?php echo retorna_nome_empresa($informacoes["ID_EMPRESA"], $conexao_com_banco) ?></option>
											<?php $lista = retorna_empresas($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_EMPRESA ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Padrão</label>
										<select class="form-control" id="padrao" name="padrao" required />
											<option value="<?php echo $informacoes["NM_PADRAO"] ?>"><?php echo $informacoes["NM_PADRAO"] ?></option>
											<option value="A">A</option>
											<option value="A-1">A-1</option>
											<option value="A-2">A-2</option>
											<option value="A-3">A-3</option>
											<option value="B">B</option>
											<option value="B-1">B-1</option>
											<option value="C">C</option>
											<option value="C-1">C-1</option>
											<option value="D">D</option>
											<option value="D-1">D-1</option>
											<option value="D-2">D-2</option>
											<option value="D-2.1">D-2.1</option>
											<option value="E">E</option>
											<option value="E-1">E-1</option>
											<option value="E-1.1">E-1.1</option>
											<option value="E-2">E-2</option>
											<option value="E-3">E-3</option>
											<option value="F">F</option>
											<option value="F-1">F-1</option>
											<option value="F-2">F-2</option>
											<option value="G">G</option>
											<option value="G-1">G-1</option>
											<option value="G-1.1">G-1.1</option>
											<option value="G-2">G-2</option>
											<option value="H">H</option>
											<option value="H-1">H-1</option>
											<option value="H-2">H-2</option>
											<option value="I">I</option>
											<option value="I-1">I-1</option>
											<option value="I-2">I-2</option>
											<option value="I-3">I-3</option>
										</select>
									</div> 
								</div> 
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Valor do Aluguel Mensal</label>
										<input class="form-control" id="valor_aluguel" name="valor_aluguel" type="number" step="0.01" value="<?php echo $informacoes["VL_ALUGUEL_MENSAL"] ?>" required />  
									</div> 
								</div>								
							</div>
							<div class="row">			
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Renavam</label>
										<input class="form-control" id="renavam" name="renavam" type="text" maxlength="255" value="<?php echo $informacoes["NM_RENAVAM"] ?>" required />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Ano de Fabricação</label>
										<input class="form-control" id="ano_veiculo" name="ano_veiculo" type="text" maxlength="255" value="<?php echo $informacoes["NM_ANO_FABRICACAO"] ?>" required />				  
									</div>				
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Licenciado</label>
										<select class="form-control" id="licenciado" name="licenciado" required />
											<option value="<?php echo $informacoes["BL_LICENCIADO"] ?>"><?php echo ($informacoes["BL_LICENCIADO"]) ? "SIM":"NÃO" ?></option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Se Veículo Estiver Cedido</label>
										<select class="form-control" id="orgao_cedido" name="orgao_cedido" />
											<option value="<?php echo $informacoes["ID_ORGAO_CEDIDO"] ?>"> 
												<?php echo retorna_nome_orgao($informacoes["ID_ORGAO_CEDIDO"], $conexao_com_banco) ?>  
											</option>
											<?php $lista = retorna_orgaos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
												<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ORGAO ?></option>
											<?php } ?>
										</select>
									</div> 
								</div>
							</div>
							<div class="row">	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Termo de cessão ou Autorização</label>
										<input class="form-control" id="termo_cessao" name="termo_cessao" type="text" maxlength="255" value="<?php echo $informacoes["NR_TERMO_CESSAO"] ?>" />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Última Manutenção</label>
										<input class="form-control" id="manutencao" name="manutencao" type="date" value="<?php echo $informacoes["DT_ULTIMA_MANUTENCAO"] ?>" required />	  
									</div> 
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Possui Logomarca</label>
										<select class="form-control" id="logomarca" name="logomarca" required />
											<option value="<?php echo $informacoes["BL_LOGOMARCA"] ?>"><?php echo ($informacoes["BL_LOGOMARCA"]) ? "SIM":"NÃO" ?></option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Possui Seguro</label>
										<select class="form-control" id="seguro" name="seguro" required />
											<option value="<?php echo $informacoes["BL_SEGURO"] ?>"><?php echo ($informacoes["BL_SEGURO"]) ? "SIM":"NÃO" ?></option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Chipado</label>
										<select class="form-control" id="chipado" name="chipado" required />
											<option value="<?php echo $informacoes["BL_CHIPADO"] ?>"><?php echo ($informacoes["BL_CHIPADO"]) ? "SIM":"NÃO" ?></option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>							
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Mapa de Controle</label>
										<select class="form-control" id="mapa_controle" name="mapa_controle" required />
											<option value="<?php echo $informacoes["NM_MAPA_CONTROLE"] ?>">
												<?php echo $informacoes["NM_MAPA_CONTROLE"] ?>
											</option>
											<option value="SIM">Sim</option>
											<option value="NÃO">Não</option>
										</select>
									</div> 
								</div> 
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Recolhido Para Garagem a Noite</label>
										<select class="form-control" id="recolhido_garagem" name="recolhido_garagem" required />
											<option value="<?php echo $informacoes["BL_RECOLHIDO_NOITE"] ?>"><?php echo ($informacoes["BL_RECOLHIDO_NOITE"]) ? "SIM":"NÃO" ?></option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Possui Multa</label>
										<select class="form-control" id="multa" name="multa" required />
											<option value="<?php echo $informacoes["BL_MULTA"] ?>"><?php echo ($informacoes["BL_MULTA"]) ? "SIM":"NÃO" ?></option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Possui Avaria</label>
										<input class="form-control" id="avaria" name="avaria" type="text" maxlength="255" value="<?php echo $informacoes["NM_AVARIA"] ?>" required />	
									</div> 
								</div>							
							</div>
							<div class="row" id="cad-button">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Observações</label>
										<input class="form-control" id="observacoes" name="observacoes" type="text" maxlength="255" value="<?php echo $informacoes["NM_OBSERVACOES"] ?>" />				  
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