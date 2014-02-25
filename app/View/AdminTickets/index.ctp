<!--- Trois variables pour les tickets : "new_tikets", "current_tickets" et "finished_tickets" -->

<div class="container">
	<div class="div">
		<div class="title">Liste des tickets</div>
		<h1>Tickets</h1>
		<table>
			<tr>
				<th>Email</th>
				<th>Content</th>
				<th>Status</th>
				<th>Category</th>
				<th>Objet</th>
				<th>Order_id</th>
			</tr>
			<?php
				foreach ($new_tickets as $key => $ticket)
				{
					?>
					<tr>
						<td><?php echo $ticket['Ticket']['email'];?></td>
						<td><?php echo $ticket['Ticket']['content'];?></td>
						<td><?php echo $ticket['Ticket']['status'];?></td>
						<td><?php echo $ticket['Ticket']['category'];?></td>
						<td><?php echo $ticket['Ticket']['object'];?></td>
						<td><?php echo $ticket['Ticket']['order_id'];?></td>
						<td>
							<a href="#">Update status</a>
						</td>
					</tr>
				<?php
				}
				?>
		</table>
		<table>
			<tr>
				<th>Email</th>
				<th>Content</th>
				<th>Status</th>
				<th>Category</th>
				<th>Objet</th>
				<th>Order_id</th>
			</tr>
			<?php
				foreach ($current_tickets as $key => $ticket)
				{
					?>
					<tr>
						<td><?php echo $ticket['Ticket']['email'];?></td>
						<td><?php echo $ticket['Ticket']['content'];?></td>
						<td><?php echo $ticket['Ticket']['status'];?></td>
						<td><?php echo $ticket['Ticket']['category'];?></td>
						<td><?php echo $ticket['Ticket']['object'];?></td>
						<td><?php echo $ticket['Ticket']['order_id'];?></td>
						<td>
							<a href="#">Update status</a>
						</td>
					</tr>
				<?php
				}
				?>
		</table>
		<table>
			<tr>
				<th>Email</th>
				<th>Content</th>
				<th>Status</th>
				<th>Category</th>
				<th>Objet</th>
				<th>Order_id</th>
			</tr>
			<?php
				foreach ($finished_tickets as $key => $ticket)
				{
					?>
					<tr>
						<td><?php echo $ticket['Ticket']['email'];?></td>
						<td><?php echo $ticket['Ticket']['content'];?></td>
						<td><?php echo $ticket['Ticket']['status'];?></td>
						<td><?php echo $ticket['Ticket']['category'];?></td>
						<td><?php echo $ticket['Ticket']['object'];?></td>
						<td><?php echo $ticket['Ticket']['order_id'];?></td>
						<td>
							<a href="#">Update status</a>
						</td>
					</tr>
				<?php
				}
				?>
		</table>
	</div>
</div>