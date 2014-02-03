<?php
class UsersController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('register');
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
			// if($this->request->data['User']['password'] != $this->request->data['User']['password_verify'])
			// {
			// 	return $this->Session->setFlash('Les mots de passe ne correspondent pas');
			// }
			if($this->User->save($this->request->data, true))
			{
				$this->Session->setFlash('Inscription validée');
                return $this->redirect(array('controller' => 'Users', 'action' => 'register'));
			}
			
		}


	}
}