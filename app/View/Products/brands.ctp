<div class="container">
	<div class="div"> <a href="/products">Catalogue</a> / <a href="/products/brands">Marques</a> / <?php echo $this->request->params['pass'][0]; ?> </div>
	<div class="left">
		<div class="div ciblage">
			<div class="title">Cibler votre recherche</div>
			<h5>Catégories</h5>
			<ul>
				<?php foreach($categories as $categorie){ ?>
					<li>
						<a href="/products/category/<?php echo $categorie['Category']['name']; ?>/<?php echo $categorie['Category']['id']; ?>"><?php echo $categorie['Category']['name']; ?>
							<span class="label label-right" style="background-color:<?php echo $categorie['Category']['menu_color']; ?>">&nbsp;</span>
						</a>
					</li>
				<?php } ?>
			</ul>
			<h5>Marques</h5>
			<ul>
				<?php foreach($brands as $brand){ ?>
					<li><a href="/products/brands/<?php echo $brand['Brand']['name']; ?>/<?php echo $brand['Brand']['id']; ?>"><?php echo $brand['Brand']['name']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div><!--
	--><div class="right">
		<div class="div products-cat">
			<div class="title">Produits pour la marque <?php echo $this->request->params['pass'][0]; ?></div>
			<?php if(count($products) <= 0) echo '<em class="empty">Aucun article disponible</em>'; ?>
		</div>
			<?php foreach ($products as $key => $product)
			{
				if(count($product['Article']) > 0)
				{
				?>
					<div class="div product-item">
						<div class="product-img">
							<img src="/img/files/<?php echo $product['Picture']['picture']; ?>" alt="photo product" />
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