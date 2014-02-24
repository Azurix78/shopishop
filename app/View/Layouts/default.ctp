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
			echo $this->fetch('css');
		?>
	</head>
	<body>
		<div id="container">
			<header>
				<a class="logo" href="/">
					<img src="/img/logo.png" alt="Logo 42Shop">
				</a>
				<nav>
					<a href="/">Home</a>
					<a href="/Products">Products</a>
					<a href="/Contacts">Contact</a>
					<a id="panier" href="/Cart">Panier</a>
					<div id="header_search">
						<form class="search">
							<input type="text" placeholder="search" />
							<input type="submit" value="" />
						</form>
					</div>
				</nav>
			</header>
			<div id="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
			<footer>
				<div class="container">
					<div class="column">
						<h1>Ma commande</h1>
						<a href="/">Suivi de commande</a>
						<a href="/">Frais d'envoi</a>
						<a href="/">Délai de livraison</a>
						<a href="/">Echange et remboursement</a>
						<a href="/">Moyen de paiement</a>
						<a href="/">Livraison à domicile ou Point Relais</a>
					</div><!--
					--><div class="column">
						<h1>Ma commande</h1>
						<a href="/">Suivi de commande</a>
						<a href="/">Frais d'envoi</a>
						<a href="/">Délai de livraison</a>
						<a href="/">Echange et remboursement</a>
						<a href="/">Moyen de paiement</a>
						<a href="/">Livraison à domicile ou Point Relais</a>
					</div><!--
					--><div class="column">
						<h1>Ma commande</h1>
						<a href="/">Suivi de commande</a>
						<a href="/">Frais d'envoi</a>
						<a href="/">Délai de livraison</a>
						<a href="/">Echange et remboursement</a>
						<a href="/">Moyen de paiement</a>
						<a href="/">Livraison à domicile ou Point Relais</a>
					</div><!--
					--><div class="column">
						<h1>Ma commande</h1>
						<a href="/">Suivi de commande</a>
						<a href="/">Frais d'envoi</a>
						<a href="/">Délai de livraison</a>
						<a href="/">Echange et remboursement</a>
						<a href="/">Moyen de paiement</a>
						<a href="/">Livraison à domicile ou Point Relais</a>
					</div>
				</div>
			</footer>
			<?php
				echo $this->Html->script('jquery-2.0.3.js');
				echo $this->Html->script('bootstrap');
			?>
		</div>
	</body>
</html>
