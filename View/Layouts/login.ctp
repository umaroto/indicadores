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
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<link rel="stylesheet" href="css/admin/screen.css" type="text/css" media="screen" title="default" />
</head>
<body id="login-bg">
	<div id="login-holder">
		<div id="logo-login"></div>
		<div class="clear"></div>

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

 	</div>

	<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
	<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>
	<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(document).pngFix( );
	});
	</script>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
