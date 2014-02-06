<?php
class MessagesController extends AppController
{

	public $uses = array('Messages_user', 'Messages_visitor');

	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}

	function test()
	{
		// Pour vos tests
	}
}