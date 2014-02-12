<div class="container">	
	<div class="div">
		<div class="title">Ajouter une marque</div>
	<?php 
		echo $this->Form->create('AdminBrands', array('type' => 'file', 'action' => 'add'));
		echo $this->Form->input('name', array('label' => 'Nom'));
		echo $this->Form->input('email', array('label' => 'Email'));
		echo $this->Form->input('image_file', array('label' => 'Image :', 'type' => 'file'));
		echo $this->Form->end('Ajouter');
	?>
	</div>
</div>