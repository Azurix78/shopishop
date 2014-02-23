<div class="container">
	<div class="div">
		<div class="title">Liste des utilisateurs</div>
		<h1>Utilisateurs actifs</h1>
		<table>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Civilité</th>
				<th>Email</th>
				<th>Dernière IP</th>
				<th>Rôle</th>
				<th>Mis à jour le</th>
				<th><th>
			</tr>
			<?php
			if($users_active)
			{
				foreach ($users_active as $key => $user)
				{
					?>
					<tr>
						<td><?php echo $user['User']['lastname'];?></td>
						<td><?php echo $user['User']['firstname'];?></td>
						<td><?php echo $user['User']['title'];?></td>
						<td><?php echo $user['User']['email'];?></td>
						<td><?php echo $user['User']['last_ip'];?></td>
						<td><?php echo $user['Role']['name'];?></td>
						<td><?php echo $user['User']['updated'];?></td>
						<td>
							<?php
								echo $this->Html->link(
								    'Désactiver',
								    array('controller' => 'AdminUsers', 'action' => 'active', $user['User']['id']),
								    array('class' => 'btn btn-red'),
								    "Êtes vous sur de vouloir désactiver le compte de " . $user['User']['title'] . $user['User']['lastname']
								);
								echo $this->Html->link(
								    'Editer',
								    array('controller' => 'AdminUsers', 'action' => 'edit', $user['User']['id']),
								    array('class' => 'btn btn-blue')
								);
							?>
						</td>
					</tr>
					<?
				}
			}
			else
			{
				?>
					<tr><td colspan="10">Aucun d'utilisateur actif</td></tr>
				<?php
			}
			?>
		</table>
		<h1>Utilisateurs inactifs</h1>
		<table>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Civilité</th>
				<th>Email</th>
				<th>Dernière IP</th>
				<th>Role</th>
				<th>Mis à jour le</th>
				<th><th>
			</tr>
			<?php
			if($users_inactive)
			{
				foreach ($users_inactive as $key => $user)
				{
					?>
					<tr>
						<td><?php echo $user['User']['lastname'];?></td>
						<td><?php echo $user['User']['firstname'];?></td>
						<td><?php echo $user['User']['title'];?></td>
						<td><?php echo $user['User']['email'];?></td>
						<td><?php echo $user['User']['last_ip'];?></td>
						<td><?php echo $user['Role']['name'];?></td>
						<td><?php echo $user['User']['updated'];?></td>
						<td>
							<?php
								echo $this->Html->link(
								    'Activer',
								    array('controller' => 'AdminUsers', 'action' => 'active', $user['User']['id']),
								    array('class' => 'btn btn-green'),
								    "Êtes vous sur de vouloir activer le compte de " . $user['User']['title'] . $user['User']['lastname']
								);
								echo $this->Html->link(
								    'Editer',
								    array('controller' => 'AdminUsers', 'action' => 'edit', $user['User']['id']),
								    array('class' => 'btn btn-blue')
								);
							?>
						</td>
					</tr>
					<?
				}
			}
			else
			{
				?>
					<tr><td colspan="10">Aucun d'utilisateur inactif</td></tr>
				<?php
			}
			?>
		</table>
	</div>
</div>