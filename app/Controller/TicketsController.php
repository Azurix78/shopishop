<?php
class TicketsController extends AppController
{
	public $uses = array('Ticket', 'Message');

	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}

	public function index($status, $id)
	{
		// Si l'ID du ticket est présente et correcte.
		if ($id && is_int($id)) {
			$ticket = $this->Ticket->findById($id);
			if ($ticket == null) {
				$this->Session->setFlash('Ticket inexistant');
				return $this->redirect(array('controller' => 'tickets', 'action' => 'index'));
			}
			$messages = $this->Message->find('all', array('conditions' => array('ticket_id' => $îd)));
			return array('ticket' => $ticket, 'messages' => $messages);
		}
		// Si l'ID du ticket est présente mais incorrecte.
		else if ($id && !is_int($id)) {
			$this->Session->setFlash('Ticket inexistant');
			return $this->redirect(array('controller' => 'tickets', 'action' => 'index');
		}
		// Si le statut est présent et correct.
		else if ($status && in_array($status, array(0, 1, 2))) {
			$tickets = $this->Ticket->find('all', array('conditions' => array('status' => $status)));
			return array('tickets' => $tickets);
		}
		// Si le statut est présent mais incorrect.
		else if ($status && !in_array($status, array(0, 1, 2))) {
			$this->Session->setFlash('Statut de ticket incorrect');
			return $this->redirect(array('controller' => 'tickets', 'action' => 'index'));
		}
		// ID et statut absents.
		else {
			return array('tickets' => $this->Ticket->find('all'));
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