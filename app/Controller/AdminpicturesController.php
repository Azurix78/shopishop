<?php
class AdminpicturesController extends AppController
{
	public $uses = array('Picture');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index','reupload');
		$this->layout = 'admin';
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