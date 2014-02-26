<?php
class AdminpicturesController extends AppController
{
	public $uses = array('Picture');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->layout = 'admin';
		if( ! $this->isAuthorized($this->Auth->user('Role')['name']))
		{
			$this->Session->setFlash('Vous n\'avez pas les droits nécessaires pour accéder à cette page','default',array('class'=>'container alert btn-red'));
			return $this->redirect($this->Auth->redirectUrl());
		}
	}

	public function index()
	{
		$pictures = $this->Picture->find('all');

		$this->set('pictures', $pictures);
	}

	public function reupload($id)
	{
		$this->upload($this->request->data['AdminPicture']['image_file'], $id);
		$this->redirect('/adminpictures');	
	}
}