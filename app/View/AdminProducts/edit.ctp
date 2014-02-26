<div class="container">
	<div class="div">
		<div class="title">Modifié <?php echo $product['Product']['name']; ?></div>
			<?php
				echo $this->Form->create('AdminProducts', array('action' => '/edit/'. $product['Product']['id']));
				echo $this->Form->input('name', array('label' => 'Nom'));
				echo $this->Form->input('category_id', array('options' => array($select_categories), 'label' => 'Catégorie'));
				echo $this->Form->input('brand_id', array('options' => array($select_brands), 'label' => 'Marque'));
				echo $this->Form->input('promo_id', array('options' => array($select_promos), 'label' => 'Promotions'));
				echo $this->Form->input('status', array('options' => array(0 => 'Désactivé', 1 => 'Activé'), 'label' => 'Status'));
				echo $this->Form->input('description', array('type' => 'textarea', 'escape'=> true,'label' => 'Description'));
				echo $this->Form->input('price', array('label' => 'Prix'));
				echo $this->Form->input('image_file', array('label' => 'Image :', 'type' => 'file')); ?>
				<div class="chooseImg">
					<div class='title'>ou choississez parmi les images :</div>
					<?php foreach($pictures as $pic){ ?>
						<img data-id='<?php echo $pic['Picture']['id']; ?>' src="/img/files/<?php echo $pic['Picture']['picture']; ?>">
					<?php } ?>
				</div>
				<input type="hidden" name="img" class="img">
				<? echo $this->Form->end('Editer', true);
			?>
	</div>
	<div class="div">
		<div class="title">Ajouter un article à <?php echo $product['Product']['name']; ?></div>
			<?php
				echo $this->Form->create('Articles', array('type' => 'file','action' => '/add/'. $product['Product']['id']));
				echo $this->Form->input('size', array('label' => 'Taille'));
				echo $this->Form->input('color', array('label' => 'Couleur'));
				echo $this->Form->input('quantity', array('type'=>'number', 'label' => 'Quantité'));
				echo $this->Form->input('weight', array('type'=>'number', 'label' => 'Poids'));
				echo $this->Form->input('image_file', array('label' => 'Image :', 'type' => 'file')); ?>
				<div class="chooseImg">
					<div class='title'>ou choississez parmi les images :</div>
					<?php foreach($pictures as $pic){ ?>
						<img data-id='<?php echo $pic['Picture']['id']; ?>' src="/img/files/<?php echo $pic['Picture']['picture']; ?>">
					<?php } ?>
				</div>
				<input type="hidden" name="img" class="img">
				<?php echo $this->Form->end('Ajouter', true);
			?>
	</div>
	<div class="div">
		<div class="title">Article de <?php echo $product['Product']['name']; ?></div>
		<table>
			<th>Nom</th>
			<th>Color</th>
			<th>Quantity</th>
			<th>Actions</th>
			<?php
			foreach ($product['Article'] as $key => $article)
			{
				?>
					<tr>
						<td><?php echo $article['size'] ?></td>
						<td><?php echo $article['color'] ?></td>
						<td><?php echo $article['quantity'] ?></td>
						<td><a class="label btn-red" href="/Articles/active/<?php echo $article['id']; ?>">X Supprimer</a></td>
					</tr>
				<?php
			}
			?>
		</table>
	</div>
</div>