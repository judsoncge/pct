<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "GERENCIAR_VEICULOS";
include('../includes/verificacao-permissao.php');
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de Veículos</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Condutor</label>
										<a href="../servidores/cadastrar2.php">cadastrar novo</a>
										<select class="form-control" id="condutor" name="condutor" required />
											<option value="">Selecione o condutor</option>
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
										<input class="form-control" id="placa" name="placa" placeholder="Digite a placa" type="text" maxlength="255" required />				  
									</div>	  
								</div> 	
								<div class="col-md-4">
									<div class="form-group">										
										<label class="control-label" for="exampleInputEmail1">Modelo</label>
										<input class="form-control" id="modelo" name="modelo" placeholder="Digite o modelo do veículo" type="text" maxlength="255" required />				  
									</div>	  
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Locado ou Próprio</label>
										<select class="form-control" id="locado_proprio" name="locado_proprio" required />
											<option value="">Selecione o tipo</option>
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
											<option value="">Selecione a locadora</option>
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
										<select class="form-control" id="padrao" name="padrao" />
											<option value="">Selecione</option>
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
										<input class="form-control" id="valor_aluguel" name="valor_aluguel" type="number" step="0.01" />  
									</div> 
								</div>																	
							</div>
							<div class="row">			
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Renavam</label>
										<input class="form-control" id="renavam" name="renavam" placeholder="Digite do renavam do veículo" type="text" maxlength="255" required />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Ano de Fabricação</label>
										<input class="form-control" id="ano_veiculo" name="ano_veiculo" placeholder="Digite o ano de fabricação" type="text" maxlength="255" required />				  
									</div>				
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Licenciado</label>
										<select class="form-control" id="licenciado" name="licenciado" required />
											<option value="">Selecione</option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Se Veículo Estiver Cedido</label>
										<select class="form-control" id="orgao_cedido" name="orgao_cedido" />
											<option value="">Selecione Órgão de Destino</option>
											<?php $lista = retorna_orgaos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ORGAO ?></option><?php } ?>
										</select>
									</div> 
								</div>
							</div>
							<div class="row">	
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Termo de cessão ou Autorização</label>
										<input class="form-control" id="termo_cessao" name="termo_cessao" placeholder="Digite o número do termo de cessão ou autorização" type="text" maxlength="255" />				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Última Manutenção</label>
										<input class="form-control" id="manutencao" name="manutencao" type="date" required />	  
									</div> 
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Possui Logomarca</label>
										<select class="form-control" id="logomarca" name="logomarca" required />
											<option value="">Selecione</option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Possui Seguro</label>
										<select class="form-control" id="seguro" name="seguro" required />
											<option value="">Selecione</option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Chipado</label>
										<select class="form-control" id="chipado" name="chipado" required />
											<option value="">Selecione</option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>							
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Possui mapa de Controle?</label>
										<select class="form-control" id="mapa_controle" name="mapa_controle" required />
											<option value="">Selecione</option>
											<option value="SIM">Sim</option>
											<option value="NÃO">Não</option>
										</select>
									</div> 
								</div> 
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Recolhido Para Garagem a Noite</label>
										<select class="form-control" id="recolhido_garagem" name="recolhido_garagem" required />
											<option value="">Selecione</option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Possui Multa</label>
										<select class="form-control" id="multa" name="multa" required />
											<option value="">Selecione</option>
											<option value="1">Sim</option>
											<option value="0">Não</option>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Possui Avaria</label>
										<input class="form-control" id="avaria" name="avaria" placeholder="Se houver, digite aqui a avaria" type="text" maxlength="255" />
									</div> 
								</div>							
							</div>
							<div class="row" id="cad-button">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Observações</label>
										<input class="form-control" id="observacoes" name="observacoes" placeholder="Se houver, digite aqui as observações referentes ao veículo" type="text" maxlength="255" />				  
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