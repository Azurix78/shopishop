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
						<img src="/img/logo.png" alt="Logo 42Shop">
					</div>
					<nav>
						<ul>
							<li><a href="/Admin" class="active">Home</a></li>
							<li class="subnav">
								<a href="/adminusers" >Users</a>
								<ul class="nav">
									<li><a href="/adminusers/add">Ajouter un utilisateur</a></li>
									<li><a href="/adminusers">Modifier une utilisateur</a></li>
								</ul>
							</li>
							<li class="subnav">
								<a href="/Admincategories">Catégories</a>
								<ul class="nav">
									<li><a href="/Admincategories">Afficher les catéfories</a></li>
									<li><a href="/Admincategories/add">Ajouter une catégorie</a></li>
								</ul>
							</li>
							<li class="subnav">
								<a href="/AdminProducts" >Produits</a>
								<ul class="nav">
									<li><a href="/AdminProducts/">Afficher les produits</a></li>
									<li><a href="/AdminProducts/add">Ajouter un produit</a></li>
									<li><a href="/AdminProducts">Modifier un produit</a></li>
								</ul>
							</li>
							<li class="subnav">
								<a href="/Promos" >Promos</a>
								<ul class="nav">
									<li><a href="/Promos/">Afficher les promos</a></li>
									<li><a href="/Promos/add">Ajouter une promo</a></li>
								</ul>
							</li>
							<li  class="subnav">
								<a href="/adminbrands">Marques</a>
								<ul class="nav">
									<li><a href="/adminbrands/add">Ajouter une marque</a></li>
									<li><a href="/adminbrands">Modifier une marque</a></li>
								</ul>
							</li>
							<li  class="subnav">
								<a href="/adminpictures">Pictures</a>
								<ul class="nav">
									<li><a href="/adminpictures">Modifier une photo</a></li>
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
				echo $this->Html->script('bootstrap');
				echo $this->Html->script('admin');
			?>
		</div>
	</body>
</html>
