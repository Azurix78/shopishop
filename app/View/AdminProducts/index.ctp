<div class="container">
	<div class="div">
		<div class="title">Liste des produits</div>
			<?php
				echo (!is_array($products)) ? $products : '';
				if($products):
					?>
					<table>
					<tr>
						<th class="apercu">Images</th>
						<th>Nom</th>
						<th>Catégorie</th>
						<th>Marque</th>
						<th>Promotion</th>
						<th>Statut</th>
						<th>Modification</th>
						<th>Actions</th>
					</tr>
					<?php
						foreach($products as $product):
							echo '<tr>';
							echo '<td class="apercu"><img src="/img/files/'. $product['Picture']['picture'] .'"></td>';
							echo '<td>'. $product['Product']['name'] .'</td>';
							echo '<td>'. $product['Category']['name'] .'</td>';
							echo '<td>'. $product['Brand']['name'] .'</td>';
							echo '<td>-'. $product['Promo']['reduction'] .'% </td>';
							echo '<td>';
							echo ($product['Product']['status'] == 0) ? 'Désactivé' : 'Activé';
							echo '</td>';
							echo '<td>'. $product['Product']['updated'] .'</td>';
							echo '<td><a class="btn btn-blue" href="/AdminProducts/edit/'. $product['Product']['id'] .'">Modifier</a></td>';
							echo '</tr>';
						endforeach;
					?>
					</table>
				<?php
				endif;
			?>
	</div>
</div>