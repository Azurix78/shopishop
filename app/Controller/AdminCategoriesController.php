<?php
class AdminCategoriesController extends AppController
{
	public $uses = array('Category', 'Picture');

	function beforeFilter()
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
		$result = $this->Category->find('all');
		foreach ($result as $key => $value) {
			$result[$key]['Category']['url_picture'] = $result[$key]['Picture']['picture'];
		}
		$this->set('categories', $result);
	}

	public function add()
	{
		if ($this->request->is('post')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence.
			$d = $this->request->data;
			if ($this->Category->save($d)) {
				$this->Session->setFlash('L\'entrée a bien été ajoutée');
				return $this->redirect(array('controller' => 'admincategories', 'action' => 'index'));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de l\'ajout de l\'entrée');
		}
		$pictures = $this->Picture->find('all', array(
				'fields' => array('picture', 'id'),
			));
		$select_pictures = array();
		foreach ($pictures as $key => $picture)
		{
			$select_pictures[$picture['Picture']['id']] = $picture['Picture']['picture'];
		}
		$this->set('select_pictures', $select_pictures);

	}

	public function edit($id)
	{
		//select Picture
		$pictures = $this->Picture->find('all', array(
			'fields' => array('picture', 'id'),
		));
		$select_pictures = array();
		foreach ($pictures as $key => $picture)
		{
			$select_pictures[$picture['Picture']['id']] = $picture['Picture']['picture'];
		}

		$result = $this->Category->findById($id);
		if ($this->request->is('post') || $this->request->is('put')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence.
			$d = $this->request->data;
			$d['Category']['id'] = $id;
			if ($this->Category->save($d, true, array('name', 'menu_color', 'picture_id'))) {
				$this->Session->setFlash('Les informations ont bien été modifiées');
				return $this->redirect(array('controller' => 'admincategories', 'action' => 'index'));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de la modification des informations');
		}
		$this->data = $result;
		$this->set('category', $result);
		$this->set('select_pictures', $select_pictures);
	}
}