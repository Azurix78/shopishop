<?php
class OrdersController extends AppController
{
	public $uses = array('Order','Article');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('addToCart', 'cart', 'changeCart');
	}

	public function index()
	{
		$orders = $this->Order->find('all', array(
			'conditions' => array('Order.email' => $this->Auth->user('email'))
		));

		$this->set(compact('orders'));
	}

	public function detail($id=null)
	{
		$order = $this->Order->findById($id);
		$this->set(compact('order'));
	}

	public function addToCart($id)
	{
		$cart = $this->Session->read('cart');
		$produit = $this->Article->find('first', array('conditions' => array('Article.id' => $id)));


		if(isset($cart['produits'])){
			$i = 0;
			foreach($cart['produits'] as $key => $product)
			{
				if($product['Article']['id'] == $id)
				{
					$cart['produits'][$key]['Article']['quantity']++;
					$i++;
				}
			}
			if($i == 0)
			{
				array_push($cart['produits'], $produit);
				foreach ($cart['produits'] as $key => $value) {
					$key = $key;
				}
				$cart['produits'][$key]['Article']['quantity'] = 1;
			}
		}
		else
		{
			$cart['produits'][0] = $produit;
			$cart['produits'][0]['Article']['quantity'] = 1;
		}
		$cart['quantity'] += $produit['Product']['price'];

		$this->Session->write('cart',$cart);
		$this->render('/Orders/cart');
		$this->redirect('/orders/cart');
	}

	public function cart()
	{
		$cart = $this->Session->read('cart');
		$quantity = 0;
		foreach ($cart['produits'] as $key => $value) {
			$quantity += $value['Article']['quantity'] * $value['Product']['price'];
		}
		$this->set('quantity', $quantity);
	}

	public function changeCart($key){
		$this->autoRender = false;
		$quantity = $this->request->data['quantity'];

		$cart = $this->Session->read('cart');
		if(isset($cart['produits'])){
			if(array_key_exists($key, $cart['produits']))
			{
				if($quantity > 0)
				{
					$cart['produits'][$key]['Article']['quantity'] = $quantity;
				}
				else
				{
					unset($cart['produits'][$key]);
				}
				$this->Session->write('cart',$cart);
				echo true;
			}
		}
		echo false;
	}
}