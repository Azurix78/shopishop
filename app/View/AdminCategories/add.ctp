<div class="container">
	<div class="div">
		<div class="title">Ajouter une catégorie</div>
		<?php 
			echo $this->Form->create('Category');
			echo $this->Form->input('name', array('label' => 'Nom'));
			echo $this->Form->input('menu_color', array('label' => 'Couleur'));
			echo $this->Form->input('picture_id', array('options' => array($select_pictures), 'label' => 'Image', 'class' => 'select_picture'));
			echo $this->Form->end('Ajouter');
		?>
	</div>
</div>