<div id="page-heading"><h1><?php echo isset($this->request->data['Record']['id']) ? 'Atualizar ' : 'Adicionar ';?>Ficha Técnica</h1></div>

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
								<div class="step-dark-left">Dados da Ficha</div>
								<div class="step-dark-round">&nbsp;</div>
								<div class="clear"></div>
							</div>

							<?php echo $this->Form->create('Post', array('onsubmit' => 'return send()')); ?>

								<?php echo $this->Form->input('Record.id');?>

								<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
									<tr>
										<th valign="top">Título:</th>
										<td>
											<?php echo $this->Form->input('Record.title', array('class' => 'inp-form required', 'label' => false, 'div' => false));?>
										</td>
									</tr>
									<tr>
										<th valign="top">Texto:</th>
										<td>
											<?php echo $this->Form->textarea('Record.text', array('class' => 'form-textarea', 'label' => false, 'div' => false));?>
										</td>
									</tr>
									<tr>
										<th valign="top">Post:</th>
										<td>
											<select name="data[Record][post_id]" style="padding: 5px;">
												<option value="0">N/A</option>
												<?php
												foreach ($posts as $key => $post):
													$s = $this->request->data['Record']['post_id'] == $post['Post']['id'] ? ' selected="selected"' : '';
													echo '<option value="'.$post['Post']['id'].'"'.$s.'>'.$post['Post']['title'].'</option>';
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

<?php $this->Html->script(array("tinymce/tinymce.min"), array("inline" => false)); ?>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>