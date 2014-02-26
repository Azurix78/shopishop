<div class="container">
	<div class="div tunnel-ctn">
		<div id="recap-ariane" class="tunnel tunnel-pass">Panier</div><!--
		--><div id="livraison-ariane" class="tunnel tunnel-current">Livraison</div><!--
		--><div id="paiement-ariane" class="tunnel">Paiement</div><!--
		--><div id="fin-ariane" class="tunnel">Fin de commande</div>
	</div>

	<div class="div" id="livraison-order">
		<div class="title">Vos Coordonnées</div>
		<?php
		if($addresses)
		{
			foreach ($addresses as $key => $address)
			{
				?>
					<div
					class="address-item" 
					data-firstname="<?php echo $address['Address']['firstname']; ?>"
					data-lastname="<?php echo $address['Address']['lastname']; ?>"
					data-address="<?php echo $address['Address']['address']; ?>"
					data-zipcode="<?php echo $address['Address']['zipcode']; ?>"
					data-country="<?php echo $address['Address']['country']; ?>"
					style="cursor: pointer;"
					>
						<div class="address-text">
							<div class="address-name">
								<?php echo $address['Address']['firstname']; ?> <?php echo $address['Address']['lastname']; ?>
							</div>
							<div class="address-address"><?php echo $address['Address']['address']; ?></div>
							<div class="address-zipcode"><?php echo $address['Address']['zipcode']; ?></div>
							<div class="address-country"><?php echo $address['Address']['country']; ?></div>
						</div><!--
						--><div class="address-pannel">
							Choisir
						</div>
					</div>
				<?php
			}
		}
		?>
			<div id="order-address-ctn">
				<?php
				if($this->Session->read('Auth.User'))
				{
					?>
						<input type="email" id="order-address-email" style="display:none;" value="<?php echo AuthComponent::user('email'); ?>">
					<?php
				}
				else
				{
					echo $this->Form->input('email', array('label' => 'email', 'id' => 'order-address-email', 'required' => 'required', 'type' => 'email'));
				}
				echo $this->Form->input('lastname', array('label' => 'Nom', 'id' => 'order-address-lastname', 'required' => 'required'));
				echo $this->Form->input('firstname', array('label' => 'Prénom', 'id' => 'order-address-firstname', 'required' => 'required'));
				echo $this->Form->input('address', array('label' => 'Adresse', 'type' => 'text', 'id' => 'order-address-address', 'required' => 'required'));
				echo $this->Form->input('zipcode', array('label' => 'Code postal', 'id' => 'order-address-zipcode', 'required' => 'required'));
				echo $this->Form->input('country', array('label' => 'Pays', 'id' => 'order-address-country', 'required' => 'required'));
				?>
			</div>
		<div>
			<button id="livraison-order-next" class="btn btn-blue">Suivant</button>
		</div>
	</div>


	<div class="div" id="paiement-order" style="display:none;">
		<div class="title">Mode de Paiement</div>
			<div class="title" style="text-align: center;">Total de votre commande : <b><?php echo $total; ?> € TTC</b></div>
			<div class="paiement-item" id="NO-paiement">
				<input type="radio" name="paiement-mode" value="NO" checked> À la livraison
			</div>
			<div class="paiement-item" id="CB-paiement">
				<input type="radio" name="paiement-mode" value="CB"> <img src="/img/visa-56.png" alt="visa">
			</div>
			<div id="CB">
				<?php echo $this->Form->input('cb-num', array('label' => 'Numéro de la carte', 'id' => 'order-cb-num', 'required' => 'required')); ?>
				<?php echo $this->Form->input('cb-crypto', array('label' => 'Cryptogramme visuel', 'id' => 'order-cb-crypto', 'required' => 'required')); ?>
			</div>
			<div class="order-code-promo">
				<?php echo $this->Form->input('code_promo', array('label' => 'Code Pormo', 'id' => 'order-paiement-promo', 'required' => 'required'));?>
				<button id="check-promo-code" class="btn btn-black">Vérifier</button>
			</div>
		<div>
			<button id="paiement-order-next" class="btn btn-blue">Suivant</button>
		</div>
	</div>
	
	<div class="div" id="recap-order" style="display:none;">
		<div class="title">Récapitulatif de votre commande</div>
		<div id="ctn-order-items">
			<div id="ctn-order-title">
				<div id="title-order-article-name">Article commandés</div><!--
				--><div id="title-order-article-priceUnitaire">Prix unitaire</div><!--
				--><div id="title-order-article-priceTTC">Montant TTC</div>
			</div>
			<div id="ctn-order-item">
			<?php foreach ($cart['produits'] as $key => $purchase)
			{
				?>
					<div class="order-item">
						<div class="order-article-logo">
							<img src="/img/files/<?php echo $purchase['Picture']['picture'] ;?>" alt="img article" />
						</div><!--
						--><div class="order-article-name"><span><?php echo $purchase['Article']['quantity']; ?></span> <?php echo $purchase['Product']['name']; ?> <?php echo $purchase['Article']['size']; ?> <?php echo $purchase['Article']['color']; ?></div><!--
						--><div class="order-article-priceUnitaire"><?php echo $purchase['Product']['price']; ?> €</div><!--
						--><div class="order-article-priceTTC"><?php echo $purchase['Product']['price'] * $purchase['Article']['quantity']; ?> €</div>
					</div>
				<?php
			}
			?>
			</div>
			<div class="title order-total">Total de votre commande : <b><?php echo $total; ?> € TTC</b></div>
		</div>
		<div>
			<a href="/orders/buy" class="btn btn-green">Commander</a>
		</div>
	</div>

</div>
<script type="text/javascript" src="/js/client-orders.js"></script>