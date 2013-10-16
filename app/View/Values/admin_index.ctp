<div id="page-heading">
	<h1><?php echo __('Gráficos'); ?></h1>
	<h5>Selecione um post para incluir os valores</h5>
</div>

<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="img/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="img/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
			<div id="content-table-inner">

				<?php
				echo $this->element('pagination/default');
				?>
				<br clear="all" />

				<div id="table-content">
					<?php
					echo $this->Session->flash('flash');
					?>

					<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
						<tr>
							<th class="table-header-check"><a id="toggle-all" ></a></th>
							<th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('id'); ?></th>
							<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('title', 'Título'); ?></th>
							<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('children', 'Categoria'); ?></th>
							<th class="table-header-options line-left"><a><?php echo __('Opções'); ?></a></th>
						</tr>
						<?php foreach ($posts as $post): ?>
						<tr>
							<td><input  type="checkbox"/></td>
							<td><?php echo h($post['Post']['id']); ?></td>
							<td><?php echo h($post['Post']['title']); ?></td>
							<td><?php echo h($post['Category']['title']); ?></td>
							<td class="options-width">
								<?php
								echo $this->Html->link('', array('controller' => 'values', 'action' => 'edit', $post['Post']['id']), array('class' => 'icon-5 info-tooltip'));
								?>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>

				<?php
				echo $this->element('pagination/default');
				?>
			</div>
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
</table>

<div class="clear">&nbsp;</div>