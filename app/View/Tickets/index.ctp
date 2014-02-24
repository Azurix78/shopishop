<div class="container">
	<div class="div">
		<div class="ticket">
			<div class="ticket_content">
				<h1 class="object"><?php echo $ticket['object']; ?>
					<h2 class="whoAndWhen"><?php echo 'Par ' . $ticket['email'] . ' le ' . $ticket['created']; ?>
						<p class="content"><?php echo $ticket['content']; ?></p>
					</h2>
				</h1>
			</div>
		</div>
		<?php
		foreach ($messages as $message) {
		?>
		<div class="message">
			<h2 class="whoAndWhen"><?php echo 'Par ' . $message['Message']['email'] . ' le ' . $message['Message']['created']; ?>
				<p class="content"><?php echo $message['Message']['content']; ?></p>
			</h2>
		</div>
		<?php
		}
		?>
	</div>
	<div class="addMessage">
		<h1 class="title_addMessage">Ajouter un message</h1>
		<?php
		echo $this->Form->create('Message');
		echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Votre e-mail'));
		echo $this->Form->input('content', array('label' => false, 'placeholder' => 'Votre message'));
		echo $this->Form->end('Ajouter');
		?>
	</div>
</div>