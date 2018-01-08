<?php 
include("../head.php");include("../body.php");
$permissao_verificar = "VISUALIZAR_ADIANTAMENTOS";
include("../includes/verificacao-permissao.php");
$id = $_GET['id']; 
$tabela = "tb_adiantamentos";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Adiantamento de <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?>  
		em <?php echo date_format(new DateTime($informacoes["DT_RECEBIMENTO"]), 'd/m/Y') ?></p>		
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
							<h2>INFORMAÇÕES DO BENEFICIÁRIO</h2>
							<hr>
							<b>Beneficiário</b>:         <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?><br>
							<b>Matrícula</b>:            <?php echo retorna_matricula_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?><br>
							<b>Cargo</b>:                <?php echo retorna_cargo_servidor($informacoes["ID_SERVIDOR_BENEFICIARIO"], $conexao_com_banco) ?><br>
							<hr>
							<h2>INFORMAÇÕES DE VALORES</h2>
							<hr>
				            <b>Valor recebido</b>:               <?php echo "R$ " . number_format($informacoes["VL_RECEBIDO"] , 2, ",", ".")?><br>
							<b>Material consumo</b>:               <?php echo "R$ " . number_format($informacoes["VL_MATERIAL_CONSUMO"] , 2, ",", ".")?><br>
							<b>Serviços de terceiros PF</b>:               <?php echo "R$ " . number_format($informacoes["VL_SERVICOS_PF"] , 2, ",", ".")?><br>
							<b>Serviços de terceiros PJ</b>:               <?php echo "R$ " . number_format($informacoes["VL_SERVICOS_PJ"] , 2, ",", ".")?><br>
							<b>Valor devolvido</b>:               <?php echo "R$ " . number_format($informacoes["VL_DEVOLVIDO"] , 2, ",", ".")?><br>
							<hr>
							<h2>OUTRAS INFORMAÇÕES</h2>
							<hr>
							<b>Ordem bancária</b>:       <?php echo $informacoes["NM_ORDEM_BANCARIA"] ?><br>
							<b>Data do recebimento</b>:       <?php echo date_format(new DateTime($informacoes["DT_RECEBIMENTO"]), 'd/m/Y') ?><br>
							<b>Data de prestação de contas</b>:       <?php echo date_format(new DateTime($informacoes["DT_PRESTACAO_CONTAS"]), 'd/m/Y') ?><br>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>