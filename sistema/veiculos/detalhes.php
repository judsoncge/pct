<?php 
include('../head.php');
include('../body.php');
$permissao_verificar = "VISUALIZAR_VEICULOS";
include('../includes/verificacao-permissao.php');
$id = $_GET['id']; 
$tabela = "tb_veiculos";
include('../includes/verificacao-id.php');
$informacoes = retorna_informacoes($tabela, $id, $conexao_com_banco);
?>

<!-- Conteúdo da Página -->
<div id="page-content-wrapper">
	<div class="container titulo-pagina">				
		<p>Informações do Veículo <?php echo retorna_nome_veiculo($informacoes["ID"], $conexao_com_banco) ?>  
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
							
							<h2>INFORMAÇÕES DO CONDUTOR</h2>
							<hr>
							<b>Condutor</b>:         <?php echo retorna_nome_servidor($informacoes["ID_SERVIDOR_CONDUTOR"], $conexao_com_banco) ?><br>
							<b>Cargo</b>:            <?php echo retorna_cargo_servidor($informacoes["ID_SERVIDOR_CONDUTOR"], $conexao_com_banco) ?><br>
							<b>CNH</b>:              <?php echo retorna_cnh_servidor($informacoes["ID_SERVIDOR_CONDUTOR"], $conexao_com_banco) ?><br>
							<hr>
							<h2>INFORMAÇÕES DO VEÍCULO</h2>
							<hr>
							<b>Modelo</b>:                  <?php echo $informacoes["NM_MODELO"] ?><br>
							<b>Placa</b>:                   <?php echo $informacoes["NM_PLACA"] ?><br>
							<b>Renavam</b>:                 <?php echo $informacoes["NM_RENAVAM"] ?><br>
							<b>Ano de Fabricação</b>:       <?php echo $informacoes["NM_ANO_FABRICACAO"] ?><br>
							<b>Licenciado</b>:              <?php echo ($informacoes["BL_LICENCIADO"]) ? "Sim" : "Não" ?><br>
							<b>Segurado</b>:                <?php echo ($informacoes["BL_SEGURO"]) ? "Sim" : "Não" ?><br>
							<b>Logomarca</b>:               <?php echo ($informacoes["BL_LOGOMARCA"]) ? "Sim" : "Não" ?><br>
							<b>Chipado</b>:                 <?php echo ($informacoes["BL_CHIPADO"]) ? "Sim" : "Não" ?><br>
							<b>Multa</b>:                   <?php echo ($informacoes["BL_MULTA"]) ? "Sim" : "Não" ?><br>
							<b>Avaria</b>:                  <?php echo $informacoes["NM_AVARIA"] ?><br>
							<b>Última Manutenção</b>:       <?php echo date_format(new DateTime($informacoes["DT_ULTIMA_MANUTENCAO"]), 'd/m/Y') ?><br>
							<b>Mapa de Controle</b>:        <?php echo $informacoes["NM_MAPA_CONTROLE"] ?><br>
			                
			                
							<hr>
							<h2>OUTRAS INFORMAÇÕES</h2>
							<hr>
							<b>Órgão Pertencente</b>:                <?php echo retorna_nome_orgao($informacoes["ID_ORGAO"], $conexao_com_banco) ?><br>
							<b>Órgão Cedido</b>:                     <?php echo retorna_nome_orgao($informacoes["ID_ORGAO_CEDIDO"], $conexao_com_banco) ?><br>
							<b>Termo de Cessão ou Autorização</b>:   <?php echo $informacoes["NR_TERMO_CESSAO"] ?><br>							
							<b>Recolhido a Garagem a Noite</b>:      <?php echo ($informacoes["BL_RECOLHIDO_NOITE"]) ? "Sim" : "Não" ?><br>
							<b>Locado ou Próprio</b>:                <?php echo $informacoes["NM_LOCADO_PROPRIO"] ?><br>
							<b>Nome da Locadora</b>:                 <?php echo retorna_nome_empresa($informacoes["ID_EMPRESA"], $conexao_com_banco) ?><br>
							<b>Padrão</b>:                           <?php echo $informacoes["NM_PADRAO"] ?><br>
							<b>Valor Aluguel Mensal</b>:             <?php echo "R$ " . number_format($informacoes["VL_ALUGUEL_MENSAL"] , 2, ",", ".")?><br>
							<b>Observações</b>:                <?php echo $informacoes["NM_OBSERVACOES"] ?><br>						
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../foot.php')?>