<?php
class OrdersController extends AppController
{

	public $uses = array();

	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}

	public function index()
	{
		$orders = $this->Order->find('all', array(
			'conditions' => array('Order.email' => $this->Auth->user('email'))
		));

		$this->set(compact('orders'));
	}

	public function detail($id=null)
	{
		$order = $this->Order->findById($id);
		$this->set(compact('order'));
	}
}