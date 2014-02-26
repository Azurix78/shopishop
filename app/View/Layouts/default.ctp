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
			echo $this->Html->script('jquery-2.0.3.js');
		?>
	</head>
	<body>
		<div class="container">
			<div id="user-quick-pannel">
				<?php if(!$this->Session->read('Auth.User')){
					?>
					<div id="quick-login">
						<a id="quick-register" href="/Users/register">S'inscrire</a>
						<?php echo $this->Form->create('User', array('action' => '/login'));?>
							<?php echo $this->Form->input('email', array('placeholder' => 'Email')); ?>
							<?php echo $this->Form->input('password', array('placeholder' => 'Mot de passe')); ?>
						<?php echo $this->Form->end('login'); ?>
						<div id="close-quick-login">
						</div>
					</div>
					<div id="show-quick-login">
					</div>
					<?php
				}
				else
				{
					if(AuthComponent::user('Role')['name'] == 'Admin')
					{
						?>
						<a id="quick-profil" href="/Admin">Admin</a>
						<?php
					}
					?>
					<a id="quick-profil" href="/users/Profil">Mon profil</a>
					<a id="quick-logout" href="/users/logout">Se deconnecter</a>
					<?php
				}
				?>
			</div>
			<header>
				<a class="logo" href="/">
					<img src="/img/logo.png" alt="Logo 42Shop">
				</a>
				<nav>
					<a href="/">Home</a>
					<a href="/Products">Products</a>
					<a href="/Contacts">Contact</a>
					<div class="pull-right">
						<a id="panier" href="/orders/cart">
							Panier
							<span id="quick-cart" class="div">
								<span class="title">Panier<span class="pull-right btn label label-warning" style="margin:5px; line-height:20px">Accéder au panier</span></span>
								<span id="quick-cart-content" class="div">
									<?php 
									foreach($this->Session->read('cart')['produits'] as $key => $produit){ ?>
										<span class="quick-article-item">
											<span class="quick-article-name"><?php echo $produit['Product']['name']; ?></span><!--
											--><span class="quick-article-quantity">x<?php echo $produit['Article']['quantity']; ?></span><!--
											--><span class="quick-article-price"><?php echo $produit['Product']['price'] * $produit['Article']['quantity']; ?> €</span>
										</span>
									<?php } ?>
									<span class="quick-cart-total">Total : <?php echo $quantity; ?> €</span>
								</span>
							</span>
						</a>
						<div id="header_search">
							<form class="search" action="/products/search" method="POST">
								<input type="text" name="q" placeholder="search" />
								<input type="submit" value="" />
							</form>
						</div>
					</div>
				</nav>
			</header>
			<div class="clearfix"></div>
			<div id="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
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
			echo $this->Html->script('bootstrap');
		?>
	</body>
</html>
