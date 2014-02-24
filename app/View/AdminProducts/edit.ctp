<div class="container">
	<div class="div">
		<div class="title">Modifié <?php echo $product['Product']['name']; ?></div>
			<?php
				echo $this->Form->create('AdminProducts', array('action' => '/edit/'. $product['Product']['id']));
				echo $this->Form->input('name', array('label' => 'Nom'));
				echo $this->Form->input('picture_id', array('options' => array($select_pictures), 'label' => 'Image', 'class' => 'select_picture'));
				echo $this->Form->input('category_id', array('options' => array($select_categories), 'label' => 'Catégorie'));
				echo $this->Form->input('brand_id', array('options' => array($select_brands), 'label' => 'Marque'));
				echo $this->Form->input('promo_id', array('options' => array($select_promos), 'label' => 'Promotions'));
				echo $this->Form->input('status', array('options' => array(0 => 'Désactivé', 1 => 'Activé'), 'label' => 'Status'));
				echo $this->Form->input('price', array('type'=>'number', 'label' => 'Prix'));
				echo $this->Form->end('Ajouter', true);
			?>
	</div>
	<div class="div">
		<div class="title">Ajouter un article à <?php echo $product['Product']['name']; ?></div>
			<?php
				echo $this->Form->create('Articles', array('action' => '/add/'. $product['Product']['id']));
				echo $this->Form->input('picture_id', array('options' => array($select_pictures), 'label' => 'Image', 'class' => 'select_picture'));
				echo $this->Form->input('size', array('label' => 'Taille'));
				echo $this->Form->input('description', array('type' => 'textarea', 'escape'=> true,'label' => 'Description'));
				echo $this->Form->input('color', array('label' => 'Couleur'));
				echo $this->Form->input('quantity', array('type'=>'number', 'label' => 'Quantité'));
				echo $this->Form->input('weight', array('type'=>'number', 'label' => 'Poids'));
				echo $this->Form->end('Ajouter', true);
			?>
	</div>
	<div class="div">
		<div class="title">Article de <?php echo $product['Product']['name']; ?></div>
		<ul>
			<?php
			foreach ($product['Article'] as $key => $article)
			{
				?>
					<li class="product-articles">
						<span class="product-articles-size"><?php echo $article['size'] ?></span>
						<span class="product-articles-color"><?php echo $article['color'] ?></span>
						<span class="product-articles-quantity"><?php echo $article['quantity'] ?></span>
						<span class="product-articles-del"><a href="/Articles/active/<?php echo $article['id']; ?>">X</a></span>
					</li>
				<?php
			}
			?>
		</ul>
	</div>
</div>