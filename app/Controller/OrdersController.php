<?php
class OrdersController extends AppController
{

	public $uses = array('Orders_user', 'Orders_visitor');

	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}

	public function index()
	{
		
	}
}