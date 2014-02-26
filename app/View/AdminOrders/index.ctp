<div class="container">
	<div class="div">
		<div class="title">Liste des commandes</div>
		<h1>Commandes</h1>
		<table>
			<tr>
				<th># commande</th>
				<th>Email</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Status</th>
				<th>Address</th>
				<th>Zipcode</th>
				<th>Country</th>
				<th></th>
			</tr>
			<?php
				foreach ($orders as $key => $order)
				{
					?>
					<tr>
						<td><?php echo $order['Order']['id']; ?></td>
						<td><?php echo $order['Order']['email'];?></td>
						<td><?php echo $order['Order']['firstname'];?></td>
						<td><?php echo $order['Order']['lastname'];?></td>
						<td><?php echo $order['Order']['status'];?></td>
						<td><?php echo $order['Order']['address'];?></td>
						<td><?php echo $order['Order']['zipcode'];?></td>
						<td><?php echo $order['Order']['country'];?></td>
						<td>
							<?php echo $this->Html->link('Edit order', array('controller' => 'adminorders', 'action' => 'edit', $order['Order']['id'])); ?>
						</td>
					</tr>
				<?php
				}
				?>
		</table>
	</div>
</div>