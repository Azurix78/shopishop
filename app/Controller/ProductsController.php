<?php
class ProductsController extends AppController
{
	public $uses = array('Product','Brand','Category','Picture');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index','category','brands','view', 'search');
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

	public function search(){
		$data = $this->Product->find('all', array('conditions' => array('Product.status' => 1)));
		$brands = $this->Brand->find('all', array('conditions' => array('Brand.status'=> 0)));
		$categories = $this->Category->find('all');
		$post_cat = array();
		$post_brand = array();
		foreach ($brands as $key => $value) {
			if(isset($this->request->data['brand-'.$value['Brand']['id']]))
			{
				$post_brand[$value['Brand']['id']] = $value['Brand']['id'];
			}
		}

		foreach ($categories as $key => $value) {
			if(isset($this->request->data['cat-'.$value['Category']['id']]))
			{
				$post_cat[$value['Category']['id']] = $value['Category']['id'];
			}
		}
		$products = array();
		$q = '';
		if(isset($this->request->data['q'])) $q = $this->request->data['q'];
		foreach ($data as $key => $value) { // description
			if(preg_match('/' . strtolower($q) . '/', strtolower($value['Product']['description'])))
			{
				$products[$value['Product']['id']] = $value;
			}
			if(preg_match('/' . strtolower($q) . '/', strtolower($value['Product']['name'])))
			{
				$products[$value['Product']['id']] = $value;
			}
			if(preg_match('/' . strtolower($q) . '/', strtolower($value['Category']['name'])))
			{
				$products[$value['Product']['id']] = $value;
			}
			if(preg_match('/' . strtolower($q) . '/', strtolower($value['Brand']['name'])))
			{
				$products[$value['Product']['id']] = $value;
			}			
			foreach ($value['Article'] as $key => $val) {
				if(preg_match('/' . strtolower($q) . '/', strtolower($val['reference'])))
				{
					$products[$value['Product']['id']] = $value;
				}
				if(preg_match('/' . strtolower($q) . '/', strtolower($val['color'])))
				{
					$products[$value['Product']['id']] = $value;
				}
			}
		}
		if(count($post_brand) > 0)
		{
			foreach ($products as $key => $value) {
				if(!array_key_exists($value['Brand']['id'], $post_brand)){
					unset($products[$key]);
				}
			}
		}
		if(count($post_cat) > 0)
		{
			foreach ($products as $key => $value) {
				if(!array_key_exists($value['Category']['id'], $post_cat)){
					unset($products[$key]);
				}
			}
		}
		$this->set('q', $q);
		$this->set('post_cat', $post_cat);
		$this->set('post_brand', $post_brand);
		$this->set('products', $products);
	}
}