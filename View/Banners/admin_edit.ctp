<div id="page-heading"><h1><?php echo isset($this->request->data['Banner']['id']) ? 'Atualizar ' : 'Adicionar ';?>Banner</h1></div>

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
                                <div class="step-dark-left">Dados do Banner</div>
                                <div class="step-dark-round">&nbsp;</div>
                                <div class="clear"></div>
                            </div>

                            <?php echo $this->Form->create('Post', array('onsubmit' => 'return send()', 'type' => 'file')); ?>

                                <?php echo $this->Form->input('Banner.id'); ?>

                                <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
                                    <tr>
                                        <th valign="top">Imagem:</th>
                                        <td>
                                            <input id="imagem" name="imagem" type="file" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $this->Form->input('Banner.image', array('type' => 'hidden')); ?>
                                            <div id="image-reload">
                                                <?php
                                                if(!empty($this->request->data['Banner']['image'])){
                                                    echo "<img src='uploads/banners/".$this->request->data['Banner']['image']."' width=\"800\" height=\"235\" />";
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th valign="top">Link:</th>
                                        <td>
                                            <?php echo $this->Form->input('Banner.link', array('class' => 'inp-form', 'label' => false, 'div' => false)); ?>
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
                                    <tr>
                                        <th>&nbsp;</th>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <td>&nbsp;</td>
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