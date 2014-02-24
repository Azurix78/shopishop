<?php
class HomeController extends AppController
{
	public $uses = array('Article');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
	}

	public function index()
	{
		$this->set('random_products', $this->Article->find('all', array( 
		   'conditions' => array('Article.status' => 1), 
		   'order' => 'rand()',
		   'limit' => 3,
		)));
	}
}