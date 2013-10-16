<style>
.styledselect_form_1{
	float: left;
	margin-right: 10px;
}
#actions-box-top-2 {
	float: right;
}
</style>

<div id="page-heading">
	<h1><?php echo __('Cobertura'); ?></h1>
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

				<div id="actions-box-top" class="actions-box">
					<a href="" class="action-slider-top"></a>
					<div id="actions-box-slider-top">
						<?php
						echo $this->Html->link('Novo', array('controller' => 'zones', 'action' => 'edit', 'admin' => true), array('class' => 'action-new'));
						echo $this->Html->link('Apagar', array('controller' => 'zones', 'action' => '', 'admin' => true), array('class' => 'action-delete'));
						?>
					</div>
					<div class="clear"></div>
				</div>

				<div id="table-content">
					<?php
					echo $this->Session->flash('flash');
					?>

					<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
						<tr>
							<th class="table-header-check"><a id="toggle-all" ></a></th>
							<th class="table-header-repeat line-left"><?php echo $this->Paginator->sort('id'); ?></th>
							<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('title', 'Título'); ?></th>
							<th class="table-header-options line-left"><a><?php echo __('Opções'); ?></a></th>
						</tr>
						<?php foreach ($zones as $zone): ?>
						<tr>
							<td><input  type="checkbox"/></td>
							<td><?php echo h($zone['Zone']['id']); ?></td>
							<td><?php echo h($zone['Zone']['title']); ?></td>
							<td class="options-width">
								<?php
								echo $this->Html->link('', array('controller' => 'zones', 'action' => 'edit', $zone['Zone']['id']), array('class' => 'icon-1 info-tooltip'));
								echo $this->Form->postLink(
					                '',
					                array('controller'=> 'zones', 'action' => 'delete', $zone['Zone']['id']),
					                array('confirm' => 'Tem certeza que você quer excluir essa cobertura?', 'class' => 'icon-2 info-tooltip')
					            );
								?>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>

				<div id="actions-box-bot" class="actions-box">
					<a href="" class="action-slider-bot"></a>
					<div id="actions-box-slider-bot">
						<?php
						echo $this->Html->link('Novo', array('controller' => 'zones', 'action' => 'edit', 'admin' => true), array('class' => 'action-new'));
						echo $this->Html->link('Apagar', array('controller' => 'zones', 'action' => '', 'admin' => true), array('class' => 'action-delete'));
						?>
					</div>
					<div class="clear"></div>
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