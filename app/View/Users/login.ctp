<?php echo $this->Form->create('User'); ?>
	<?php echo $this->Form->input('email', array('label' => 'Email', 'autofocus' => "autofocus")); ?>
	<?php echo $this->Form->input('password', array('label' => 'Mot de passe')); ?>
<?php echo $this->Form->end('Me connecter'); ?>