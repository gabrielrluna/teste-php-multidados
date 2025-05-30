<?php
$menu = array(
        array(
            'opcao' => 'Dashboard',
            'url' => 'index.php',
            'icone' => 'fa fa-home'
            ),
        array(
            'opcao' => 'Cadastro',
            'url' => 'javascript:;',
            'icone' => 'fa fa-file-text',
            'subitens' => array(
                array(
                    'opcao' => 'Cliente',
                    'url' => '#',
                ),
                array(
                    'opcao' => 'Fornecedor',
                    'url' => '#',
                ),
                array(
                    'opcao' => 'Usuário',
                    'url' => '#',
                ),
                array(
                    'opcao' => 'Produtos',
                    'url' => '#',
                ),
                array(
                    'opcao' => 'Perfil de Acesso',
                    'url' => '#',
                ),                
            )
            ),
        array(
            'opcao'     => 'Relatório',
            'url'       => 'javascript:;',
            'icone'     => 'fa fa-bar-chart-o',
            'subitens'  => array(
                array(
                    'opcao' => 'Cliente',
                    'url' => '#',
                ),
                array(
                    'opcao' => 'Produtos',
                    'url' => '#',
                ),
                array(
                    'opcao' => 'Faturamento',
                    'url' => '#',
                ),
            )
            ),
);

?>
    
    <!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search" action="extra_search.html" method="POST">
						<div class="form-container">
							<div class="input-box">
								<a href="javascript:;" class="remove"></a>
								<input type="text" placeholder="Search..."/>
								<input type="button" class="submit" value=" "/>
							</div>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>

                <?php
                foreach($menu as $item){
                    ?>
                    <li class="<?php echo $item['opcao'] == "Dashboard" ? "start active" : "" ?>">
                        <a href="<?php echo $item['url']; ?>">
                        <i class="<?php echo $item['icone']; ?>"></i>
                        <span class="title">
                            <?php echo $item['opcao']; ?>
                        </span>
                        <span class="<?php echo $item['opcao'] == "Dashboard" ? "selected" : "arrow" ?>">
                        </span>
                        </a>
                            <?php
                            if(isset($item['subitens'])){
                              ?>
                              <!-- <h1>Teste</h1> -->
                                <ul class="sub-menu">
                                    <?php
                                    #Ordering menu items
                                    sort($item['subitens']);
                                    foreach($item['subitens'] as $subitem){
                                        ?>
                                        <li>
                                            <a href="<?php echo $subitem['url']?>"><?php echo $subitem['opcao']?></a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                              <?php                                
                            }
                            ?>
                    </li>
                    <?php
                }
                ?>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->