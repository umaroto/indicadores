<div id="page-heading">
    <h1><?php echo 'Usuários'; ?></h1>
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
                    <?php echo $this->Html->link('Novo', array('controller' => 'users', 'action' => 'edit', 'admin' => true), array('class' => 'button_new')); ?>
                    <div class="clear"></div>
                </div>

                <div id="table-content">

                    <?php
                    echo $this->Session->flash('flash');
                    ?>

                    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

                        <tr>
                            <th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                            <th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
                            <th class="table-header-options line-left"><a><?php echo 'Opções'; ?></a></th>
                        </tr>

                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['User']['name']; ?></td>
                            <td><?php echo $user['User']['email']; ?></td>
                            <td class="options-width">
                            <?php
                                echo $this->Html->link('', array('controller' => 'users', 'action' => 'edit', $user['User']['id']), array('class' => 'icon-1 info-tooltip'));
                                echo $this->Form->postLink(
                                    '',
                                    array('controller'=> 'users', 'action' => 'delete', $user['User']['id']),
                                    array('confirm' => 'Tem certeza que você quer deletar esse usuário?', 'class' => 'icon-2 info-tooltip')
                                );
                            ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </table>
                </div>

                <div id="actions-box-bot" class="actions-box">
                    <?php echo $this->Html->link('Novo', array('controller' => 'users', 'action' => 'edit', 'admin' => true), array('class' => 'button_new')); ?>
                    <div class="clear"></div>
                </div>

                <?php echo $this->element('pagination/default'); ?>

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