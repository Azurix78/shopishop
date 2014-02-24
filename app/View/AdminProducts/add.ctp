<div class="container">
	<div class="div">
		<div class="title">Ajouter un produit</div>
			<?php
				echo $this->Form->create('AdminProducts', array('action' => '/add'));
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
</div>