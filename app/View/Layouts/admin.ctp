<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<base href="<?php echo Router::url('/', true); ?>">
	<title>
		<?php echo $title_for_layout; ?>
	</title>

	<!-- CSS -->
	<link rel="stylesheet" href="css/admin/screen.css" type="text/css" media="screen" title="default" />

	<!-- SCRIPTS TOP -->
	<script type="text/javascript" src="js/jquery/jquery-1.4.1.min.js"></script>
	<script type="text/javascript" src="js/jquery/ui.core.js"></script>
	<script type="text/javascript" src="js/jquery/ui.checkbox.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.filestyle.js"></script>
	<script type="text/javascript" src="js/jquery/custom_jquery.js"></script>

	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

</head>

<body>
	<?php
	echo $this->element('topo');

	echo $this->element('menu');
	?>
 	<div class="clear"></div>

	<div id="content-outer">

		<div id="content">

			<?php echo $this->fetch('content'); ?>

		</div>

		<div class="clear">&nbsp;</div>
	</div>

	<div class="clear">&nbsp;</div>

	<?php echo $this->element('footer');?>

 	<!-- SCRIPTS BOTTOM -->
	<script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
	<script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
	<script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
	<script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
	<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('input').checkBox();
			$('#toggle-all').click(function(){
			 	$('#toggle-all').toggleClass('toggle-checked');
				$('#mainform input[type=checkbox]').checkBox('toggle');
				return false;
			});

			$('.styledselect').selectbox({ inputClass: "selectbox_styled" });
			$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
			$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
			$('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });

			$("input.file_1").filestyle({
				image: "img/forms/choose-file.gif",
				imageheight : 21,
				imagewidth : 78,
				width : 310
			});

			$('a.info-tooltip ').tooltip({
				track: true,
				delay: 0,
				fixPNG: true,
				showURL: false,
				showBody: " - ",
				top: -35,
				left: 5
			});

			$(document).pngFix();
		});
	</script>
	<!-- SCRIPTS BOTTOM -->

</body>
</html>
