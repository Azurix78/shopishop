<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->fetch('title');?></title>
		<meta name="author" content="adoui_y, christ_a, rivier_n, rubio_n">
		<meta charset="utf-8" />
		<link rel="icon" type="image/x-icon" href="/img/rsc/favicon.ico" />
		<?php
			echo $this->Html->css('style');
			echo $this->Html->css('bootstrap');
			//echo $this->Html->css('cake.generic');
			echo $this->fetch('css');
		?>
	</head>
	<body>
		<div id="container">
			<header>
				<div class="logo">
					<img src="/img/logo.png" alt="Logo 42Shop">
				</div>
				<nav>
					<a href="#">Home</a>
					<a href="#">Products</a>
					<a href="#">Contact</a>
				</nav>
			</header>
			<div id="content">
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
			<footer></footer>
			<?
				echo $this->Html->script('jquery-2.0.3.js');
				echo $this->Html->script('bootstrap');
			?>
		</div>
	</body>
</html>
