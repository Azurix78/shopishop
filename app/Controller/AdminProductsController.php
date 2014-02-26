<?php
class AdminProductsController extends AppController
{
	public $uses = array('Product', 'Category', 'Picture', 'Brand', 'Promo', 'Article');

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
		$products = $this->Product->find('all');
		(count($products) == 0) ? $products : false;

		$this->set('products', $products);
	}

	public function add()
	{
		//select Category
		$categories = $this->Category->find('all', array(
			'fields' => array('name', 'id'),
		));
		$select_categories = array();
		foreach ($categories as $key => $category)
		{
			$select_categories[$category['Category']['id']] = $category['Category']['name'];
		}

		

		//select Brand
		$brands = $this->Brand->find('all', array(
			'fields' => array('name', 'id'),
		));
		$select_brands = array();
		foreach ($brands as $key => $brand)
		{
			$select_brands[$brand['Brand']['id']] = $brand['Brand']['name'];
		}

		//select Promo
		$promos = $this->Promo->find('all', array(
			'fields' => array('name', 'id'),
		));
		$select_promos = array();
		foreach ($promos as $key => $promo)
		{
			$select_promos[$promo['Promo']['id']] = $promo['Promo']['name'];
		}

		if ($this->request->is('post'))
        {
        	if($this->upload($this->request->data['AdminProducts']['image_file']) || isset($this->request->data['img']))
            {
            	$this->request->data['AdminProducts']['picture_id'] = (int) $this->Picture->getInsertID();
                if(!empty($this->request->data['img'])) $this->request->data['AdminProducts']['picture_id'] = $this->request->data['img'];

				$data = array();
	        	$data['Product'] = $this->request->data['AdminProducts'];

				if($this->Product->save($data, true))
				{
					$this->Session->setFlash('Produit ajouté', 'default', array('class' => 'alert btn-green'));
					$id = $this->Product->getInsertID();
	                return $this->redirect(array('controller' => 'AdminProducts', 'action' => 'edit/'. $id));
				}
				$this->Session->setFlash('Informations invalides', 'default', array('class' => 'alert btn-red'));
			}
		}
		$pictures = $this->Picture->find('all', array('conditions' => array('Picture.status' => 0)));
		$this->set(compact('pictures', 'select_categories', 'select_brands', 'select_promos'));
	}

	public function edit($id=null)
	{
		$product = $this->Product->findById($id);
		if (!$product)
		{
			throw new NotFoundException(__('Invalid user'));
		}

		//select Category
		$categories = $this->Category->find('all', array(
			'fields' => array('name', 'id'),
		));
		$select_categories = array();
		foreach ($categories as $key => $category)
		{
			$select_categories[$category['Category']['id']] = $category['Category']['name'];
		}

		//select Brand
		$brands = $this->Brand->find('all', array(
			'fields' => array('name', 'id'),
		));
		$select_brands = array();
		foreach ($brands as $key => $brand)
		{
			$select_brands[$brand['Brand']['id']] = $brand['Brand']['name'];
		}

		//select Promo
		$promos = $this->Promo->find('all', array(
			'fields' => array('name', 'id'),
		));
		$select_promos = array();
		foreach ($promos as $key => $promo)
		{
			$select_promos[$promo['Promo']['id']] = $promo['Promo']['name'];
		}

		if ($this->request->is('post'))
        {
        	if(isset($this->request->data['AdminProducts']['image_file']) && $this->upload($this->request->data['AdminProducts']['image_file']))
            {
                $this->request->data['AdminProducts']['picture_id'] = (int) $this->Picture->getInsertID();
            }
            if(isset($this->request->data['img'])) $this->request->data['AdminProducts']['picture_id'] = $this->request->data['img'];
        	$this->Product->id = $id;
			$data = array();
        	$data['Product'] = $this->request->data['AdminProducts'];

			if($this->Product->save($data, true))
			{
				$this->Session->setFlash('Produit modifié', 'default', array('class' => 'alert btn-green'));
                return $this->redirect(array('controller' => 'AdminProducts', 'action' => 'edit/'.$id));
			}
			$this->Session->setFlash('Informations invalides', 'default', array('class' => 'alert btn-red'));
		}

		$data = array();
		$data['AdminProducts'] = $product['Product'];
		
		if (!$this->request->data)
		{
        	$this->request->data = $data;
    	}
    	$pictures = $this->Picture->find('all', array('conditions' => array('Picture.status' => 0)));
		$this->set(compact('product', 'pictures', 'select_categories', 'select_brands', 'select_promos'));
	}
}