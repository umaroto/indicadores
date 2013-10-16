	<div class="nav-outer-repeat">
		<div class="nav-outer">
			<div id="nav-right">

				<!-- <div class="nav-divider">&nbsp;</div>
				<div class="showhide-account"><img src="img/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div> -->
				<div class="nav-divider">&nbsp;</div>
				<?php
				echo $this->Html->link('<img src="img/shared/nav/nav_logout.gif" width="64" height="14" alt="" />', array(
						'controller' => 'users',
						'action' => 'logout'
					),
					array(
						'escape' => false,
						'id' => 'logout'
					)
				);
				?>
				<div class="clear">&nbsp;</div>

				<!-- <div class="more-content">
					<div class="account-drop-inner">
						<a href="" id="acc-settings">Settings</a>
						<div class="clear">&nbsp;</div>
						<div class="acc-line">&nbsp;</div>
						<a href="" id="acc-details">Personal details </a>
					</div>
				</div> -->

			</div>

			<div class="nav">
				<div class="table">

					<ul class="select show">
						<li>
							<?php echo $this->Html->link('<b>Categorias</b>', array('controller' => 'categories', 'action' => 'index'), array('escape' => false)); ?>
						</li>
					</ul>

					<div class="nav-divider">&nbsp;</div>

					<ul class="select">
						<li>
							<?php echo $this->Html->link('<b>Posts</b>', array('controller' => 'posts', 'action' => 'index'), array('escape' => false)); ?>
						</li>
					</ul>

					<div class="nav-divider">&nbsp;</div>

					<ul class="select">
						<li>
							<?php echo $this->Html->link('<b>Coberturas</b>', array('controller' => 'zones', 'action' => 'index'), array('escape' => false)); ?>
						</li>
					</ul>

					<div class="nav-divider">&nbsp;</div>

					<ul class="select">
						<li>
							<?php echo $this->Html->link('<b>Filtros</b>', array('controller' => 'filters', 'action' => 'index'), array('escape' => false)); ?>
						</li>
					</ul>

					<div class="nav-divider">&nbsp;</div>

					<ul class="select">
						<li>
							<?php echo $this->Html->link('<b>Anos</b>', array('controller' => 'years', 'action' => 'index'), array('escape' => false)); ?>
						</li>
					</ul>

					<div class="nav-divider">&nbsp;</div>

					<ul class="select">
						<li>
							<?php echo $this->Html->link('<b>Fichas de Métrica</b>', array('controller' => 'records', 'action' => 'index'), array('escape' => false)); ?>
						</li>
					</ul>

					<div class="nav-divider">&nbsp;</div>

					<ul class="select">
						<li>
							<?php echo $this->Html->link('<b>Gráficos</b>', array('controller' => 'values', 'action' => 'index'), array('escape' => false)); ?>
						</li>
					</ul>

					<div class="nav-divider">&nbsp;</div>

					<ul class="select">
						<li>
							<?php echo $this->Html->link('<b>Banners</b>', array('controller' => 'banners', 'action' => 'index'), array('escape' => false)); ?>
						</li>
					</ul>

					<div class="nav-divider">&nbsp;</div>

					<ul class="select">
						<li>
							<?php echo $this->Html->link('<b>Bibliotecas</b>', array('controller' => 'bibliotecas', 'action' => 'index'), array('escape' => false)); ?>
						</li>
					</ul>

					<div class="nav-divider">&nbsp;</div>

					<ul class="select show">
						<li>
							<?php echo $this->Html->link('<b>Mais</b>', array('controller' => 'bibliotecas', 'action' => 'index'), array('escape' => false, 'class' => 'showhide-more')); ?>
							<div class="more-content">
								<div class="account-drop-inner">
									<?php echo $this->Html->link('O Projeto', array('controller' => 'page', 'action' => 'project'), array('escape' => false)); ?>
									<div class="clear">&nbsp;</div>
									<div class="acc-line">&nbsp;</div>
									<?php echo $this->Html->link('Indicadores', array('controller' => 'page', 'action' => 'indicators'), array('escape' => false)); ?>
								</div>
							</div>
						</li>
					</ul>

					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>

		</div>
		<div class="clear"></div>
	</div>