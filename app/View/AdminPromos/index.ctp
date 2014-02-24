<div class="container">
	<div class="div">
		<div class="title">Promotions</div>
		<table>
			<th>Nom</th>
			<th>Code</th>
			<th>Réduction</th>
			<th>Date limite</th>
			<th></th>

		<?php
		foreach ($promos as $key => $promo)
		{
			echo '<tr><td>' . $promo['Promo']['name'] . 
			'</td><td>' . $promo['Promo']['code'] . 
			'</td><td>' . $promo['Promo']['reduction'] . 
			'</td><td>' . $promo['Promo']['limit_date']['formatted'] . 
			'</td><td><a href="/AdminPromos/edit/' . $promo['Promo']['id'] .'">Modifier</a></td></tr>';
		}
		?>
		</table>
	</div>
</div>
