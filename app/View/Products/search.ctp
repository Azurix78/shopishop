<div class="container">
	<div class="div"><a href="/products">Catalogue</a> / Search / <?php echo htmlentities($q); ?></div>
	<div class="left">
		<div class="div ciblage" style="overflow:hidden">
			<div class="title">Recherche acancée</div>
			<h5>Catégories</h5>
			<form method="POST">
			<ul>
				<?php foreach($categories as $categorie){ ?>
					<li>
						<input type="checkbox" name="cat-<?php echo $categorie['Category']['id']; ?>" <?php if(array_key_exists($categorie['Category']['id'], $post_cat)) echo 'checked'; ?> >
						<?php echo $categorie['Category']['name']; ?>
						<span class="label label-right" style="background-color:<?php echo $categorie['Category']['menu_color']; ?>">&nbsp;</span>
					</li>
				<?php } ?>
			</ul>
			<h5>Marques</h5>
			<ul>
				<?php foreach($brands as $brand){ ?>
					<li>
						<input type="checkbox" name="brand-<?php echo $brand['Brand']['id']; ?>" <?php if(array_key_exists($brand['Brand']['id'], $post_brand)) echo 'checked'; ?>>
						<?php echo $brand['Brand']['name']; ?>
					</li>
				<?php } ?>
			</ul>
			<input type="submit" class="pull-right" value="Search">
			<input type="hidden" name="q" value="<?php echo $q; ?>">
		</form>
		</div>
	</div><!--
	--><div class="right">
		<div class="div products-cat">
			<div class="title">Produits pour la recherche "<?php echo htmlentities($q); ?>"</div>
			<?php if(count($products) <= 0) echo '<em class="empty">Aucun article disponible</em>'; ?>
		</div>
			<?php foreach ($products as $key => $product)
			{
				if(count($product['Article']) > 0)
				{
				?>
					<div class="div product-item">
						<div class="product-img">
							<a href="/products/view/<?php echo $product['Product']['id']; ?>"><img src="/img/files/<?php echo $product['Picture']['picture']; ?>" alt="photo product" /></a>
						</div>
						<div class="product-pannel">
							<div class="product-name">
								<span class="product-title"><?php echo $product['Product']['name']; ?></span>
							</div>
							<div class="product-price">
								<span><?php echo $product['Product']['price']; ?> €</span>
							</div>
							<a class="see-more" href="/products/view/<?php echo $product['Product']['id']; ?>">
								Voir plus
							</a>
						</div>
					</div>
				<?php
				}
			}
			?>
	</div>
</div>