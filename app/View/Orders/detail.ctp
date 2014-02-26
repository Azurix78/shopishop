<div class="container">
	<div class="div">
		<div class="title">Détail de la commande : #<?php echo $order['Order']['id']; ?></div>
		<div id="ctn-order-items">
			<div class="ctn-order-info">
				<span class="line">Commande effectuée le : <?php echo $order['Order']['created']; ?></span>
				<span class="line">Emballage cadeau : <?php echo ($order['Order']['gift_wrap'] == 1) ? 'Oui' : 'Non' ;?></span>
				<span class="line">
					Status : 
					<?php switch ($order['Order']['status'])
					{
						case 0:
							echo '<span class="status-order label btn-black">En attente</span>';
							break;

						case 1:
							echo '<span class="status-order label btn-blue">En cours</span>';
							break;
						
						case 2:
							echo '<span class="status-order label btn-green">Expédiée</span>';
							break;
					}
					?>
				</span>
			</div>
			<div id="ctn-order-title">
				<div id="title-order-article-name">Article commandés</div><!--
				--><div id="title-order-article-priceUnitaire">Prix unitaire</div><!--
				--><div id="title-order-article-priceTTC">Montant TTC</div>
			</div>
			<?php foreach ($purchases as $key => $purchase)
			{
				?>
					<div class="order-item">
						<div class="order-article-logo">
							<img src="/img/files/<?php echo $purchase['Picture']['picture'] ;?>" alt="img article" />
						</div><!--
						--><div class="order-article-name"><span><?php echo $purchase['Purchase']['quantity']; ?></span> <?php echo $purchase['Product']['name']; ?> <?php echo $purchase['Article']['size']; ?> <?php echo $purchase['Article']['color']; ?></div><!--
						--><div class="order-article-priceUnitaire"><?php echo $purchase['Product']['price']; ?> €</div><!--
						--><div class="order-article-priceTTC"><?php echo $purchase['Purchase']['price']; ?> €</div>
					</div>
				<?php
			}
			?>
			<div class="title order-total">Total de votre commande : <b><?php echo $order['Order']['price']; ?> € TTC</b></div>
		</div>
	</div>
</div>
<script type="text/javascript" src="/js/client-orders.js"></script>