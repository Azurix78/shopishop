<div class="div">
	<div class="title">Vos adresses</div>
	<?php
	foreach ($addresses as $key => $address)
	{
		?>
			<div class="address-item">
				<div class="address-text">
					<div class="address-name">
						<?php echo $address['Address']['firstname']; ?> <?php echo $address['Address']['lastname']; ?>
					</div>
					<div class="address-address"><?php echo $address['Address']['address']; ?></div>
					<div class="address-zipcode"><?php echo $address['Address']['zipcode']; ?></div>
					<div class="address-country"><?php echo $address['Address']['country']; ?></div>
				</div><!--
				--><div class="address-pannel">
					<?php
					echo $this->Html->link(
						'✖',
						array('controller' => 'Addresses', 'action' => 'del', $address['Address']['id']),
						array(),
						array('Êtes-vous sûr de vouloir supprimer cette adresse ?')
					);
					?>
				</div>
			</div>
		<?php
	}
	?>
</div>
<div class="div">
	<div class="title">Ajouter une adresse</div>
	<?php
		echo $this->Form->create('Address', array('action' => '/add'));
		echo $this->Form->input('lastname', array('label' => 'Nom'));
		echo $this->Form->input('firstname', array('label' => 'Prénom'));
		echo $this->Form->input('address', array('label' => 'Adresse', 'type' => 'text'));
		echo $this->Form->input('zipcode', array('label' => 'Code postal'));
		echo $this->Form->input('country', array('label' => 'Pays'));
		echo $this->Form->end('Ajouter', true);
	?>
</div>
