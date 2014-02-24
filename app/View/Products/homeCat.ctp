<div class="container">
	<div class="div"> <a href="/products">Catalogue</a> / Catégories</div>
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
			<div class="title">Produits</div>
			<h4>Catégories des produits</h4>
			<?php foreach($categories as $categorie){ ?>
				<a class="block-a" href="/products/category/<?php echo $categorie['Category']['name']; ?>/<?php echo $categorie['Category']['id']; ?>">
					<div>
						<img src="/img/files/<?php echo $categorie['Picture']['picture']; ?>">
						<div>
							<?php echo $categorie['Category']['name']; ?><span class="label label-right" style="background-color:<?php echo $categorie['Category']['menu_color']; ?>">&nbsp;</span>
						</div>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
</div>