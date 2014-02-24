<table>
	<th>Nom</th>
	<th>Code</th>
	<th>Réduction</th>
	<th>Date limite</th>

<?php
foreach ($promos as $key => $promo)
{
	echo '<tr><td>' . $promo['Promo']['name'] . '</td><td>' . $promo['Promo']['code'] . '</td><td>' . $promo['Promo']['reduction'] . '</td><td>' . $promo['Promo']['limit_date']['formatted'] . '</td></tr>';
}
?>
</table>
