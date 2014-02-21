<?php
class AdminOrdersController extends AppController
{
	public $uses = array('Order');

	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow();
		$this->layout = 'admin';
		if( ! $this->isAuthorized($this->Auth->user('Role')['name']))
		{
			$this->Session->setFlash('Vous n\'avez pas les droits nécessaires pour accéder à cette page');
			return $this->redirect($this->Auth->redirectUrl());
		}
	}

	public function index($status = null, $id = null)
	{
		// Si le statut est présent et correct.
		if ($status !== null && in_array($status, array(0, 1, 2))) {
			$orders = $this->Order->find('all', array('conditions' => array('status' => $status)));
			return $this->set(array('orders' => $orders));
		}
		// Si le statut est présent mais incorrect.
		else if ($status !== null && !in_array($status, array(0, 1, 2))) {
			$this->Session->setFlash('Statut de commande incorrect');
			return $this->redirect(array('controller' => 'adminorders', 'action' => 'index'));
		}
		// Statut absent.
		else {
			return $this->set(array('orders' => $this->Order->find('all')));
		}
	}

	public function q($id)
	{
		// ID absente.
		if (!$id) {
			return $this->redirect(array('controller' => 'adminorders', 'action' => 'index'));
		}
		// Si l'ID est présente et correcte.
		else if ($id && is_int(intval($id))) {
			$order = $this->Order->findById($id);
			if ($order == null) {
				$this->Session->setFlash('Commande inexistante');
				return $this->redirect(array('controller' => 'adminorders', 'action' => 'index'));
			}
			return $this->set(array('order_id' => $id, 'order' => $order));
		}
		// Si l'ID est présente mais incorrecte.
		else if ($id && !is_int(intval($id))) {
			$this->Session->setFlash('Commande inexistante');
			return $this->redirect(array('controller' => 'adminorders', 'action' => 'index'));
		}
	}
}