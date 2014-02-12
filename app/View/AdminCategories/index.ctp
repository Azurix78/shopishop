<table>
	<th>Nom</th>
	<th>Couleur</th>
	<th>ID Image</th>

<?php
foreach ($categories as $key => $category)
{
	echo '<tr><td>' . $category['Category']['name'] . '</td><td>' . $category['Category']['menu_color'] . '</td><td>' . $category['Category']['picture_id'] . '</td></tr>';
}
?>
</table>