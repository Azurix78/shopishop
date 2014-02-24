<?php
class AdminController extends AppController
{
	public $uses = array('User', 'Order', 'Ticket');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->layout = 'admin';
		if( ! $this->isAuthorized($this->Auth->user('Role')['name']))
		{
			$this->Session->setFlash('Vous n\'avez pas les droits nécessaires pour accéder à cette page');
			return $this->redirect($this->Auth->redirectUrl());
		}
	}

    public function index()
    {
    	$users = $this->User->find('count');
    	$orders = $this->Order->find('count');
    	$tickets = $this->Ticket->find('count');

    	$this->set(compact('users', 'orders', 'tickets'));
    }
}