<div class="container">
	<div class="div">
		<div class="title">Modifier la catégorie</div>
		<?php
			echo $this->Form->create('AdminCategories', array('type' => 'file'));
			echo $this->Form->input('name', array('label' => 'Nom', 'value' => $category['Category']['name']));
			echo $this->Form->input('menu_color', array('label' => 'Couleur', 'value' => $category['Category']['menu_color']));
			echo $this->Form->input('image_file', array('label' => 'Image :', 'type' => 'file')); ?>
			<?php echo $this->Form->end('Enregistrer');
		?>
	</div>
</div>