<?php
$res = array();
foreach($post['Value'] as $val){
    $res[$val['zone_id']][$val['filter_id']][$val['year_id']] = $val['value'];
}

function array_sum_values() {
    $return = array();
    $intArgs = func_num_args();
    $arrArgs = func_get_args();
    if($intArgs < 1) exit();
    
    foreach($arrArgs as $arrItem) {
        if(!is_array($arrItem)) exit();
        foreach($arrItem as $k => $v) {
        	foreach($v as $y => $z) {
        		if(isset($return[$k][$y])){
        			$return[$k][$y] += $z;
        		} else {
        			$return[$k][$y] = $z;
        		}        		
        	}
       	}
    }
    return $return;
}

//criando valor para todas coberturas
$res[0] = $res[1];
for($i=2; $i<count($res); $i++) {
	$res[0] = array_sum_values( $res[0], $res[$i] );
}

//usado para export da tabela
$dados = base64_encode(implode(',', $_POST));
?>

<?php echo $this->element('site/breadcrumb', $breadcrumbs); ?>

<!-- Ficha Métrica -->
<div style="display:none">
	<div id="data">
		<p><strong>Tema:</strong> <?php echo $breadcrumbs[0]['Category']['title'];?></p>
		<p><strong>Subtema:</strong> <?php echo $breadcrumbs[1]['Category']['title'];?></p>
		<p><strong>Indicador:</strong> <?php echo $post['Post']['title'];?></p>
		<p><strong>Cobertura:</strong> <?php echo implode(' + ', Set::extract('/title', $post['Zone']));?></p>
		<?php
		foreach ($post['Record'] as $record) {
			echo '<p><strong>'.$record['title'].':</strong> <br /> '.$record['text'].'</p>';
		}
		?>
	</div>
</div>

<div class="headerInters block left">
	<div class="titPags block">
		<img src="img/<?= $icon; ?>" alt="">
		<h2><?php echo $post['Post']['title'];?></h2>
	</div>
	<?php echo $this->element('site/fonte_control');?>
</div>

<div class="pgPadrao pagTemaInterna block left">
	<div class="headerPagina">
		<h2>Monte seu gráfico</h2>
		<ul>
			<li><a href="#" style="visibility: hidden">Gerar resultado</a></li>
			<li><a id="fancybox" href="#data">Ficha de métrica</a></li>
			<li><a href="javascript:;" class="btnPrint">Imprimir</a></li>
			<li><a href="exporta/<?php echo $post['Post']['slug'];?>/<?php echo $dados;?>" target="_blank">Exportar</a></li>
		</ul>
	</div>

	<form class="fomularioPgTemaInterna validaForm width100Cent block left" name="FormCadastro" id="form" method="post">
	    <label>Cobertura:<br />
	    	<select name="cobertura" id="cobertura" class="envia">
	    		<option value="0">Todos</option>
	    		<?php
	    		$zone_selected = isset($_POST['cobertura']) ? $_POST['cobertura'] : 0;
	    		foreach($post['Zone'] as $p){
	    			if($p['id'] == $zone_selected){
	    				$sel = ' selected="selected"';
	    				$zona = $p['title'];
	    			} else {
	    				$sel = '';
	    			}
	    			echo '<option value="'.$p['id'].'"'.$sel.'>'.$p['title'].'</option>';
	    		}
	    		if(!isset($zona)){
	    			$zona = 'Todos';
	    		}
	    		?>
	    	</select>
		</label>
		<label>Ano Inicial:
	    	<select name="inicial" id="inicial" class="envia">
	    		<option value="">Selecione uma opção</option>
				<?php
				$initial_selected = isset($_POST['inicial']) ? $_POST['inicial'] : '';
	    		foreach($post['Year'] as $p){
	    			$sel = $p['id'] == $initial_selected ? ' selected="selected"' : '';
	    			echo '<option value="'.$p['id'].'"'.$sel.'>'.$p['title'].'</option>';
	    		}
	    		?>
	    	</select>
		</label>
		<label>Ano Final:
	    	<select name="final" id="final" class="envia">
	    		<option value="">Selecione uma opção</option>
				<?php
	    		$final_selected = isset($_POST['final']) ? $_POST['final'] : '';
	    		foreach($post['Year'] as $p){
	    			$sel = $p['id'] == $final_selected ? ' selected="selected"' : '';
	    			echo '<option value="'.$p['id'].'"'.$sel.'>'.$p['title'].'</option>';
	    		}
	    		?>
	    	</select>
		</label>
		<label>Filtros:<br />
	    	<select name="filtro" id="filtro" class="envia">
	    		<option value="">Todos</option>
				<?php
				$filtro_selected = isset($_POST['filtro']) ? $_POST['filtro'] : '';
	    		foreach($post['Filter'] as $p){
	    			$sel = $p['id'] == $filtro_selected ? ' selected="selected"' : '';
	    			echo '<option value="'.$p['id'].'"'.$sel.'>'.$p['title'].'</option>';
	    		}
	    		?>
	    	</select>
		</label>
		<label></label>
		<label></label>
    </form>
    <br clear="all" />

    <div class="chart_div" id="cd"></div>
    <div class="headerPagina">
		<h2>Cobertura: <?php echo $zona;?></h2>
	</div>

    <table class="tablePgReceitas table_data" id="td">
        <tr class="titulos row">
            <th class="axis_x">Filtros</td>
            <?php
            $i = 0;
            foreach ($post['Year'] as $ano) {
                if(isset($_POST['inicial']) && !empty($_POST['inicial']) && $ano['id'] < $_POST['inicial']){
                    unset($ano);
                }
                else
                if(isset($_POST['final']) && !empty($_POST['final']) && $ano['id'] > $_POST['final']){
                    unset($ano);
                }
                else {
                    echo '<th class="data string">'.$ano['title'].'</th>';
                    $i++;
                }
            }
            ?>
        </tr>
        <?php
        $c = 0;
        foreach($post['Filter'] as $filtro){
        	if(isset($_POST['filtro']) && !empty($_POST['filtro'])){
        		if($filtro['id'] == $_POST['filtro']){
        			echo '<tr class="row">';
		                echo '<td class="axis_x">'.$filtro['title'].'</td>';
		                for($x=0; $x<$i; $x++){
		                	$val = isset($res[$zone_selected][$filtro['id']][$post['Year'][$x]['id']]) ? $res[$zone_selected][$filtro['id']][$post['Year'][$x]['id']] : '';
		                    echo '<td>
		                    	'.$val.'
		                    	<input type="hidden" value="'.$val.'" class="data">
		                    </td>';

		                    $c++;
		                }
		            echo '</tr>';
        		} else {
        			unset($filtro);
        		}
        	} else {
	            echo '<tr class="row">';
	                echo '<td class="axis_x">'.$filtro['title'].'</td>';
	                for($x=0; $x<$i; $x++){
	                	$val = isset($res[$zone_selected][$filtro['id']][$post['Year'][$x]['id']]) ? $res[$zone_selected][$filtro['id']][$post['Year'][$x]['id']] : '';
	                    echo '<td>
	                    	'.$val.'
	                    	<input type="hidden" value="'.$val.'" class="data">
	                    </td>';

	                    $c++;
	                }
	            echo '</tr>';
	        }
        }
        ?>
    </table>

	<div class="boxs corI margin-right25 block left">
		<h2>Fonte</h2>
		<div>
			<?php echo $post['Post']['fonte'];?>
		</div>
	</div>

	<div class="boxs corII block left">
		<h2>Nota Técnica</h2>
		<div>
			<p><?php echo $post['Post']['nota'];?></p>
		</div>
	</div>

	<script>
		$(document).ready(function(){

		});
	</script>

	<br clear="all">
</div>

<?php $this->Html->script(array("google.chart", "google.chart.init"), array("inline" => false)); ?>
<script>
$(document).ready(function () {
	$('.navAcordion > li > a').click(function(e){
		if ($(this).attr('class') != 'active'){
			$('.navAcordion li ul').slideUp();
			$(this).next().slideToggle();
			$('.navAcordion li a').removeClass('active');
			$(this).addClass('active');
		}
		e.preventDefault();
	});
	$('table.tablePgReceitas tr').removeClass('cor2');
	$('table.tablePgReceitas tr:even').addClass('cor2');

	$('.envia').bind('change', function(){
		$('#form').submit();
	});

    $('.btnPrint').bind('click', function(){
        window.print();
        return false;
    });

	$('a#fancybox').fancybox({
        maxWidth    : 800,
        maxHeight   : 600,
        autoSize    : true,
        closeClick  : false,
        openEffect  : 'fade',
        closeEffect : 'fade'
    });
});
</script>