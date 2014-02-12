<div class="container">
	<div class="div">
		<div class="title">Les marques présentes sur le site</div>
		<?php foreach($brands as $brand){ ?>
			<div class="brand <?php if($brand['Brand']['status'] == 1) echo 'desactive'; ?>">
				<?php if($brand['Brand']['status'] == 1){?>
					<a href="/adminbrands/delete/<?php echo $brand['Brand']['id']; ?>" class="actived"><b>Cliquer pour ré-activer</b></a>
				<?php } ?>
				<img src="/img/files/<?php echo $brand['Picture']['picture']; ?>" alt="">
				<div>
					<?php echo $brand['Brand']['name']; ?>
					<div class="btn-mult pull-right">
						<a href="mailto:<?php echo $brand['Brand']['email']; ?>" class="btn btn-action btn-blue"><i class="icon-envelope icon-white"></i>Mail</a>
						<a href="/adminbrands/edit/<?php echo $brand['Brand']['id']; ?>" class="btn btn-action"><i class="icon-pencil icon-white"></i>Edit</a>
						<a href="/adminbrands/delete/<?php echo $brand['Brand']['id']; ?>" class="btn btn-action btn-red"><i class="icon-remove icon-white"></i>Delete</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>