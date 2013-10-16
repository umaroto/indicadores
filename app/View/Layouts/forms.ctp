<!-- <div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Edit Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('children');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Category.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Category.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Posts'), array('controller' => 'posts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('controller' => 'posts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Records'), array('controller' => 'records', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Record'), array('controller' => 'records', 'action' => 'add')); ?> </li>
	</ul>
</div>
 -->

<div id="page-heading"><h1><?php echo isset($this->request->data['Category']['id']) ? 'Atualizar ' : 'Adicionar ';?>Categoria</h1></div>

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
			<!--  start content-table-inner -->
			<div id="content-table-inner">
		
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr valign="top">
						<td>
							<div id="step-holder">
								<div class="step-no">1</div>
								<div class="step-dark-left"><a href="">Add product details</a></div>
								<div class="step-dark-right">&nbsp;</div>
								<div class="step-no-off">2</div>
								<div class="step-light-left">Select related products</div>
								<div class="step-light-right">&nbsp;</div>
								<div class="step-no-off">3</div>
								<div class="step-light-left">Preview</div>
								<div class="step-light-round">&nbsp;</div>
								<div class="clear"></div>
							</div>

							<?php echo $this->Form->create('Category'); ?>

								<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
									<tr>
										<th valign="top">Product name:</th>
										<td><input type="text" class="inp-form" /></td>
										<td></td>
									</tr>
									<tr>
										<th valign="top">Product name:</th>
										<td><input type="text" class="inp-form-error" />
											<?php
											echo $this->Form->input('id');
											?>
										</td>
										<td>
										<div class="error-left"></div>
										<div class="error-inner">This field is required.</div>
										</td>
									</tr>
									<tr>
										<th valign="top">Category:</th>
										<td>	
											<select  class="styledselect_form_1">
												<option value="">All</option>
												<option value="">Products</option>
												<option value="">Categories</option>
												<option value="">Clients</option>
												<option value="">News</option>
											</select>
										</td>
										<td></td>
									</tr>
									<tr>
										<th valign="top">Sub Category:</th>
										<td>	
											<select  class="styledselect_form_1">
												<option value="">All</option>
												<option value="">Products</option>
												<option value="">Categories</option>
												<option value="">Clients</option>
												<option value="">News</option>
											</select>
										</td>
										<td></td>
									</tr> 
									<tr>
										<th valign="top">Price:</th>
										<td><input type="text" class="inp-form" /></td>
										<td></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<th valign="top">Description:</th>
										<td><textarea rows="" cols="" class="form-textarea"></textarea></td>
										<td></td>
									</tr>
									<tr>
										<th>Image 1:</th>
										<td><input type="file" class="file_1" /></td>
										<td>
											<div class="bubble-left"></div>
											<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
											<div class="bubble-right"></div>
										</td>
									</tr>
									<tr>
										<th>Image 2:</th>
										<td>  <input type="file" class="file_1" /></td>
										<td>
											<div class="bubble-left"></div>
											<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
											<div class="bubble-right"></div>
										</td>
									</tr>
									<tr>
										<th>Image 3:</th>
										<td><input type="file" class="file_1" /></td>
										<td>
											<div class="bubble-left"></div>
											<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
											<div class="bubble-right"></div>
										</td>
									</tr>
									<tr>
										<th>&nbsp;</th>
										<td valign="top">
											<input type="button" value="" class="form-submit" />
											<input type="reset" value="" class="form-reset"  />
										</td>
										<td></td>
									</tr>
								</table>

							<?php echo $this->Form->end(); ?>
						</td>
						<?php
						echo $this->element('relateds/categories')
						?>
					</tr>
					<tr>
						<td><img src="img/shared/blank.gif" width="695" height="1" alt="blank" /></td>
						<td></td>
					</tr>
				</table>
 
				<div class="clear"></div>

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