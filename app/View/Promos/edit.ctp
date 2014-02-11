<?php 
	echo $this->Form->create('Promo');
?>
<div class="date-input">
	<?php
		echo $this->Form->input('limit_date', 
		    array(
		        'type' => 'limit_date',
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
	echo $this->Form->end('Enregistrer');
?>