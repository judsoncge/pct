<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "GERENCIAR_SERVIDORES";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_servidores";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
$grupo = retorna_grupo($informacoes["ID_GRUPO"], $conexao_com_banco);
$permissoes_visualizar = retorna_campos_valores_permissoes_visualizar_servidor($id, $conexao_com_banco);
$permissoes_gerenciar = retorna_campos_valores_permissoes_gerenciar_servidor($id, $conexao_com_banco);
$permissoes_diversas = retorna_campos_valores_permissoes_diversas_servidor($id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Edição do(a) servidor(a) <?php echo $informacoes['NM_SERVIDOR'] ?></p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/editar.php?operacao=info&id=<?php echo $informacoes['ID']?>&CPF=<?php echo $informacoes['CPF_SERVIDOR']?>" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Nome</label>
										<input class="form-control" id="nome" name="nome" placeholder="Digite o nome (somente letras)" 
										type="text" maxlength="255" minlength="4" pattern="[a*A*-z*Z*]*+" value="<?php echo $informacoes['NM_SERVIDOR'] ?>" required/>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">CPF</label>
										<input class="form-control" id="CPF" name="CPF" placeholder="Digite o CPF" type="text" value="<?php echo $informacoes['CPF_SERVIDOR'] ?>" required/>				  
									</div>				
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Órgão</label>
										<select class="form-control" id="orgao" name="orgao" required/>
											<option value="<?php echo $informacoes['ID_ORGAO'] ?>"><?php echo retorna_nome_orgao($informacoes['ID_ORGAO'], $conexao_com_banco) ?></option>
											<?php $lista = retorna_orgaos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_ORGAO ?></option><?php } ?>
										</select>
									</div>  
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Matrícula</label>
										<input class="form-control" id="matricula" name="matricula" placeholder="Digite a matricula" 
											type="text" maxlength="255" value="<?php echo $informacoes['NM_MATRICULA'] ?>" />
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Cargo</label>
										<input class="form-control" id="cargo" name="cargo" placeholder="Digite o cargo (somente letras)" 
										type="text" maxlength="255" minlength="4" pattern="[a*A*-z*Z*]*+" value="<?php echo $informacoes['NM_CARGO'] ?>" required />
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Grupo/Nível</label>
										<select class="form-control" id="grupo" name="grupo" required />
											<option value="<?php echo $informacoes["ID_GRUPO"] ?>"><?php echo $grupo["NM_GRUPO"] . " - " . $grupo["NM_NIVEL"] ?></option>
											<?php $lista = retorna_grupos($conexao_com_banco);
											while($r = mysqli_fetch_object($lista)){ ?>
											<option value="<?php echo $r->ID ?>"><?php echo $r->NM_GRUPO . " - " . $r->NM_NIVEL ?></option><?php } ?>
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Condição</label>
										<select class="form-control" id="condicao" name="condicao" required/>
											<option value="<?php echo $informacoes["NM_CONDICAO"] ?>"><?php echo $informacoes["NM_CONDICAO"] ?></option>
											<option value="COMISSIONADO">Comissionado</option>
											<option value="EFETIVO">Efetivo</option>
											<option value="CONTRATADO">Contratado</option>
											<option value="BOLSISTA">Bolsista</option>
											<option value="OUTRO">Outro</option>		
										</select>
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Email</label>
										<input class="form-control" id="email" name="email" placeholder="Digite o email" 
											type="email" maxlength="255" value=<?php echo $informacoes['NM_EMAIL'] ?> required/>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">CNH (não-obrigatório:só para condutores)</label>
										<input class="form-control" id="CNH" name="CNH" placeholder="Digite a CNH" 
											type="text" value="<?php echo $informacoes['CNH_SERVIDOR'] ?>" maxlength="255" />
									</div> 
								</div>
							</div>
							<hr>
							<div class="container">
								<div class="checkbox">
									<label class="control-label" for="exampleInputEmail1">O que o servidor poderá fazer? </label>
										<a href="javascript:cadastrar_marcar()">Tudo</a> 
										ou 
										<a href="javascript:cadastrar_desmarcar()">Nenhum</a><br>
										<br>
										<div class="col-md-12">
											<?php while($val = mysqli_fetch_object($permissoes_visualizar)){ 
											$p = retorna_permissao_servidor($informacoes['ID'], $val->COLUMN_NAME, $conexao_com_banco); ?>
													<div class='col-md-6'>							
														<input type="checkbox" class="cadastra" name="<?php echo $val->COLUMN_NAME ?>"
														<?php if($p==1){ ?> checked <?php } ?>>
														<?php echo $val->COLUMN_NAME ?></input>
													</div>
											<?php } ?>
										</div>	
								</div>						
							</div>
							<hr>
							<div class="container">
								<div class="checkbox">
									<div class="col-md-12">
										<?php while($val = mysqli_fetch_object($permissoes_gerenciar)){ 
											$p = retorna_permissao_servidor($informacoes['ID'], $val->COLUMN_NAME, $conexao_com_banco); ?>
													<div class='col-md-6'>							
														<input type="checkbox" class="cadastra" name="<?php echo $val->COLUMN_NAME ?>"
														<?php if($p){ ?> checked <?php } ?>>
														<?php echo $val->COLUMN_NAME ?></input>
													</div>
											<?php } ?>
									</div>	
								</div>						
							</div>
							<hr>
							<div class="container">
								<div class="checkbox">
									<div class="col-md-12">
										<?php while($val = mysqli_fetch_object($permissoes_diversas)){ 
											$p = retorna_permissao_servidor($informacoes['ID'], $val->COLUMN_NAME, $conexao_com_banco); ?>
													<div class='col-md-6'>							
														<input type="checkbox" class="cadastra" name="<?php echo $val->COLUMN_NAME ?>"
														<?php if($p){ ?> checked <?php } ?>>
														<?php echo $val->COLUMN_NAME ?></input>
													</div>
											<?php } ?>
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
<!-- /#Conteúdo da Página/-->

</div>

<?php include('../foot.php')?>