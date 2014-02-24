<div class="container">
	<div class="div">
		<div class="title">Commande id : <?php echo $order_id; ?></div>
		<h1>Commandes</h1>
		<ul>
			<li>Email</li>
			<li><?php echo $order['Order']['email'];?></li>
			<br>
			<li>First name</li>
			<li><?php echo $order['Order']['first_name'];?></li>
			<br>
			<li>Last name</li>
			<li><?php echo $order['Order']['last_name'];?></li>
			<br>
			<li>Status</li>
			<li><?php echo $order['Order']['status'];?></li>
			<br>
			<li>Address</li>
			<li><?php echo $order['Order']['address'];?></li>
			<br>
			<li>Zipcode</li>
			<li><?php echo $order['Order']['zipcode'];?></li>
			<br>
			<li>Country</li>
			<li><?php echo $order['Order']['country'];?></li>
			<br>
			<li>Gift wrap</li>
			<li><?php echo $order['Order']['gift_wrap'];?></li>
			<br>
			<li>Promo code</li>
			<li><?php echo $order['Order']['promo_code'];?></li>
			<br>
			<li>Total weight</li>
			<li><?php echo $order['Order']['total_weight'];?></li>
			<br>
			<li>Token</li>
			<li><?php echo $order['Order']['token'];?></li>
			<br>
			<li>
				<a href="#">Archive order</a>
			</li>
		</ul>
	</div>
</div>