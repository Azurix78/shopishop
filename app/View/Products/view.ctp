<div class="container">
	<div class="div"> <a href="/products">Catalogue</a> / <a href="/products/category">Catégories</a> / <a href="/product/category/<?php echo $product['Category']['name']; ?>"><?php echo $product['Category']['name']; ?></a> / <?php echo $product['Product']['name']; ?></div>
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
		<div class="div products-cat view-product">
			<div class="view-img">
				<img src="/img/files/<?php echo $product['Picture']['picture']; ?>" class="img-product" alt="photo product" />
			</div><!--
				--><div class="product-name">
					<h2><?php echo $product['Product']['name']; ?><span class="pull-right">Ref : <span id="ref"></span></h2>
					<p><u>Marque</u> : <?php echo $product['Brand']['name']; ?></p>
					<p><?php echo $product['Product']['description']; ?></p>
					<p><u>Couleurs et tailles :</u><br><br>
						<label>Couleur :</label>
						<select id="color" data-id="<?php echo $product['Product']['id']; ?>">
							<option value=""></option>
							<?php foreach ($color as $key => $value) { ?>
								<option value="<?php echo $value ?>"><?php echo $key; ?></option>
							<?php } ?>
						</select>
						<label>Taille :</label>
						<select id="size"></select>
					</p>
					<hr><br>
					<div class="product-price pull-right">
						<span><?php echo $product['Product']['price']; ?> €</span>
						<span id="command" class="disable">Ajouter au panier</span>
					</div>
				</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="/js/view-products.js"></script>