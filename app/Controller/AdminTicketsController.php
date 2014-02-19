<?php
class TicketsController extends AppController
{
	public $uses = array('Ticket', 'Message');

	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
		$this->layout = 'admin';
		if( ! $this->isAuthorized($this->Auth->user('Role')['name']))
		{
			$this->Session->setFlash('Vous n\'avez pas les droits nécessaires pour accéder à cette page');
			return $this->redirect($this->Auth->redirectUrl());
		}
	}

	public function index($status, $id)
	{
		// Si le statut est présent et correct.
		if ($status && in_array($status, array(0, 1, 2))) {
			$tickets = $this->Ticket->find('all', array('conditions' => array('status' => $status)));
			return array('tickets' => $tickets);
		}
		// Si le statut est présent mais incorrect.
		else if ($status && !in_array($status, array(0, 1, 2))) {
			$this->Session->setFlash('Statut de ticket incorrect');
			return $this->redirect(array('controller' => 'admintickets', 'action' => 'index'));
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