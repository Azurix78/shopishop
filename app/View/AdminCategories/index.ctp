<div class="container">
	<div class="div">
		<div class="title">Catégories</div>
		<table>
			<th class="apercu">Image</th>
			<th>Nom</th>
			<th>Couleur Menu</th>
			<th>Actions</th>

		<?php
		foreach ($categories as $key => $category)
		{
			echo '<tr><td class="apercu"><img src="/img/files/' . $category['Picture']['picture'] . 
			'"" alt=""></td>
			<td>' . $category['Category']['name'] . 
			'</td><td>' . $category['Category']['menu_color'] . 
			'</td><td><a class="btn btn-blue" href="/AdminCategories/edit/' . $category['Category']['id'] . 
			'">Modifier</a></td></tr>';
		}
		?>
		</table>
	</div>
</div>