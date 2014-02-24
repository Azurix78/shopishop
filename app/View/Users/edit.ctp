<div class="div">
	<div class="title">Mes informations</div>
	<?php
		echo $this->Form->create('User', array('action' => '/edit'));
		echo $this->Form->input('lastname', array('label' => 'Nom'));
		echo $this->Form->input('firstname', array('label' => 'Prénom'));
		echo $this->Form->input('email', array('label' => 'Email'));
		echo $this->Form->input('title', array('options' => array('M.' => 'M.', 'Mme' => 'Mme'), 'label' => 'Civilité'));
	?>
	<div class="date-input">
		<?php
			echo $this->Form->input('birthday', 
			    array(
			        'type' => 'date',
			        'label' => 'Date de naissance',
			        'dateFormat' => 'DMY',
			        'empty' => array(
			            'month' => 'Mois',
			            'day'   => 'Jour',
			            'year'  => 'Année'
			        ),
			        'minYear' => date('Y')-130,
			        'maxYear' => date('Y'),
			        'options' => array('1','2')
			    )
			);
		?>
	</div>
	<?php echo $this->Form->end('Ajouter', true); ?>
</div>
<div class="div">
	<div class="title">Reset du password</div>
	<?php
		echo $this->Form->create('User', array('action' => '/password'));
			echo $this->Form->input('old_password', array('label' => 'Ancien mot de passe', 'type' => 'password'));
			echo $this->Form->input('password', array('label' => 'Mot de passe'));
			echo $this->Form->input('password_verify', array('label' => 'Confirmer le mot de passe', 'type' => 'password'));
		echo $this->Form->end('Changer', true);
	?>
</div>
<div class="div">
	<div class="title">Désactiver mon compte</div>
	<?php
		echo $this->Html->link(
		    "Désactiver mon compte",
		    array('controller' => 'Users', 'action' => 'active'),
		    array('class' => 'btn btn-red'),
		    "Êtes-vous sur de vouloir désactiver votre compte ?"
		);
	?>
</div>