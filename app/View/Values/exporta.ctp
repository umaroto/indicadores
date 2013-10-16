<?php
header ( "Content-Type: application/vnd.ms-excel" );
header ( "Content-disposition: attachment; filename=".$post['Post']['slug'].".xls" );
header ( "Pragma: no-cache" );
header ( "Expires: 0" );

$res = array();
foreach($post['Value'] as $val){
    $res[$val['zone_id']][$val['filter_id']][$val['year_id']] = $val['value'];
}

//usado para export da tabela
if(!empty($dados)){
	$dados = explode(',', base64_decode($dados)); 
	foreach ($post['Filter'] as $val) {
		if($dados[3] == $val['id']){
			$filtro = $val['title'];
		}
	}
} else {
	$filtro = '';
}
	

$zone_selected = isset($dados[0]) ? $dados[0] : $post['Zone'][0]['id'];
?>
<table>
    <tr>
        <td><?php echo utf8_decode($post['Category']['title']);?></td>
        <?php
        $i = 0;
        foreach ($post['Year'] as $ano) {
            if(isset($dados['1']) && !empty($dados['1']) && $ano['id'] < $dados['1']){
                unset($ano);
            }
            else
            if(isset($dados['2']) && !empty($dados['2']) && $ano['id'] > $dados['2']){
                unset($ano);
            }
            else {
                echo '<td>'.$ano['title'].'</td>';
                $i++;
            }
        }
        ?>
    </tr>
    <?php
    $c = 0;
    foreach($post['Filter'] as $filtro){
    	if(isset($dados['3']) && !empty($dados['3'])){
    		if($filtro['id'] == $dados['3']){
    			echo '<tr>';
	                echo '<td>'.utf8_decode($filtro['title']).'</td>';
	                for($x=0; $x<$i; $x++){
	                	$val = isset($res[$zone_selected][$filtro['id']][$post['Year'][$x]['id']]) ? $res[$zone_selected][$filtro['id']][$post['Year'][$x]['id']] : '';
	                    echo '<td>'.$val.'</td>';
	                    $c++;
	                }
	            echo '</tr>';
    		} else {
    			unset($filtro);
    		}
    	} else {
            echo '<tr>';
                echo '<td>'.utf8_decode($filtro['title']).'</td>';
                for($x=0; $x<$i; $x++){
                	$val = isset($res[$zone_selected][$filtro['id']][$post['Year'][$x]['id']]) ? $res[$zone_selected][$filtro['id']][$post['Year'][$x]['id']] : '';
                    echo '<td>'.$val.'</td>';
                    $c++;
                }
            echo '</tr>';
        }
    }
    ?>
</table>