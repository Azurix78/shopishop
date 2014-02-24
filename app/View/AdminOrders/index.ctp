<div class="container">
	<div class="div">
		<div class="title">Liste des commandes</div>
		<h1>Commandes</h1>
		<table>
			<tr>
				<th>Email</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Status</th>
				<th>Address</th>
				<th>Zipcode</th>
				<th>Country</th>
				<th>Gift wrap</th>
				<th>Promo code</th>
				<th>Total weight</th>
				<th>Token</th>
			</tr>
			<?php
				foreach ($orders as $key => $order)
				{
					?>
					<tr>
						<td><?php echo $order['Order']['email'];?></td>
						<td><?php echo $order['Order']['first_name'];?></td>
						<td><?php echo $order['Order']['last_name'];?></td>
						<td><?php echo $order['Order']['status'];?></td>
						<td><?php echo $order['Order']['address'];?></td>
						<td><?php echo $order['Order']['zipcode'];?></td>
						<td><?php echo $order['Order']['country'];?></td>
						<td><?php echo $order['Order']['gift_wrap'];?></td>
						<td><?php echo $order['Order']['promo_code'];?></td>
						<td><?php echo $order['Order']['total_weight'];?></td>
						<td><?php echo $order['Order']['token'];?></td>
						<td>
							<a href="#">Archive order</a>
						</td>
					</tr>
				<?php
				}
				?>
		</table>
	</div>
</div>