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
								<div class="step-dark-left">Dados da Categoria</div>
								<div class="step-dark-round">&nbsp;</div>
								<div class="clear"></div>
							</div>

							<?php echo $this->Form->create('Category', array('onsubmit' => 'return send()')); ?>

								<?php echo $this->Form->input('id');?>

								<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
									<tr>
										<th valign="top">Título:</th>
										<td>
											<?php echo $this->Form->input('title', array('class' => 'inp-form required', 'label' => false, 'div' => false));?>
											<?php echo $this->Form->input('slug', array('type' => 'hidden'));?>
										</td>
									</tr>
									<tr>
										<th valign="top">Categoria Pai:</th>
										<td>	
											<select name="data[Category][parent_id]" style="padding: 5px;">
												<option value="">N/A</option>
												<?php
												foreach ($categories as $key => $category):
													$s = $this->request->data['Category']['parent_id'] == $key ? ' selected="selected"' : '';
													echo '<option value="'.$key.'"'.$s.'>'.$category.'</option>';
												endforeach;
												?>
											</select>
										</td>
									</tr>
									<tr>
										<th>&nbsp;</th>
										<td valign="top">
											<input type="submit" value="" class="form-submit" />
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

<script>
$(document).ready(function(){
	var slug = '';

	$('#CategoryTitle').bind('keyup', function(){
		slug = $(this).val();
		slug = convert_to_slug(slug);
		$('#CategorySlug').val(slug);
	});

	$('#CategoryTitle').trigger('keyup');
});
</script>