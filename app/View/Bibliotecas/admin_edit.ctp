<div id="page-heading"><h1><?php echo isset($this->request->data['Biblioteca']['id']) ? 'Atualizar ' : 'Adicionar ';?>Biblioteca</h1></div>

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
								<div class="step-dark-left">Dados da Biblioteca</div>
								<div class="step-dark-round">&nbsp;</div>
								<div class="clear"></div>
							</div>

							<?php echo $this->Form->create('Biblioteca', array('onsubmit' => 'return send()', 'type' => 'file')); ?>

								<?php echo $this->Form->input('Biblioteca.id'); ?>

								<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
									<tr>
										<th valign="top">Tipo:</th>
										<td>
											<select name="data[Biblioteca][type]" style="padding: 5px;" id="biblioteca_type">
												<option value="documentos_ref" <?= isset($this->request->data['Biblioteca']['type']) && $this->request->data['Biblioteca']['type'] == 'documentos_ref' ? 'selected="selected"' : ''; ?>>Documentos de Referência</option>
												<option value="publicacoes" <?= isset($this->request->data['Biblioteca']['type']) && $this->request->data['Biblioteca']['type'] == 'publicacoes' ? 'selected="selected"' : ''; ?>>Publicações</option>
											</select>
										</td>
									</tr>
									<tr>
										<th valign="top">Título:</th>
										<td>
											<?php echo $this->Form->input('title', array('class' => 'inp-form required', 'label' => false, 'div' => false));?>
										</td>
									</tr>
									<tr>
										<th valign="top">Imagem:</th>
										<td>
                                            <input id="image" name="image" type="file" />
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
                                        <td>
                                            <?php echo $this->Form->input('Biblioteca.image', array('type' => 'hidden')); ?>
                                            <div id="image-reload">
                                                <?php
                                                if(!empty($this->request->data['Biblioteca']['image']) && is_file('uploads/biblioteca/publicacoes/imagens/'.$this->request->data['Biblioteca']['image'])){
                                                    echo "<img src='uploads/biblioteca/publicacoes/imagens/".$this->request->data['Biblioteca']['image']."' width=\"209\" height=\"234\" />";
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
									<tr>
										<th valign="top">Arquivo:</th>
										<td>
                                            <input id="archive" name="archive" type="file" />
                                            <?php echo $this->Form->input('Biblioteca.archive', array('type' => 'hidden', 'class' => 'inp-form')); ?>
										</td>
									</tr>
									<tr class="archive-reload">
										<td>&nbsp;</td>
                                        <td>
                                            <?php
                                            	$link = '';
                                            	if(!empty($this->request->data['Biblioteca']['archive']) && is_file('uploads/biblioteca/publicacoes/arquivos/'.$this->request->data['Biblioteca']['archive'])) {
                                            		$link = 'uploads/biblioteca/publicacoes/arquivos/'.$this->request->data['Biblioteca']['archive'];
                                            	}
                                        	?>
                                            <div id="archive-reload" <?= !$link ? 'style="display:none"' : ''; ?>>
                                            	<a href="<?= $link; ?>" target="_blank">
                                            		<img src="img/icon-pdf.jpg" width="100" height="100" />
	                                                <?php
	                                                if ($link) {
	                                                    echo "<span>{$this->request->data['Biblioteca']['archive']}</span>";
	                                                } else {
	                                                	echo "<span></span>";
	                                                }
	                                                ?>
                                                </a>
                                            </div>
                                            <br />
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