<?php
class CategoriesController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index', 'add', 'edit');
	}

	public function index()
	{
		$result = $this->Category->find('all');
		$result['Category']['url_picture'] = $result['Picture']['picture'];
		$this->set('categories', $result);
	}

	public function add()
	{
		if ($this->request->is('post')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence
			$d = $this->request->data;
			if ($this->Category->save($d)) {
				$this->Session->setFlash('L\'entrée a bien été ajoutée');
				return $this->redirect(array('controller' => 'promos', 'action' => 'index'));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de l\'ajout de l\'entrée');
		}
	}

	public function edit()
	{
		$result = $this->Category->findById($id);
		if ($this->request->is('post')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence
			$d = $this->request->data;
			$d['Category']['id'] = $id;
			if ($this->Category->save($d, true, array('name', 'menu_color', 'picture_id'))) {
				$this->Session->setFlash('Les informations ont bien été modifiées');
				return $this->redirect(array('controller' => 'promos', 'action' => 'index'));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de la modification des informations');
		}
		$this->set('category', $result);
	}
}