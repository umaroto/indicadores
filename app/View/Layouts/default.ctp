<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	echo $this->Html->charset();
	echo $this->fetch('meta');
	?>
	<link rel="shortcut icon" href="favicon.ico" />
    <title>Indicadores Alphaville</title>
    <base href="<?php echo Router::url('/', true); ?>">

	<link href="css/screen.css" rel="stylesheet" media="screen" /><!--[CSS]-->
    <link href="css/padrao.css" rel="stylesheet" media="screen" /><!--[CSS PAdrão]-->
	<link href="css/css-reset.css" rel="stylesheet" media="screen" /><!--[CSS RESET]-->
    <link href="css/font-face.css" rel="stylesheet" media="screen" /><!--[CSS FontFace]-->
	<link href="css/formularios.css" rel="stylesheet" media="screen" ><!--[CSS Formularios]-->
	<link href="css/jcarousel.css" rel="stylesheet" type="text/css"  />

    <script src="js/jquery-1.9.0.js" type="text/javascript"></script>
    <script src="js/jquery.maskedinput.js" type="text/javascript"></script><!--[Mascaras imputs]-->
	<script src="js/funcionalidades.js" type="text/javascript"></script> <!-- [ FUNCIONALIDADES GERAIS] -->
	<script src="js/jsMenu.js" type="text/javascript"></script><!--[ SUBMENU JQUERY ]-->
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script><!--[animações JQUERY]-->

    <?php
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body>
	<div id="wrap">
        <div id="main" class="contener clearfix">
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>

	<?php echo $this->element('site/footer');?>

	<script type="text/javascript">
		$(document).ready(function(){
			$(".bt-home")
			.mouseover(function(){
				$(this).animate().stop();
				$(this).animate({backgroundColor: "#FFDB5E"},300);
			})
			.mouseout(function(){
				$(this).animate({backgroundColor: "#C2D45B"},300);
			});

			$(".temas-home ul li a")
			.mouseover(function(){
				$(this).animate().stop().find("span").animate().stop();
				corReset = $(this).css("background-color");
				corHover = $(this).attr("corHover");
				$(this)
				.delay(200).animate({backgroundColor:corHover},600)
				.find("span").animate({marginLeft:"0px"},190)
				.animate({marginLeft:"-460px"},1)
				.animate({marginLeft:"-230px"},300);
			})
			.mouseout(function(){
				$(this).animate().stop().find("span").animate().stop();
				$(this)
				.animate({backgroundColor:corReset},100)
				.find("span").animate({marginLeft:"-230px"},300)
			});

			$(".o-projeto-home h2 a, .os-indicadores-home h2 a, .biblioteca-home h2 a")
			.mouseover(function(){
				$(this).animate().stop().animate({marginTop:"-194px"},150).animate({marginTop:"0px"},1).animate({marginTop:"-102px"},300);

			})
			.mouseout(function(){
				$(this).animate({marginTop:"-102px"},150);
			});
		});
	</script>

	<?php
	echo $this->element('modulos/modulo-fancybox');
	echo $this->element('modulos/modulo-fontello');
	echo $this->element('modulos/modulo-placeholder');
	echo $this->element('modulos/modulo-toolTip');
	echo $this->element('modulos/modulo-validacao');
	?>
</body>
</html>
