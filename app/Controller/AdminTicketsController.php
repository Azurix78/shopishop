<?php
class AdminTicketsController extends AppController
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

	public function index()
	{
		return $this->set(array('new_tickets' => $this->Ticket->findAllByStatus(0), 'current_tickets' => $this->Ticket->findAllByStatus(1), 'finished_tickets' => $this->Ticket->findAllByStatus(2)));
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