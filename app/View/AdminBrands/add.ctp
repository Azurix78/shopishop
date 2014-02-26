<div class="container">	
	<div class="div">
		<div class="title">Ajouter une marque</div>
	<?php 
		echo $this->Form->create('AdminBrands', array('type' => 'file', 'action' => 'add'));
		echo $this->Form->input('name', array('label' => 'Nom'));
		echo $this->Form->input('email', array('label' => 'Email'));
		echo $this->Form->input('image_file', array('label' => 'Image :', 'type' => 'file')); ?>
		<div class="chooseImg">
			<div class='title'>ou choississez parmi les images :</div>
			<?php foreach($pictures as $pic){ ?>
				<img data-id='<?php echo $pic['Picture']['id']; ?>' src="/img/files/<?php echo $pic['Picture']['picture']; ?>">
			<?php } ?>
		</div>
		<input type="hidden" name="img" class="img">
		<?php echo $this->Form->end('Ajouter');
	?>
	</div>
</div>