<?php
class HomeController extends AppController
{
	public $uses = array('Product');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function index()
	{
		$this->set('random_products', $this->Product->find('all', array( 
		   'conditions' => array('Product.status' => 1), 
		   'order' => 'rand()',
		   'limit' => 3,
		)));
	}
}