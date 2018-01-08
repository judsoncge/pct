<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "VISUALIZAR_CORREICAO";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_correicao";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p><?php echo $informacoes["NM_PENALIDADE"] ?> em <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?></p>		
	</div>
	
	<div class="container caixa-conteudo">
	<div id="uatualizacao">
		<span style="color: red;">Última atualização por <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_ATUALIZOU"], $conexao_com_banco) ?> em <?php echo date_format(new DateTime($informacoes["DT_ULTIMA_ATUALIZACAO"]), 'd/m/Y') ?></span>
	</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="container">
					<div class="row" style="margin-top: 10px;">
						<div class="col-md-12">
							<h2>INFORMAÇÕES DA CORREIÇÃO</h2>
							<hr>
													
							<b>Órgão</b>: <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?><br>
							
							<b>Tipo de Procedimento</b>: <?php echo $informacoes["NM_TIPO_PROCEDIMENTO"]?><br>
							
							<b>Situação</b>: <?php echo $informacoes["NM_SITUACAO"] ?><br>
							
							<b>Penalidade</b>: <?php echo $informacoes["NM_PENALIDADE"] ?><br>
							
							<b>Motivo</b>: <?php echo $informacoes["NM_MOTIVO"] ?><br>
							
							<b>Cargo Ocupado</b>: <?php echo $informacoes["NM_CARGO_OCUPADO"] ?><br>

							<hr>
							<h2>IDENTIFICAÇÃO</h2>
							<hr>
							
							<b>Número da Portaria</b>: <?php echo $informacoes["NM_NUMERO_PORTARIA"] ?><br>
				           
							<b>Número do Processo</b>: <?php echo $informacoes["NM_NUMERO_PROCESSO"] ?><br>
							
							<b>Número do Decreto</b>: <?php echo $informacoes["NM_NUMERO_DECRETO"] ?><br>
							
							<hr>
							<h2>INFORMAÇÕES DE DATAS</h2>
							<hr>
							
							<b>Data da Publicação da Portaria</b>: <?php echo date_format(new DateTime($informacoes["DT_PUBLICACAO_PORTARIA"]), "d/m/Y") ?><br>
				           
							<b>Data de Instauração</b>: <?php echo date_format(new DateTime($informacoes["DT_INSTAURACAO"]), "d/m/Y") ?><br>
							
							<b>Data da Publicação do Decreto</b>: <?php echo date_format(new DateTime($informacoes["DT_PUBLICACAO_DECRETO"]), "d/m/Y") ?><br>
						
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>