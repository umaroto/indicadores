<?php
$res = array();
foreach($this->request->data['Value'] as $val){
    $res[$val['zone_id']][$val['filter_id']][$val['year_id']] = $val['value'];
}
?>
<div id="page-heading"><h1>Post - <?php echo $this->request->data['Post']['title'];?></h1></div>

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

                <?php
                echo $this->Form->create('Value', array('onsubmit' => 'return send()'));

                echo $this->Form->input('Post.id', array('type' => 'hidden'));

                $w = 0;
                $c = 0;

                foreach($this->request->data['Zone'] as $cobertura){
                    $w++;
                    ?>
                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                        <tr valign="top">
                            <td>
                                <div id="step-holder">
                                    <div class="step-no"><?php echo $w;?></div>
                                    <div class="step-dark-left"><?php echo $cobertura['title'];?></div>
                                    <div class="step-dark-round">&nbsp;</div>
                                    <div class="clear"></div>
                                </div>

                                <table border="0" width="100%" cellpadding="0" cellspacing="0" class="table_data product-table" id="td<?= $w; ?>">
                                    <tr class="row">
                                        <th class="table-header-repeat line-left minwidth-1 axis_x"><a>Filtros</a></th>
                                        <?php
                                        $i = 0;
                                        foreach ($this->request->data['Year'] as $ano) {
                                            echo '<th class="table-header-repeat line-left minwidth-1 data string"><a>'.$ano['title'].'</a></th>';
                                            $i++;
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                    foreach($this->request->data['Filter'] as $filtro){
                                        echo '<tr class="row">';
                                            echo '<td class="axis_x">'.$filtro['title'].'</td>';
                                            for($x=0; $x<$i; $x++){
                                                echo '<td>';
                                                    $val = isset($res[$cobertura['id']][$filtro['id']][$this->request->data['Year'][$x]['id']]) ? $res[$cobertura['id']][$filtro['id']][$this->request->data['Year'][$x]['id']] : '';
                                                    echo '<input name="data[Value]['.$c.'][value]" maxlength="255" type="text" value="'.$val.'" id="Value0Value" style="width: 50px; padding: 5px;">';
                                                    //echo $this->Form->input('Value.'.$c.'.value', array('class' => 'inp-form data', 'label' => false, 'div' => false));
                                                    echo $this->Form->input('Value.'.$c.'.year_id', array('value' => $this->request->data['Year'][$x]['id'], 'type' => 'hidden'));
                                                    echo $this->Form->input('Value.'.$c.'.filter_id', array('value' => $filtro['id'], 'type' => 'hidden'));
                                                    echo $this->Form->input('Value.'.$c.'.zone_id', array('value' => $cobertura['id'], 'type' => 'hidden'));
                                                    echo $this->Form->input('Value.'.$c.'.post_id', array('value' => $this->request->data['Post']['id'], 'type' => 'hidden'));
                                                echo '</td>';
                                                $c++;
                                            }
                                        echo '</tr>';
                                    }
                                    ?>
                                </table>
                                <div class="chart_div" id="cd<?= $w; ?>"><?php echo $cobertura['title'];?></div>

                            </td>
                        </tr>
                        <tr>
                            <td><img src="img/shared/blank.gif" width="695" height="1" alt="blank" /></td>
                            <td></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <div style="float: left">
                    <input type="submit" value="" class="form-submit" />
                </div>

                <?php
                echo $this->Form->end();
                ?>
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

<?php $this->Html->script(array("google.chart", "google.chart.init"), array("inline" => false)); ?>