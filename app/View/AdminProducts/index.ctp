<div class="container">
	<div class="div">
		<div class="title">Liste des produits</div>
			<?php
				echo (!is_array($products)) ? $products : '';
			?>
	</div>
</div>