<?php echo $this->element('site/breadcrumb', $breadcrumbs); ?>

<div class="headerInters block left">

	<div class="titPags block">
		<img src="img/<?= $icon; ?>" alt="">
		<h2><?php echo $tema['Category']['title'];?></h2>
	</div>

	<?php echo $this->element('site/fonte_control');?>
</div>

<div class="pgPadrao pagTemas block left">

	<?php
	$main_id = $tema['Category']['id'];
	$div_id = '';
	$div = '';
	$ul = false;
	$i = 0;
	$s = 0;

	foreach($childrens as $child):
		//Categorias Principais (Box Verde)
		if($child['Category']['parent_id'] == $main_id){
			if($ul == true){
				$ul = false;
				$div .= '</ul>';
			}
			if(!empty($div_id)){
				$div .= '</div>';
			}
			if($i == 2){
				$div .= '<img src="img/linhaPgTemas.jpg" alt="" class="margin-left10"><br clear="all"><br>';
				$i = 0;
			}
			$i++;

			$div_id = $child['Category']['id'];
			$div .= '<div class="width410Px margin-left10 margin-right15 margin-bottom15 block left">
				<span class="titCategoria"><a href="javascript:void(0)">'.$child['Category']['title'].'</a></span>';

			$k = 0;
			//Monta Categorias com link sem acordion (amarelo)
			foreach ($child['Post'] as $key => $post) {
				if($k == 0){
					$div .= '<ul class="navAcordion_link">';
				}
				$cor = $k % 2 == 0 ? '' : ' cor2';
				$div .= '<li><a href="grafico/'.$post['slug'].'" class="linkCat'.$cor.'">'.$post['title'].'</a></li>';
				$k++;
			}
			if($k > 0){
				$div .= '</ul>';
			}
		}
		else
		//Categoria Secundaria com 3º Nivel
		if($child['Category']['parent_id'] == $div_id){
			if($ul == false){
				$s = 0;
				$div .= '<ul class="navAcordion">';
			}
			$ul = true;
			$cor = $s % 2 == 0 ? '' : ' cor2';
			$s++;

			$div .= '<li><a href="javascript:void(0)" class="linkCat'.$cor.'">'.$child['Category']['title'].'</a>';

			$j = 0;
			//Monta Categorias com link com acordion (amarelo)
			foreach ($child['Post'] as $key => $post) {
				if($j == 0){
					$div .= '<ul class="subCat">';
				}
				$subCor = $j % 2 == 0 ? '' : ' corSub2';
				$div .= '<li><a href="grafico/'.$post['slug'].'" class="linkCat'.$subCor.'">'.$post['title'].'</a></li>';
				$j++;
			}
			if($j > 0){
				$div .= '</ul>';
			}

			$div .= '</li>';
		}
	endforeach;

	echo $div;
	?>

	<script>
		$(document).ready(function(){
			$('.navAcordion > li > a').click(function(e){
				e.preventDefault();
				if ($(this).attr('class') != 'active'){
					$('.navAcordion li ul').slideUp();
					$(this).next().slideToggle();
					$('.navAcordion li a').removeClass('active');
					$(this).addClass('active');
				}
			});
		});
	</script>

	<br clear="all">
</div>