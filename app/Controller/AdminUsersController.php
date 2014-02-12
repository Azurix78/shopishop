<?php
class AdminUsersController extends AppController
{
	public $uses = array('User', 'Role');

	function beforeFilter()
	{
		parent::beforeFilter();
		// $this->Auth->allow('index', 'add', 'edit');
		$this->layout = 'admin';
		if( ! $this->isAuthorized($this->Auth->user('Role')['name']))
		{
			$this->Session->setFlash('Vous n\'avez pas les droits nécessaires pour accéder à cette page');
			return $this->redirect($this->Auth->redirectUrl());
		}
	}

	public function index()
	{
		$users_active = $this->User->find('all', array(
        	'conditions' => array('User.active' => 1)
    		)
    	);

    	$users_inactive = $this->User->find('all', array(
        	'conditions' => array('User.active' => 0)
    		)
    	);

    	if(count($users_active) == 0) $users_active = false;
    	if(count($users_inactive) == 0) $users_inactive = false;

		$this->set(compact('users_active', 'users_inactive'));
	}

	public function edit($id=null)
	{
		$user = $this->User->findById($id);
		if (!$user)
		{
			throw new NotFoundException(__('Invalid user'));
		}
		
		if ($this->request->is('post'))
        {
        	$this->User->id = $id;
        	$data = array();
        	$data['User'] = $this->request->data['AdminUsers'];

			if($this->User->save($data, true))
			{
				$this->Session->setFlash('Utilisateur modifié');
                return $this->redirect(array('controller' => 'AdminUsers', 'action' => 'edit', $id));
			}
			$this->Session->setFlash('Informations invalides');
			return $this->redirect(array('controller' => 'AdminUsers', 'action' => 'edit', $id));
		}

		$data = array();
		$data['AdminUsers'] = $user['User'];
		$data['Role'] = $user['Role'];
		
		if (!$this->request->data)
		{
        	$this->request->data = $data;
    	}

    	$tmp_roles = $this->Role->find('all');
		$roles = array();
		foreach ($tmp_roles as $key => $role)
		{
			$roles[$role['Role']['id']] = $role['Role']['name'];
		}

		if($user['User']['active'] == 1) $is_active = 'désactiver';
		if($user['User']['active'] == 0) $is_active = 'activer';

		$this->set(compact('user', 'roles', 'is_active'));
	}

	public function active($id = null)
	{
		if (!$id)
		{
			throw new NotFoundException(__('Invalid id user'));
		}

		$user = $this->User->findById($id);
		if (!$user)
		{
			throw new NotFoundException(__('Invalid user'));
		}

		$this->User->id = $id;
		if($user['User']['active'] == 1)
		{
			if($this->User->saveField('active', 0))
			{
				$this->Session->setFlash('Utilisateur désactivé');
				return $this->redirect($this->referer());
			}
		}
		elseif($user['User']['active'] == 0)
		{
			if($this->User->saveField('active', 1))
			{
				$this->Session->setFlash('Utilisateur activé');
				return $this->redirect($this->referer());
			}
		}

		$this->Session->setFlash('Erreur lors de la sauvegarde');
		return $this->redirect($this->referer());
	}

	public function password($id=null)
	{
		if (!$id)
		{
			throw new NotFoundException(__('Invalid id user'));
		}

		$user = $this->User->findById($id);

		if (!$user)
		{
			throw new NotFoundException(__('Invalid user'));
		}

		$new_pass = $this->random_char(8);

	    $this->User->id = $id;
	    if($this->User->saveField('password', $new_pass))
		{
			$this->Session->setFlash('Mot de passe modifié');
			if($this->password_email($user['User']['email'], $new_pass))
            {
                return $this->redirect($this->referer());
            }
            $this->Session->setFlash('Erreur lors de l\'envoi du mail');
			return $this->redirect($this->referer());
		}

		$this->Session->setFlash('Erreur lors de modification de mot de passe');
		return $this->redirect($this->referer());
	}

	public function add()
	{
		if ($this->request->is('post'))
        {
        	$data = array();
        	$data['User'] = $this->request->data['AdminUsers'];

        	$data['User']['salt'] = $this->random_char(100);
        	
			$this->User->create();

			if($this->User->save($data, true))
			{
				$this->Session->setFlash('Utilisateur créé');
                return $this->redirect(array('controller' => 'AdminUsers', 'action' => 'add'));
			}
			$this->Session->setFlash('Informations invalides');
		}

		$tmp_roles = $this->Role->find('all');
		$roles = array();
		foreach ($tmp_roles as $key => $role)
		{
			$roles[$role['Role']['id']] = $role['Role']['name'];
		}

		$this->set(compact('users'));
		$this->set(compact('roles'));
	}

	public function test()
	{
		$users = $this->User->find('all');
		debug($users);

		$this->set(compact('users'));
	}
}