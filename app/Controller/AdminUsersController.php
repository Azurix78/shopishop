<?php
class AdminUsersController extends AppController
{
	public $uses = array('User');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index', 'add', 'edit');
	}

	public function index()
	{
		$users = $this->User->find('all');
		$this->set(compact('users'));
	}

	public function add()
	{
		if ($this->request->is('post'))
        {
			$this->User->create();
			if($this->User->save($this->request->data, true))
			{
				$this->Session->setFlash('Inscription validée');
                return $this->redirect(array('controller' => 'Users', 'action' => 'register'));
			}
		}
	}

	public function edit()
	{
		if ($this->request->is('post'))
        {
			$this->User->create();
			if($this->User->save($this->request->data, true))
			{
				$this->Session->setFlash('Inscription validée');
                return $this->redirect(array('controller' => 'Users', 'action' => 'register'));
			}
		}
	}

	public function test()
	{
		$users = $this->User->find('all');
		debug($users);

		$this->set(compact('users'));
	}
}