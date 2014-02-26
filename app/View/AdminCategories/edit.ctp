<div class="container">
	<div class="div">
		<div class="title">Modifier la catégorie</div>
		<?php
			echo $this->Form->create('AdminCategories', array('type' => 'file'));
			echo $this->Form->input('name', array('label' => 'Nom', 'value' => $category['Category']['name']));
			echo $this->Form->input('menu_color', array('label' => 'Couleur', 'value' => $category['Category']['menu_color']));
			echo $this->Form->input('image_file', array('label' => 'Image :', 'type' => 'file')); ?>
			<div class="chooseImg">
				<div class='title'>ou choississez parmi les images :</div>
				<?php foreach($pictures as $pic){ ?>
					<img data-id='<?php echo $pic['Picture']['id']; ?>' src="/img/files/<?php echo $pic['Picture']['picture']; ?>">
				<?php } ?>
			</div>
			<input type="hidden" name="img" class="img">
			<?php echo $this->Form->end('Enregistrer');
		?>
	</div>
</div>