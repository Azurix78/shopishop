<?php
class TicketsController extends AppController
{
	public $uses = array('Tickets_user', 'Tickets_visitor');

	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}

	public function index()
	{
		
	}
}