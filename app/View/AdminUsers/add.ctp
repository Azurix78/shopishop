<div class="container">
	<div class="div">
		<?php
		echo $this->Form->create('AdminUsers', array('action' => '/add'));
		echo $this->Form->input('lastname', array('label' => 'Nom'));
		echo $this->Form->input('firstname', array('label' => 'Prénom'));
		echo $this->Form->input('email', array('label' => 'Email'));
		echo $this->Form->input('title', array('options' => array('M.' => 'M.', 'Mme' => 'Mme'), 'label' => 'Civilité'));
		echo $this->Form->input('password', array('label' => 'Mot de passe'));
		echo $this->Form->input('password_verify', array('label' => 'Confirmer mot de passe', 'type' => 'password'));
		echo $this->Form->input('role_id', array('options' => array($roles), 'label' => 'Role'));
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
</div>