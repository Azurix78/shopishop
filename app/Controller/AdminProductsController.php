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

		//select Picture
		$pictures = $this->Picture->find('all', array(
			'fields' => array('picture', 'id'),
		));
		$select_pictures = array();
		foreach ($pictures as $key => $picture)
		{
			$select_pictures[$picture['Picture']['id']] = $picture['Picture']['picture'];
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

		$this->set(compact('select_pictures', 'select_categories', 'select_brands', 'select_promos'));
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

		//select Picture
		$pictures = $this->Picture->find('all', array(
			'fields' => array('picture', 'id'),
		));
		$select_pictures = array();
		foreach ($pictures as $key => $picture)
		{
			$select_pictures[$picture['Picture']['id']] = $picture['Picture']['picture'];
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

		$this->set(compact('product', 'select_pictures', 'select_categories', 'select_brands', 'select_promos'));
	}
}