<?php 
	echo $this->Form->create('Category');
	echo $this->Form->input('name', array('label' => 'Nom'));
	echo $this->Form->input('menu_color', array('label' => 'Couleur'));
	echo $this->Form->input('picture_id', array('label' => 'Image'));
	echo $this->Form->end('Ajouter');
?>