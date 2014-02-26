<div class="container">
	<div class="left" style="margin-right:0;">
		<div class="div ciblage">
			<div class="title">Mon profil</div>
			<ul>
				<li>
				<?php
					echo $this->Html->link(
					    'Mes informations',
					    array('controller' => 'Users', 'action' => 'edit')
					); ?>
				</li>
				<li>
					<?php echo $this->Html->link(
					    'Mes adresses',
					    array('controller' => 'Addresses')
					); ?>
				</li>
				<li>
					<?php echo $this->Html->link(
					    'Mes commandes',
					    array('controller' => 'orders')
					);
				?>
				</li>
			</ul>
		</div>
	</div>
	<div class="right">
		<div class="div">
			<div class="title"><div>
		</div>
	</div>
</div>