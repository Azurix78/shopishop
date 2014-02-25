<?php
class ProductsController extends AppController
{
	public $uses = array('Product','Brand','Category','Picture');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index','category','brands','view');
		$brands = $this->Brand->find('all', array('conditions' => array('Brand.status'=> 0)));
		$categories = $this->Category->find('all');
		$this->set('brands', $brands);
		$this->set('categories', $categories);
	}

	public function index()
	{
		//
	}

	public function category()
	{
		if(empty($this->request->params['pass'][1]) || empty($this->request->params['pass'][0])){
			$this->render('/Products/homeCat');
		}
		else
		{
			$cat = $this->Category->find('first', array('conditions' => array('Category.id' => $this->request->params['pass'][1])));
			$products = $this->Product->find('all', array('conditions' => array('Category_id' => $this->request->params['pass'][1],'Product.status'=> 1)));
			$this->set('products', $products);
			$this->set('cat', $cat);
		} 
	}

	public function all()
	{
			$products = $this->Product->find('all', array('conditions' => array('Product.status'=> 1)));
			$this->set('products', $products);
	}

	public function brands()
	{
		if(empty($this->request->params['pass'][1]) || empty($this->request->params['pass'][0])){
			$this->render('/Products/homeBrands');
		}
		else
		{
			$products = $this->Product->find('all', array('conditions' => array('brand_id' => $this->request->params['pass'][1],'Product.status'=> 1)));
			$this->set('products', $products);
		} 
	}

	public function view($id)
	{
		if(empty($id)){
			$this->redirect('/product');
		}
		else
		{
			$product = $this->Product->find('first', array('conditions' => array('Product.id' => $id)));
			$color = array();
			foreach ($product['Article'] as $key => $value) {
				if(!array_key_exists($value['color'], $color))
				{
					$color[$value['color']] = $value['id'];
				}
			}
			$this->set('product', $product);
			$this->set('color', $color);
		} 
	}
}