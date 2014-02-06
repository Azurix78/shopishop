<?php
class UsersController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('register', 'test');
	}

	public function login()
	{
		
	}

	public function logout()
	{
		
	}

	public function register()
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