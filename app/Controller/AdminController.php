<?php
class AdminController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
		$this->layout = 'admin';
	}

	public function index()
	{
		
	}
}