<?php
class TicketsController extends AppController
{
	public $uses = array('Ticket', 'Message');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function index($id = null)
	{
		// Si l'ID du ticket est présente et correcte.
		if ($id && is_int(intval($id))) {
			$ticket = $this->Ticket->findById($id);
			if ($ticket == null) {
				$this->Session->setFlash('Ticket inexistant');
				return $this->redirect(array('controller' => 'orders', 'action' => 'index'));
			}
			$messages = $this->Message->find('all', array('conditions' => array('ticket_id' => $id)));
			$this->set(array('ticket' => $ticket['Ticket'], 'messages' => $messages));
		}
		// Si l'ID du ticket est présente mais incorrecte.
		else if ($id && !is_int(intval($id))) {
			$this->Session->setFlash('Ticket inexistant');
			return $this->redirect(array('controller' => 'orders', 'action' => 'index'));
		}
		// ID absente.
		else {
			return $this->redirect(array('controller' => 'orders', 'action' => 'index'));
		}
		// Si ajout d'un message au ticket.
		if ($this->request->is('post') || $this->request->is('put')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence.
			$d = $this->request->data;
			var_dump($d);
			$d['Message']['ticket_id'] = $id;
			$d['Message']['staff'] = $this->Auth->user('role') ? $this->Auth->user('role') % 2 : 0; // -----> Super ternaire qui déchire ta race !!
			if ($this->Message->save($d, true, array('ticket_id', 'email', 'content', 'staff'))) {
				$this->Session->setFlash('Le message a bien été ajoutée');
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de l\'ajout du message');
			return $this->redirect(array('controller' => 'tickets', 'action' => 'index', $id));
		}
	}

	public function add($id = null)
	{
		if (!$id || !is_int(intval($id)))
			$this->redirect(array('controller' => 'orders', 'action' => 'index'));
		if ($this->request->is('post') || $this->request->is('put')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence.
			$d = $this->request->data;
			if ($this->Order->findById($id) == null)
				return $this->redirect(array('controller' => 'orders', 'action' => 'index'));
			$d['Ticket']['order_id'] = $id;
			if ($this->Ticket->save($d, true, array('email', 'content', 'category', 'object', 'order_id'))) {
				$this->Session->setFlash('Le ticket a bien été ajoutée');
				return $this->redirect(array('controller' => 'tickets', 'action' => 'index', $this->Ticket->getLastInsertID()));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de l\'ajout du ticket');
		}
	}

	// Cette fonction est prévue pour être appelée par une requête AJAX et renvoie donc du JSON.
	public function updateStatus()
	{
		if ($this->request->is('post')) {
			$d = $this->request->data;
			if ($this->Ticket->save($d, true, array('status'))) {
				echo $this->Ticket->returnStatus(0, "Le statut a bien été mis à jour");
			} else {
				echo $this->Ticket->returnStatus(1, "La mise à jour du statut n'a pas pu être effectuée");
			}
		}
	}
}