<div id="page-heading">
    <h1 style="float: left;"><?php echo isset($this->request->data['User']['id']) ? 'Editar ' : 'Adicionar ';?>Usuário</h1>

    <div id="actions-box-top" class="actions-box" style="float: right; margin: 0 20px 10px 10px;">
        <?php echo $this->Html->link('Voltar', array('controller' => 'users', 'action' => 'index', 'admin' => true), array('class' => 'button_new')); ?>
        <div class="clear"></div>
    </div>
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

                <table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr valign="top">
                        <td>
                            <div id="step-holder">
                                <div class="step-no">1</div>
                                <div class="step-dark-left">Dados do Usuário</div>
                                <div class="step-dark-round">&nbsp;</div>
                                <div class="clear"></div>
                            </div>

                            <?php echo $this->Form->create('Users', array('onsubmit' => 'return send()')); ?>

                            <table border="0" cellpadding="0" cellspacing="0" id="id-form" class="users_admin_edit">
                                <tr>
                                    <th valign="top">Nome:</th>
                                    <td>
                                        <?php echo $this->Form->input('User.name', array('class' => 'inp-form required', 'label' => false, 'div' => false)); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th valign="top">E-mail:</th>
                                    <td>
                                        <?php echo $this->Form->input('User.email', array('class' => 'inp-form required', 'label' => false, 'div' => false)); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th valign="top">Tipo de usuário:</th>
                                    <td>
                                        <?php $role = $this->request->data['User']['role']; //debug($this->request->data); ?>
                                        <select name="data[User][role]" class="styledselect_form_1">
                                            <option value="1" <?php echo $role == 1 ? 'selected="true"' : ''; ?>>Usuário</option>
                                            <option value="2" <?php echo $role == 2 ? 'selected="true"' : ''; ?>>Administrador</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th valign="top">Username:</th>
                                    <td>
                                        <?php echo $this->Form->input('User.username', array('class' => 'inp-form required', 'label' => false, 'div' => false)); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th valign="top">Senha:</th>
                                    <td>
                                        <?php
                                            if (isset($this->request->data['User']['id'])) {
                                                echo $this->Form->input('User.password', array('class' => 'inp-form', 'label' => false, 'div' => false));
                                            } else {
                                                echo $this->Form->input('User.password', array('class' => 'inp-form required', 'label' => false, 'div' => false));
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th valign="top">Repita senha:</th>
                                    <td>
                                        <?php echo $this->Form->input('User.cpassword', array('type' => 'password', 'class' => 'inp-form', 'label' => false, 'div' => false)); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th valign="top">Status:</th>
                                    <td>
                                        <?php $status = $this->request->data['User']['active']; ?>
                                        <select name="data[User][active]" class="styledselect_form_1">
                                            <option value="S" <?php echo $status == 'S' ? 'selected="true"' : ''; ?>>Ativo</option>
                                            <option value="N" <?php echo $status == 'N' ? 'selected="true"' : ''; ?>>Inativo</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <td valign="top">
                                        <input type="submit" value="Enviar" class="button_new" />
                                        <input type="reset"  value="Reset" class="button_reset"  />
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