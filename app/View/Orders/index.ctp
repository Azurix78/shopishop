<div class="container">
	<div class="div">
		<div class="title">Mes commandes</div>
		<table>
			<tr>
				<th>Date</th>
				<th># commande</th>
				<th>Prix</th>
				<th>Status</th>
				<th>Facture</th>
				<th></th>
			</tr>
			<?php
				foreach ($orders as $key => $order)
				{
					?>
						<tr>
							<td><?php echo $order['Order']['created']; ?></td>
							<td><?php echo $order['Order']['id']; ?></td>
							<td><?php echo $order['Order']['price']; ?> €</td>
							<td><?php echo $order['Order']['status']; ?></td>
							<td>lol</td>
							<td><a href="/orders/detail/<?php echo $order['Order']['id']; ?>">Détail</a></td>
						</tr>
					<?php
				}
			?>
		</table>
	</div>
</div>