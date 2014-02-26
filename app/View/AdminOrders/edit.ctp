<div class="container">
	<div class="div">
		<div class="title">Commande n°<?php echo $id; ?></div>
		<?php 
			echo $this->Form->create('Order');
			echo $this->Form->input('status', array('options' => array(0 => 'En attente', 1 => 'Expédié', 2 => 'Livré', 3 => 'Archivé')));
			echo $this->Form->end('Enregistrer');
		?>
	</div>
</div>