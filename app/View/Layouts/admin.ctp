<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->fetch('title');?></title>
		<meta name="author" content="adoui_y, christ_a, rivier_n, rubio_n">
		<meta charset="utf-8" />
		<link rel="icon" type="image/x-icon" href="/img/rsc/favicon.ico" />
		<?php
			echo $this->Html->css('style');
			echo $this->Html->css('admin');
			//echo $this->Html->css('cake.generic');
			echo $this->fetch('css');
		?>
	</head>
	<body>
		<div id="container">
			<header>
				<div class="container">
					<div class="logo">
						<img src="/img/logo.png" alt="Logo 42Shop">
					</div>
					<nav>
						<ul>
							<li><a href="#" class="active">Home</a></li>
							<li class="subnav">
								<a href="/AdminProducts" >Produits</a>
								<ul class="nav">
									<li><a href="/AdminProducts/add">Ajouter un produit</a></li>
								</ul>
							</li>
							<li  class="subnav">
								<a href="/adminbrands">Marques</a>
								<ul class="nav">
									<li><a href="/adminbrands/add">Ajouter une marque</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</header>
			<div id="content">
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
			<footer></footer>
			<?php
				echo $this->Html->script('jquery-2.0.3.js');
				echo $this->Html->script('bootstrap');
			?>
		</div>
	</body>
</html>
