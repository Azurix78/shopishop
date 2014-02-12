<h1>Mon profil</h1>
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
?>