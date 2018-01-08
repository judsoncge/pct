<body>  

<!-- menu superior da página -->
<div class="menu-superior">
	<div>
		<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
		<!-- <a href="<?php echo $ROOT ?>sistema/home.php"><img src="" id="logo-home"></a> -->
	</div>
	<div>
		<!-- carregamento da página -->
		<div class="loader" id="preloader"></div>
	</div>
	<div class="container-icone">
		<div>
			<!-- botão para fazer logoff -->
			<a href="<?php echo $ROOT ?>sistema/sessao/destruir-sessao.php" alt="Logoff"><i class="fa fa-sign-out fa-lg" aria-hidden="true" id="sair-icone"></i></a>
		</div>	
	</div>	
</div> 

<script type="text/javascript">
	/*fazer menu aparecer e desaparecer*/
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>
	
<!-- menu lateral -->
<div id="wrapper">
	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="sidebar-brand">
				<div id="usuario">
					<div id="box-imagem">
						<img src="<?php echo $ROOT ?>/registros/fotos/<?php echo $_SESSION['foto']?>" id="imagem">
					</div>
					<div id="mensagem">
						<center><a href="<?php echo $ROOT ?>sistema/servidores/editar-senha.php" id="alterar-senha"><i class="fa fa-edit" aria-hidden="true"></i>  Alterar senha</a>
						<a href="<?php echo $ROOT ?>sistema/servidores/editar-foto.php" id="alterar-foto"><i class="fa fa-edit" aria-hidden="true"></i>  Alterar foto</a></center>
					</div>
				</div>
			</li>
			<hr>
			<li>
				<a href="<?php echo $ROOT ?>sistema/home.php"><i class="fa fa-home icone-menu" aria-hidden="true"></i>Início</a>
			</li>
			
			
			<li id="financas">
				<a href="#"><i class="fa fa-money icone-menu" aria-hidden="true"></i>Finanças</a>
			</li>
			
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_CONTRATOS", $conexao_com_banco); if($p){ ?>	
					<li class="financas-subitem">
						<a href="<?php echo $ROOT ?>sistema/contratos/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Contratos</a>
					</li>
				<?php } ?>
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_CONVENIOS", $conexao_com_banco); if($p){ ?>	
					<li class="financas-subitem">
						<a href="<?php echo $ROOT ?>sistema/convenios/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Convênios</a>
					</li>
				<?php } ?>
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_DIARIAS", $conexao_com_banco); if($p){ ?>
					<li class="financas-subitem">
						<a href="<?php echo $ROOT ?>sistema/diarias/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Diárias</a>
					</li>
				<?php } ?>

				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_ADIANTAMENTOS", $conexao_com_banco); if($p){ ?>
					<li class="financas-subitem">
						<a href="<?php echo $ROOT ?>sistema/adiantamentos/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Adiantamentos</a>
					</li>
				<?php } ?>
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_RECEITAS_DESPESAS", $conexao_com_banco); if($p){ ?>
					<li class="financas-subitem">
						<?php $o = retorna_permissao_servidor($_SESSION['id'], "VISAO_TODOS_ORGAOS", $conexao_com_banco); 
						if($o){ 
							$link = $ROOT."sistema/receitas-despesas/listar.php";
						}else{
							$link = $ROOT."sistema/receitas-despesas/listar-por-orgao.php?orgao=".$_SESSION["orgao"];
						}
						?>
						<a href="<?php echo $link ?>"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Receitas/Despesas</a>
					</li>
				<?php } ?>
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_PASSAGENS_AEREAS", $conexao_com_banco); if($p){ ?>
					<li class="financas-subitem">
						<a href="<?php echo $ROOT ?>sistema/passagens-aereas/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Passagens Aéreas</a>
					</li>
				<?php } ?>	
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_VEICULOS", $conexao_com_banco); if($p){ ?>
					<li class="financas-subitem">
						<a href="<?php echo $ROOT ?>sistema/veiculos/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Veículos</a>
					</li>
				<?php } ?>	
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_COMBUSTIVEL", $conexao_com_banco); if($p){ ?>
					<li class="financas-subitem">
						<a href="<?php echo $ROOT ?>sistema/combustivel/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Combustível</a>
					</li>
				<?php } ?>	
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_TELEFONIA", $conexao_com_banco); if($p){ ?>
					<li class="financas-subitem">
						<a href="<?php echo $ROOT ?>sistema/telefonia/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Telefonia</a>
					</li>
				<?php } ?>	
			
			<li id="transparencia">
				<a href="#"><i class="fa fa-search-plus icone-menu" aria-hidden="true"></i>Transparência</a>
			</li>
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_LAI", $conexao_com_banco); if($p){ ?>
					<li class="transparencia-subitem">
						<a href="<?php echo $ROOT ?>sistema/lai/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>LAI</a>
					</li>
				<?php } ?>	
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_LAI_PEDIDOS", $conexao_com_banco); if($p){ ?>
					<li class="transparencia-subitem">
						<a href="<?php echo $ROOT ?>sistema/lai-pedidos/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>LAI - Pedidos</a>
					</li>
				<?php } ?>	
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_CORREICAO", $conexao_com_banco); if($p){ ?>
					<li class="transparencia-subitem">
						<a href="<?php echo $ROOT ?>sistema/correicao/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Correição</a>
					</li>
				<?php } ?>	
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_OUVIDORIA", $conexao_com_banco); if($p){ ?>
					<li class="transparencia-subitem">
						<a href="<?php echo $ROOT ?>sistema/ouvidoria/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Ouvidoria</a>
					</li>
				<?php } ?>	
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_OBRAS", $conexao_com_banco); if($p){ ?>
					<li class="transparencia-subitem">
						<a href="<?php echo $ROOT ?>sistema/obras/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>Obras</a>
					</li>
				<?php } ?>	
			
			<li id="patrimonio">
				<a href="#"><i class="fa fa-television icone-menu" aria-hidden="true"></i>Patrimônio</a>
			</li>
			
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_RMB", $conexao_com_banco); if($p){ ?>
					<li class="patrimonio-subitem">
						<a href="<?php echo $ROOT ?>sistema/rmb/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>RMB</a>
					</li>
				<?php } ?>	
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_RMA", $conexao_com_banco); if($p){ ?>
					<li class="patrimonio-subitem">
						<a href="<?php echo $ROOT ?>sistema/rma/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>RMA</a>
					</li>
				<?php } ?>	
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_TI", $conexao_com_banco); if($p){ ?>
					<li class="patrimonio-subitem">
						<a href="<?php echo $ROOT ?>sistema/ti/listar.php"><i class="fa fa-circle icone-menu" aria-hidden="true"></i>TI</a>
					</li>
				<?php } ?>	

			<li id="servidor">
				<a href="#"><i class="fa fa-user icone-menu" aria-hidden="true"></i>Servidores</a>
			</li>
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "VISUALIZAR_SERVIDORES", $conexao_com_banco); if($p){ ?>
					<li class="servidor-subitem">
						<a href="<?php echo $ROOT ?>sistema/servidores/listar.php"><i class="fa fa-users icone-menu" aria-hidden="true"></i>Servidores</a>
					</li>
				<?php } ?>		
				
				<?php $p = retorna_permissao_servidor($_SESSION['id'], "GERENCIAR_SERVIDORES", $conexao_com_banco); if($p){ ?>
					<li class="servidor-subitem">
						<a href="<?php echo $ROOT ?>sistema/servidores/cadastrar.php"><i class="fa fa-user-plus icone-menu" aria-hidden="true"></i>Novo servidor</a>
					</li>
				<?php } ?>		
			<li>
				<a href="<?php echo $ROOT ?>sistema/sobre.php"><i class="fa fa-info-circle icone-menu" aria-hidden="true"></i>Sobre</a>
			</li>
		</ul>
	</div>
