<?php
class AdminBrandsController extends AppController
{
	public $uses = array('User', 'Picture', 'Brand');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index', 'add');
		$this->layout = 'admin';
	}

    public function index()
    {

    }

	public function add()
	{
		if ($this->request->is('post')) {

            $this->Brand->create();
            if($this->upload($this->request->data['AdminBrands']['image_file']))
            {
            	$this->request->data['AdminBrands']['picture_id'] = (int) $this->Picture->getInsertID();
                if($this->Brand->save($this->request->data['AdminBrands']))
                {
                    $this->Session->setFlash('Marque ajouté');
                    $this->redirect('/adminbrands');
                }
            }
        }
	}
}