<?php 
include("../head.php");include("../body.php");
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">
		<p>Cadastro de empresa</p>
	</div>
	<div class="container caixa-conteudo">
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<form name="cadastro" method="POST" action="logica/cadastrar.php" enctype="multipart/form-data"> 
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">Nome da empresa</label>
										<input class="form-control" id="nome" name="nome" placeholder="Digite o nome (somente letras)" 
											type="text" maxlength="255" minlength="4" pattern="[a*A*-z*Z*]*+" required/>
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label" for="exampleInputEmail1">CNPJ</label>
										<input class="form-control" id="CNPJ" name="CNPJ" placeholder="Digite o CNPJ" type="text" required/>				  
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