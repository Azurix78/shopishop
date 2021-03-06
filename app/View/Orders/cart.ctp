<div class="div cart">
	<div class="title">Panier</div>
	<table>
		<tr>
			<th class="apercu">Photo</th>
			<th>Nom</th>
			<th>Color</th>
			<th>Taille</th>
			<th>Prix à l'unité</th>
			<th>Quantité</th>
			<th>Total</th>
		</tr>
		<?php 
		if(count($this->Session->read('cart')['produits']) > 0){
			foreach($this->Session->read('cart')['produits'] as $key => $produit){ ?>
			<tr>
				<td class="apercu"><img src="/img/files/<?php echo $produit['Picture']['picture']; ?>" alt=""></td>
				<td><?php echo $produit['Product']['name']; ?></td>
				<td><?php echo $produit['Article']['color']; ?></td>
				<td><?php echo $produit['Article']['size']; ?></td>
				<td><b class="unit"><?php echo $produit['Product']['price']; ?> €</b></td>
				<td>
					<input type="number" class="small-input produitQuantity" value="<?php echo $produit['Article']['quantity']; ?>" data-key="<?php echo $key; ?>">
				</td>
				<td class="tot"><?php echo $produit['Article']['quantity'] * $produit['Product']['price']; ?> €</td>
			</tr>
		<?php }
			} else { ?>
				<tr>
					<td colspan="7" style="text-align:center">Votre panier est vide</td>
				</tr>
			<?php } ?>
		
	</table>
</div>
<div class="div total" style="overflow:hidden">
	<p>
		<span class="pull-right">Total de votre commande : <b><?php echo $quantity; ?> €</b></span>
		<?php if($quantity > 0){ ?>
			<span class="pull-left"><a href="/orders/commander" class="btn label-warning">Poursuivre la commande</a></span>
		<?php } ?>
	</p>
</div>
<script type="text/javascript" src="/js/view-products.js"></script>