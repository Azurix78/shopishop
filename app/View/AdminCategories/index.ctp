<div class="container">
	<div class="div">
		<div class="title">Catégories</div>
		<table>
			<th>Nom</th>
			<th>Couleur Menu</th>
			<th>Image</th>
			<th></th>

		<?php
		foreach ($categories as $key => $category)
		{
			echo '<tr><td>' . $category['Category']['name'] . 
			'</td><td>' . $category['Category']['menu_color'] . 
			'</td><td>' . $category['Picture']['picture'] . 
			'</td><td><a href="/AdminCategories/edit/' . $category['Category']['id'] . 
			'">Modifier</a></td></tr>';
		}
		?>
		</table>
	</div>
</div>