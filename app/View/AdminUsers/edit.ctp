<div class="container">
	<div class="div">
		<div class="title">Information utilisateur</div>
		<?php
		echo $this->Form->create('AdminUsers', array('action' => '/edit/' . $user['User']['id']));
		echo $this->Form->input('lastname', array('label' => 'Nom'));
		echo $this->Form->input('firstname', array('label' => 'Prénom'));
		echo $this->Form->input('email', array('label' => 'Email'));
		echo $this->Form->input('title', array('options' => array('M.' => 'M.', 'Mme' => 'Mme'), 'label' => 'Civilité'));
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
	<div class="div">
		<div class="title">Reset password</div>
		<?php
		echo $this->Html->link(
			'Générer un nouveau mot de passe',
			array('controller' => 'AdminUsers', 'action' => 'password', $user['User']['id']),
			array('class' => 'btn btn-orange'),
			array('Êtes-vous sûr de vouloir regénérer un nouveau mot de passe pour ' . $user['User']['title'] . $user['User']['lastname'])
			);
			?>
			<h1><?php echo ucfirst($is_active); ?> l'utilisateur</h1>
			<?php
				echo $this->Html->link(
				ucfirst($is_active),
				array('controller' => 'AdminUsers', 'action' => 'active', $user['User']['id']),
				array('class' => 'btn btn-red'),
				"Êtes vous sur de vouloir " . $is_active . " le compte de " . $user['User']['title'] . $user['User']['lastname']
				);
			?>
	</div>
</div>