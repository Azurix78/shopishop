<?php
class AdminController extends AppController
{
	public $uses = array('User', 'Picture', 'Brand');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->layout = 'admin';
		if( ! $this->isAuthorized($this->Auth->user('Role')['name']))
		{
			$this->Session->setFlash('Vous n\'avez pas les droits nécessaires pour accéder à cette page');
			return $this->redirect($this->Auth->redirectUrl());
		}
	}

    public function index()
    {
    }
}