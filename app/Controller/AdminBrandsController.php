<?php
class AdminbrandsController extends AppController
{
	public $uses = array('User', 'Picture', 'Brand');

	public function beforeFilter()
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
        $brands = $this->Brand->find('all');
        $this->set('brands', $brands);
    }

	public function add()
	{
		if ($this->request->is('post')) {

            $this->Brand->create();
            if($this->upload($this->request->data['AdminBrands']['image_file']) || isset($this->request->data['img']))
            {
            	$this->request->data['AdminBrands']['picture_id'] = (int) $this->Picture->getInsertID();
                if(!empty($this->request->data['img'])) $this->request->data['AdminBrands']['picture_id'] = $this->request->data['img'];
                if($this->Brand->save($this->request->data['AdminBrands']))
                {
                    $this->Session->setFlash('Marque ajouté','default',array('class'=>'container alert btn-green'));
                    $this->redirect('/adminbrands');
                }
            }
        }
        $this->set('pictures', $this->Picture->find('all', array('conditions' => array('Picture.status' => 0))));
	}

    public function edit($id)
    {
        if (!$id) {
            $this->redirect('/adminbrands/');
        }

        $brand = $this->Brand->findById($id);
        if (!$brand) {
            $this->redirect('/adminbrands/');
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Brand->id = $id;
            if(isset($this->request->data['AdminBrands']['image_file']) && $this->upload($this->request->data['AdminBrands']['image_file']))
            {
                $this->request->data['AdminBrands']['picture_id'] = (int) $this->Picture->getInsertID();
            }

            if(isset($this->request->data['img'])) $this->request->data['AdminBrands']['picture_id'] = $this->request->data['img'];
            if ($this->Brand->save($this->request->data['AdminBrands'])) {
                $this->Session->setFlash('Marque modifiée','default',array('class'=>'container alert btn-green'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash('Impossible de modifié la marque.','default',array('class'=>'container alert btn-red'));

        }

        if (!$this->request->data) {
            $this->request->data = $brand;
        }

        $this->set('brand', $brand);
        $this->set('pictures', $this->Picture->find('all', array('conditions' => array('Picture.status' => 0))));
    }

    public function delete($id)
    {
        if (!$id) {
            $this->redirect('/adminbrands/');
        }

        $brand = $this->Brand->findById($id);
        if (!$brand) {
            $this->redirect('/adminbrands/');
        }

        $this->Brand->id = $id;
        if($brand['Brand']['status'] == 0){
            $this->Brand->saveField('status', 1);
            $this->Session->setFlash('Marque desactivée','default',array('class'=>'container alert btn-red'));
        } else {
            $this->Brand->saveField('status', 0);
            $this->Session->setFlash('Marque activée','default',array('class'=>'container alert btn-green'));
        }

        $this->redirect('/adminbrands/');
    }
}