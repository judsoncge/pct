<?php 
include("../head.php");include("../body.php");
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de Servidor</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php?operacao=servidor2" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Nome</label>
										<input class="form-control" id="nome" name="nome" placeholder="Digite o nome (somente letras)" 
										type="text" maxlength="255" minlength="4" pattern="[a*A*-z*Z*]*+" required/>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">CPF</label>
										<input class="form-control" id="CPF" name="CPF" placeholder="Digite o CPF" type="text" required/>				  
									</div>				
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Matrícula</label>
										<input class="form-control" id="matricula" name="matricula" placeholder="Digite a matricula" 
											type="text" maxlength="255" required/>
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Cargo</label>
										<input class="form-control" id="cargo" name="cargo" placeholder="Digite o cargo (somente letras)" 
											type="text" maxlength="255" minlength="4" pattern="[a*A*-z*Z*]*+" required />
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Grupo/Nível</label>
										<select class="form-control" id="grupo" name="grupo" required />
											<option value="">Selecione o grupo</option>
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
											<option value="">Selecione a condição</option>
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
											type="email" maxlength="255" required />
									</div> 
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">CNH (não-obrigatório: só para condutores)</label>
										<input class="form-control" id="CNH" name="CNH" placeholder="Digite a CNH" 
											type="text" maxlength="255" />
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