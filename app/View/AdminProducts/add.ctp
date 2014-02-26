<div class="container">
	<div class="div">
		<div class="title">Ajouter un produit</div>
			<?php
				echo $this->Form->create('AdminProducts', array('type' => 'file','action' => '/add'));
				echo $this->Form->input('name', array('label' => 'Nom'));
				echo $this->Form->input('category_id', array('options' => array($select_categories), 'label' => 'Catégorie'));
				echo $this->Form->input('brand_id', array('options' => array($select_brands), 'label' => 'Marque'));
				echo $this->Form->input('promo_id', array('options' => array($select_promos), 'label' => 'Promotions'));
				echo $this->Form->input('description', array('type' => 'textarea', 'escape'=> true,'label' => 'Description'));
				echo $this->Form->input('status', array('options' => array(0 => 'Désactivé', 1 => 'Activé'), 'label' => 'Status'));
				echo $this->Form->input('price', array('label' => 'Prix'));
				echo $this->Form->input('image_file', array('label' => 'Image :', 'type' => 'file')); ?>
				<div class="chooseImg">
					<div class='title'>ou choississez parmi les images :</div>
					<?php foreach($pictures as $pic){ ?>
						<img data-id='<?php echo $pic['Picture']['id']; ?>' src="/img/files/<?php echo $pic['Picture']['picture']; ?>">
					<?php } ?>
				</div>
				<input type="hidden" name="img" class="img">
				<?php echo $this->Form->end('Ajouter', true); ?>
	</div>
</div>