<div id="page-heading"><h1>Editar Página</h1></div>

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
				<?php echo $this->Session->flash('flash'); ?>
				<table border="0" width="100%" cellpadding="0" cellspacing="0">
					<tr valign="top">
						<td>
							<div id="step-holder">
								<div class="step-no">1</div>
								<div class="step-dark-left">Dados do Página</div>
								<div class="step-dark-round">&nbsp;</div>
								<div class="clear"></div>
							</div>

							<?php echo $this->Form->create('Page', array('onsubmit' => 'return send()')); ?>

								<?php echo $this->Form->input('Page.id');?>

								<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
									<tr>
										<th valign="top">Título:</th>
										<td>
											<?php echo $this->Form->input('Page.title', array('class' => 'inp-form required', 'label' => false, 'div' => false)); ?>
										</td>
									</tr>
									<tr>
										<th valign="top">Texto:</th>
										<td>
											<?php echo $this->Form->textarea('Page.text', array('class' => 'form-textarea', 'label' => false, 'div' => false));?>
										</td>
									</tr>
									<tr>
										<th>&nbsp;</th>
										<td valign="top">
											<input type="submit" value="" class="form-submit" />
										</td>
										<td></td>
									</tr>
								</table>

							<?php echo $this->Form->end(); ?>
						</td>
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

<?php $this->Html->script(array("tinymce/tinymce.min", "jquery.iframe-post-form"), array("inline" => false)); ?>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    width: 800,
    height: 400,
    resize: "both",
    plugins: [
        "code", "imageupload"
    ],
    relative_urls : false,
	remove_script_host : false,
	convert_urls : true,
    imageupload_url: "<?php echo Router::url('/');?>page/upload",
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image imageupload",
    style_formats : [
        {title: 'Image Left', selector: 'img', styles: {
            'float' : 'left',
            'margin': '0 20px 10px 0'
        }},
        {title: 'Image Right', selector: 'img', styles: {
            'float' : 'right',
            'margin': '0 0 10px 20px'
        }},
        {title: 'H1', block: 'h1', styles: {
            color: '#000000'}
        },
        {title: 'H2', block: 'h2', styles: {color: '#000000'}},
        {title: 'H3', block: 'h3', styles: {color: '#000000'}},
        {title: 'H4', block: 'h4', styles: {color: '#000000'}},
    ]
 });
</script>