
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		 2022 &copy; Multidados TI.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cockie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/index.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>

jQuery(document).ready(function() {    
   App.init(); // initlayout and core plugins
   Index.init();
});

$(document).ready(function() {
    function carregarDados(tipo) {
        $('#areaDados').html('<div class="text-center"><i class="fa fa-spinner fa-spin fa-2x"></i> Carregando...</div>');
        
        $.ajax({
            url: 'index.php?tipo=' + tipo,
            type: 'GET',
            dataType: 'json',
            success: function(dados) {
                let html = '';
                
                // Monta a tabela conforme o tipo
                if(tipo === 'clientes') {
                    html = `
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>`;
                    
                    dados.forEach((cliente, index) => {
                        html += `
                        <tr>
                            <td>${cliente.nome}</td>
                            <td>${cliente.cpf}</td>
                            <td>${cliente.endereco}</td>
                            <td>${cliente.telefone}</td>
                            <td>${cliente.email}</td>
                        </tr>`;
                    });
                } 
                else if(tipo === 'fornecedores') {
                    html = `
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Cidade</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>`;
                    
                    dados.forEach((fornecedor, index) => {
                        html += `
                        <tr>
                            <td>${fornecedor.nome}</td>
                            <td>${fornecedor.cpf}</td>
                            <td>${fornecedor.cidade}</td>
                            <td>${fornecedor.email}</td>
                        </tr>`;
                    });
                }
                else if(tipo === 'usuarios') {
                    html = `
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th>Usuário</th>
                                </tr>
                            </thead>
                            <tbody>`;
                    
                    dados.forEach((usuario, index) => {
						html += `
						<tr>
							<td>${usuario.nome || ''}</td>
							<td>${usuario.cpf || ''}</td>
							<td>${usuario.endereco || ''}</td>
							<td>${usuario.telefone || ''}</td>
							<td>${usuario.usuario || ''}</td>
						</tr>`;
					});
                }
                
                html += `</tbody></table></div>`;
                $('#areaDados').html(html);
            },
            error: function(xhr, status, error) {
                console.error("Erro ao carregar " + tipo + ":", error);
                $('#areaDados').html(`<div class="alert alert-danger">Erro ao carregar ${tipo}</div>`);
            }
        });
    }

    // Eventos para cada botão
    $('#exibirClientes').click(function(e) {
        e.preventDefault();
        carregarDados('clientes');
    });

    $('#exibirFornecedores').click(function(e) {
        e.preventDefault();
        carregarDados('fornecedores');
    });

    $('#exibirUsuarios').click(function(e) {
        e.preventDefault();
        carregarDados('usuarios');
    });
});
</script>
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>












