<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "VISUALIZAR_TELEFONIA";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_telefonia";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Telefone da <?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  
		com <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_RESPONSAVEL"], $conexao_com_banco) ?></p>		
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
							<h2>INFORMAÇÕES DO RESPONSÁVEL</h2>
							<hr>
							<b>Responsável</b>:         <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_RESPONSAVEL"], $conexao_com_banco) ?><br>
							<b>Órgão</b>:        		<?php echo retorna_sigla_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?>  <br>
							<b>Cargo</b>:                <?php echo retorna_cargo_servidor($informacoes["ID_SERVIDOR_RESPONSAVEL"], $conexao_com_banco) ?><br>
							<hr>
							<h2>INFORMAÇÕES DE TELEFONE</h2>
							<hr>
				            <b>Número</b>:             <?php echo $informacoes["NM_NUMERO"] ?><br>
							<b>Tipo</b>:               <?php echo $informacoes["NM_TIPO"] ?><br>
							<b>Cota mensal</b>:        <?php echo "R$ " . number_format($informacoes["VL_COTA_MENSAL"] , 2, ",", ".")?><br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>