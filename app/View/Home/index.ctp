<div class="container">
	<div class="div" id="slider">
	</div>
	<div class="product-list">
		<?php foreach ($random_products as $key => $product)
		{
			?>
				<div class="div product-item">
					<div class="product-img">
						<img src="/img/files/<?php echo $product['Picture']['picture']; ?>" alt="photo product" />
					</div>
					<div class="product-pannel">
						<div class="product-name">
							<span class="product-title truncate"><?php echo $product['Product']['name']; ?></span>
						</div>
						<div class="product-price">
							<span><?php echo $product['Product']['price']; ?> €</span>
						</div>
						<a class="see-more" href="/Products/view/<?php echo $product['Product']['id']; ?>">
							Voir plus
						</a>
					</div>
				</div>
			<?php
		}
		?>
	</div>
	<div id="ban-pub">
	</div>
	<div id="ban-info" class="div">
		<div id="livraison-free">
			<div class="left">
				<img src="/img/camion.png" />
			</div>
			<div class="right">
				<span class="title-ban truncate">LIVRAISON GRATUITE</span>
				<span class="desc">La livraison est offerte sur l'intégralité de la boutique.</span>
			</div>
		</div><!--
		--><div id="livraison-rapide">
			<div class="left">
				<img src="/img/chrono48.png" />
			</div><!--
			--><div class="right">
				<span class="title-ban truncate">LIVRAISON RAPIDE</span>
				<span class="desc">Nous vous garantissons l'envoi.</span>
			</div>
		</div><!--
		--><div id="livraison-satisfait">
			<div class="left">
				<img src="/img/pouce.png" />
			</div><!--
			--><div class="right">
				<span class="title-ban truncate">SATISFAIT ou REMBOURSÉ</span>
				<span class="desc">Vous avez 30 jours pour vous faire rembourser.</span>
			</div>
		</div><!--
		--><div id="livraison-secure">
			<div class="left">
				<img src="/img/cadenas.png" />
			</div><!--
			--><div class="right">
				<span class="title-ban truncate">LIVRAISON GRATUITE</span>
				<span class="desc">La livraison est offerte sur l'intégralité de la boutique.</span>
			</div>
		</div>
	</div>
</div>