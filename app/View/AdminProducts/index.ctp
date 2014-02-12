<div class="container">
	<div class="div">
		<div class="title">Liste des produits</div>
			<?php
				echo (!is_array($products)) ? $products : '';
				if(is_array($products)): 
					echo '<table>';
					echo '<th>Image</th><th>Nom</th><th>Catégorie</th><th>Marque</th><th>Promotion</th><th>Statut</th><th>Création</th><th>Modification</th>';
					foreach($products as $row):
						echo '<tr>';
						echo '<td>'. $row['Products']['picture_id'] .'</td>';
						echo '<td>'. $row['Products']['name'] .'</td>';
						echo '<td>'. $row['categories']['name'] .'</td>';
						echo '<td>'. $row['brands']['name'] .'</td>';
						echo '<td>'. $row['promos']['name'] .'</td>';
						echo '<td>';
						echo ($row['Products']['status'] == 0) ? 'Activé' : 'Désactivé';
						echo '</td>';
						echo '<td>'. $row['Products']['created'] .'</td>';
						echo '<td>'. $row['Products']['updated'] .'</td>';
						echo '</tr>';
					endforeach;
					echo '</table>';
				endif;
			?>
	</div>
</div>