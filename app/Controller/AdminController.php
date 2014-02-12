<?php
class AdminController extends AppController
{
	public $uses = array('User', 'Picture', 'Brand');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
		$this->layout = 'admin';
	}

    public function index()
    {
    }
}