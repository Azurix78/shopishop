<?php
class AdminProductsController extends AppController
{
	public $uses = array('Products'), $products;

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->layout = 'admin';
	}

	public function index()
	{
		if($this->Products->find('count') < 1)
		{
			$this->products = '<div class="alert btn-red">Actuellement, aucun produit n\'est présent dans la base de donnée.</div>';
		}
		else
		{
			$this->products = $this->Products->find('all', array(
					'fields' => '*',
					'joins' => array(
						array(
							'table' => 'categories',
							'type' => 'LEFT',
							'conditions' => array('Products.category_id = Categories.id')						
						),
						array(
							'table' => 'pictures',
							'type' => 'LEFT',
							'conditions' => array('Products.picture_id = Pictures.id')						
						),
						array(
							'table' => 'brands',
							'type' => 'LEFT',
							'conditions' => array('Products.brand_id = Brands.id')						
						),
						array(
							'table' => 'promos',
							'type' => 'LEFT',
							'conditions' => array('Products.promo_id = Promos.id')						
						)
					)
				)
			);
		}

		$this->set('products', $this->products);
	}

	public function add()
	{
		// Vérification de formulaire, puis ajout dans la base de donnée.
	}

	public function edit()
	{
		// Edition d'un produit, puis update dans la base de donnée.
	}
}