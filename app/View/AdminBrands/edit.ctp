<div class="container">	
	<div class="div">
		<div class="title">Editer une marque</div>
	<?php 
		echo $this->Form->create('AdminBrands', array('type' => 'file'));
		echo $this->Form->input('name', array('label' => 'Nom', 'value' => $brand['Brand']['name']));
		echo $this->Form->input('email', array('label' => 'Email', 'value' => $brand['Brand']['email']));
		echo $this->Form->input('image_file', array('label' => 'Image :', 'type' => 'file'));
		echo $this->Form->end('Editer');
	?>
	</div>
</div>