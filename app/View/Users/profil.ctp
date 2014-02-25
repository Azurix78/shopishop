<div class="div">
	<div class="title">Mon profil</div>
	<?php
		echo $this->Html->link(
		    'Mes informations',
		    array('controller' => 'Users', 'action' => 'edit'),
		    array('class' => 'btn btn-orange')
		);
		echo $this->Html->link(
		    'Mes adresses',
		    array('controller' => 'Addresses'),
		    array('class' => 'btn btn-blue')
		);
		echo $this->Html->link(
		    'Mes commandes',
		    array('controller' => 'orders'),
		    array('class' => 'btn btn-green')
		);
	?>
</div>