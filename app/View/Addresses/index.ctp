<?php
foreach ($addresses as $key => $address)
{
	?>
		<div class="address item">
			<div class="address firstname"><?php echo $address['Address']['firstname']; ?></div>
			<div class="address lastname"><?php echo $address['Address']['lastname']; ?></div>
			<div class="address address"><?php echo $address['Address']['address']; ?></div>
			<div class="address zipcode"><?php echo $address['Address']['zipcode']; ?></div>
			<div class="address country"><?php echo $address['Address']['country']; ?></div>
		</div>
	<?php
}
?>
<h1>Ajouter une adresse</h1>
<?php
	echo $this->Form->create('Address', array('action' => '/add'));
	echo $this->Form->input('lastname', array('label' => 'Nom'));
	echo $this->Form->input('firstname', array('label' => 'Prénom'));
	echo $this->Form->input('address', array('label' => 'Adresse'));
	echo $this->Form->input('zipcode', array('label' => 'Code postal'));
	echo $this->Form->input('country', array('label' => 'Pays'));
	echo $this->Form->end('Ajouter', true);
?>
