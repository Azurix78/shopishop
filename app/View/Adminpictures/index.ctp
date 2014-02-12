<div class="container">
	<div class="div">
		<div class="title">Les images</div>
		<?php foreach($pictures as $picture){ ?>
			<div class="brand re-upload">
				<a href="javascript:;" class="actived" data-picture="<?php echo $picture['Picture']['id']; ?>"><b>Cliquer pour uploader une nouvelle image</b></a>
				<img src="/img/files/<?php echo $picture['Picture']['picture']; ?>" alt="">
			</div>
		<?php } ?>
	</div>
</div>
<?php 
	echo $this->Form->create('AdminPicture', array('type' => 'file', 'action' => 'reupload', 'id' => 'form-upload', 'style' => 'display:none'));
	echo $this->Form->input('image_file', array('type' => 'file', 'id' => 'upload'));
	echo $this->Form->end('ReUpload');
?>

<script type="text/javascript" src="/js/pictures.js"></script>