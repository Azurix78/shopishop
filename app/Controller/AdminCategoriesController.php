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
			if($this->upload($this->request->data['AdminCategories']['image_file']) || isset($this->request->data['img']))
            {
            	$this->request->data['AdminCategories']['picture_id'] = (int) $this->Picture->getInsertID();
                if(!empty($d['img'])) $this->request->data['AdminCategories']['picture_id'] = $this->request->data['img'];

                $tab = array();
                $tab['Category'] = $this->request->data['AdminCategories'];
				if ($this->Category->save($tab)) {
					$this->Session->setFlash('L\'entrée a bien été ajoutée');
					return $this->redirect(array('controller' => 'admincategories', 'action' => 'index'));
				} else
					$this->Session->setFlash('Une erreur s\'est produite lors de l\'ajout de l\'entrée');
				}
			}
		$this->set('pictures', $this->Picture->find('all', array('conditions' => array('Picture.status' => 0))));

	}

	public function edit($id)
	{

		$result = $this->Category->findById($id);
		if ($this->request->is('post') || $this->request->is('put')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence.
			$this->Category->id = $id;
			if(isset($this->request->data['AdminCategories']['image_file']) && $this->upload($this->request->data['AdminCategories']['image_file']))
            {
                $this->request->data['AdminCategories']['picture_id'] = (int) $this->Picture->getInsertID();
            }
            if(isset($this->request->data['img'])) $this->request->data['AdminCategories']['picture_id'] = $this->request->data['img'];
            $tab = array();
            $tab['Category'] = $this->request->data['AdminCategories'];
			if ($this->Category->save($tab)) {
				$this->Session->setFlash('Les informations ont bien été modifiées');
				return $this->redirect(array('controller' => 'admincategories', 'action' => 'index'));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de la modification des informations');
		}
		$this->data = $result;
		$this->set('category', $result);
		$this->set('pictures', $this->Picture->find('all', array('conditions' => array('Picture.status' => 0))));
	}
}