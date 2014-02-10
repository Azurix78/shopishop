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
						echo '<td>'. $row['Products']['category_id'] .'</td>';
						echo '<td>'. $row['Products']['brand_id'] .'</td>';
						echo '<td>'. $row['Products']['promo_id'] .'</td>';
						echo '<td>'. $row['Products']['status'] .'</td>';
						echo '<td>'. $row['Products']['created'] .'</td>';
						echo '<td>'. $row['Products']['updated'] .'</td>';
						echo '</tr>';
					endforeach;
					echo '</table>';
				endif;
			?>
	</div>
</div>