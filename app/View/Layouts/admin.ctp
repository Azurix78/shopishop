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
			echo $this->fetch('css');
		?>
		<?
			echo $this->Html->script('jquery-2.0.3.js');
		?>
	</head>
	<body>
		<div id="container">
			<header>
				<div class="container">
					<div class="logo">
						<a href="/Admin"><img src="/img/logo.png" alt="Logo 42Shop"></a>
					</div>
					<nav>
						<ul>
							<li><a href="/Admin" class="active">Home</a></li>
							<li class="subnav">
								<a href="/adminusers" >Users</a>
								<ul class="nav">
									<li><a href="/adminusers/add">Ajouter un utilisateur</a></li>
									<li><a href="/adminusers">Gérer les utilisateurs</a></li>
								</ul>
							</li>
							<li class="subnav">
								<a href="/Admincategories">Catégories</a>
								<ul class="nav">
									<li><a href="/Admincategories/add">Ajouter une catégorie</a></li>
									<li><a href="/Admincategories">Gérer les catégories</a></li>
								</ul>
							</li>
							<li class="subnav">
								<a href="/AdminProducts" >Produits</a>
								<ul class="nav">
									<li><a href="/AdminProducts/add">Ajouter un produit</a></li>
									<li><a href="/AdminProducts">Gérer les produits</a></li>
								</ul>
							</li>
							<li class="subnav">
								<a href="/AdminOrders" >Orders</a>
								<ul class="nav">
									<li><a href="/AdminOrders/index/0">Commandes en attentes</a></li>
									<li><a href="/AdminOrders/index/1">Commandes en préparations</a></li>
									<li><a href="/AdminOrders/index/2">Commandes en expédiées</a></li>
									<li><a href="/AdminOrders/index/2">Commandes archivées</a></li>
								</ul>
							</li>
							<li  class="subnav">
								<a href="/adminbrands">Marques</a>
								<ul class="nav">
									<li><a href="/adminbrands/add">Ajouter une marque</a></li>
									<li><a href="/adminbrands">Gérer les marques</a></li>
								</ul>
							</li>
							<li  class="subnav">
								<a href="#">Autres</a>
								<ul class="nav">
									<li><a href="/adminpictures">Gérer les photos</a></li>
									<li><a href="/AdminPromos/add">Ajouter une promo</a></li>
									<li><a href="/AdminPromos/">Gérer les promos</a></li>
								</ul>
							</li>
							<li>
								<a href="/">Retour</a>
							</li>
						</ul>
					</nav>
				</div>
			</header>
			<div class="clearfix"></div>
			<div id="content">
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
			</div>
			<?php
				echo $this->Html->script('bootstrap');
				echo $this->Html->script('admin');
			?>
		</div>
	</body>
</html>
