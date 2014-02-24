<div class="container">
	<div class="div">
		<div class="title">Promotions</div>
		<?php 
			echo $this->Form->create('Promo');
			echo $this->Form->input('name', array('label' => 'Nom'));
			echo $this->Form->input('code', array('label' => 'Code'));
			echo $this->Form->input('reduction', array('label' => 'Réduction'));
		?>
		<div class="date-input">
			<?php
				echo $this->Form->input('limit_date', 
				    array(
				        'type' => 'date',
				        'label' => 'Date limite',
				        'dateFormat' => 'DMY',
				        'empty' => array(
				            'month' => 'Mois',
				            'day'   => 'Jour',
				            'year'  => 'Année'
				        ),
				        'minYear' => date('Y'),
				        'maxYear' => date('Y') + 1,
				        'options' => array('1','2')
				    )
				);
			?>
		</div>
			<?php	
			echo $this->Form->end('Ajouter');
		?>
	<div>
</div>