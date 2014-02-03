<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->fetch('title');?></title>
		<meta name="author" content="adoui_y, christ_a, rivier_n, rubio_n">
		<meta charset="utf-8" />
		<link rel="icon" type="image/x-icon" href="/img/rsc/favicon.ico" />
		<?php
			echo $this->Html->css('style');
			//echo $this->Html->css('cake.generic');
			echo $this->fetch('css');
		?>
	</head>
	<body>
		<nav>
			
		</nav>

		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>

		<footer>
			
		</footer>
		<?php
			echo $this->Html->script('jquery-2.0.3');
			echo $this->Html->script('script');
			echo $this->fetch('script');
		?>
	</body>
</html>
