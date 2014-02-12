<?php
class AddressesController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}

	public function index()
	{
		$addresses = $this->Address->find('all', array(
			'conditions' => array(
	        	'Address.user_id' => $this->Auth->user('id'),
	        	'User.active' => 1
        	),
        	'order' => array('Address.created DESC'),
		));
		$this->set(compact('addresses'));
	}
}