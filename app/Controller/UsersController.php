<?php
class UsersController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('register', 'validation');
	}

	public function login() {
	    if ($this->request->is('post'))
	    {
	        if ($this->Auth->login())
	        {
	        	$this->User->id = $this->Auth->user('id');
		        $this->User->saveField('last_ip', $_SERVER['REMOTE_ADDR']);
		        $this->Session->setFlash(
	            	'Bienvenue sur 42 Shop'
	            );
	            return $this->redirect($this->Auth->redirectUrl());
	        }
	        else
	        {
	            $this->Session->setFlash(
	            	'Email ou mot de passe incorrect. Si vous venez de vous inscrire, merci de consulter vos emails afin de valider votre compte.'
	            );
	        }
	    }
	}

	public function logout()
	{
    	$this->redirect($this->Auth->logout());
	}

	public function register()
	{
		if ($this->request->is('post'))
        {
        	$data = $this->request->data;
        	$data['User']['salt'] = $this->random_char(100);
        	$data['User']['last_ip'] = $_SERVER['REMOTE_ADDR'];
			$this->User->create();
			if($this->User->save($data, true))
			{
				$id = $this->User->getInsertID();
				$user = $this->User->findById($id);
				if($this->validation_email($user['User']['email'], $data['User']['salt']))
	            {
					$this->Session->setFlash('Inscription validée ' . $data['User']['salt']);
	                return $this->redirect($this->referer());
	            }
	            $this->Session->setFlash('Erreur lors de l\'envoi du mail');
                return $this->redirect(array('controller' => 'Users', 'action' => 'register'));
			}
            $this->Session->setFlash('Erreur lors de l\'inscription');
		}
	}

	public function validation()
	{
		if(!isset($this->request->params['pass'][0]))
		{
			return $this->redirect(array('controller' => 'Home'));
		}
		$token = $this->request->params['pass'][0];
		$user = $this->User->find(
			'first', 
           	array(
           		'conditions' => array(
	           		'User.salt' => $token, 
	                'User.active' => 0
            	)
            )
        );
		if( ! $user)
		{
			return $this->redirect(array('controller' => 'Home'));
		}
		else
		{
			$this->User->id = $user['User']['id'];
			if($this->User->saveField('active', 1))
			{
				$validation = "Bienvenue " . $user['User']['title'] . $user['User']['lastname'] . " votre compte a été activé. Bienvenue sur 42 Shop !";
			}
		}
		$this->set(compact('validation'));
	}

	public function profil()
	{
		// $user = $this->User->findById($this->Auth->user('id'));
		// debug($user);
	}

	public function edit()
	{
		$user = $this->User->find('first', array(
	        'fields' => array(
	        	'User.id', 
	        	'User.firstname', 
	        	'User.lastname', 
	        	'User.email', 
	        	'User.birthday'
	        ),
	        'conditions' => array(
	        	'User.active' => 1, 
	        	'User.id' => $this->Auth->user('id')
	        )
    	));

		if ($this->request->is('post'))
        {
        	$this->User->id = $this->Auth->user('id');

			if($this->User->save($this->request->data, true))
			{
				$this->Session->setFlash('Compte modifié');
                return $this->redirect(array('controller' => 'Users', 'action' => 'edit'));
			}
			$this->Session->setFlash('Informations invalides');
			return $this->redirect(array('controller' => 'Users', 'action' => 'edit'));
		}

		if (!$this->request->data)
		{
        	$this->request->data = $user;
    	}
	}

	public function password()
	{
		if ($this->request->is('post'))
        {
        	$this->User->id = $this->Auth->user('id');

			if($this->User->save($this->request->data, true))
			{
				$this->Session->setFlash('Mot de passe modifié');
                return $this->redirect(array('controller' => 'Users', 'action' => 'edit'));
			}
			$this->Session->setFlash('Informations invalides');
			return $this->redirect(array('controller' => 'Users', 'action' => 'edit'));
		}
		return $this->redirect(array('controller' => 'Users', 'action' => 'edit'));
	}

	public function active()
	{
		$this->User->id = $this->Auth->user('id');
		if($this->User->saveField('active', 0))
		{
			$this->Session->setFlash('Votre compte est maintenant désactivé');
			$this->redirect($this->Auth->logout());
		}
		$this->Session->setFlash('Erreur lors de la désactivation');
		return $this->redirect(array('controller' => 'Users', 'action' => 'edit'));
	}

	public function test()
	{
	}
}