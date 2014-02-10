<?php
class AdminProductsController extends AppController
{
	public $uses = array('Picture', 'Products', ''), $products, $array;

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->layout = 'admin';
		$this->Auth->allow('index');
	}

	public function index()
	{
		if($this->Products->find('count') < 1)
		{
			$this->products = '<div class="alert btn-red">Actuellement, aucun produit n\'est présent dans la base de donnée.</div>';
		}
		else
		{
			$this->products = $this->Products->find('all');
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