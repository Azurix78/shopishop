<?php
class OrdersController extends AppController
{
	public $uses = array('Order','Article','Purchase','Address', 'Promo');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('addToCart', 'cart', 'changeCart', 'commander', 'addressOrder', 'buy', 'promoCode', 'follow');
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
		$purchases = $this->Purchase->find('all', array(
			'conditions' => array('Purchase.order_id' => $id)
		));

		$total = 0;

		foreach ($purchases as $key => $prix)
		{
			$total = $total + $prix['Purchase']['price'];
		}

		$total = number_format($total, 2);
		$this->set(compact('order','purchases', 'total'));
	}

	public function follow($token=null)
	{
		$order = $this->Order->findByToken($token);
		$purchases = $this->Purchase->find('all', array(
			'conditions' => array('Purchase.order_id' => $order['Order']['id'])
		));

		$total = 0;

		foreach ($purchases as $key => $prix)
		{
			$total = $total + $prix['Purchase']['price'];
		}

		$total = number_format($total, 2);
		$this->set(compact('order','purchases', 'total'));
	}

	public function buy()
	{
		$cart = $this->Session->read('cart');

		$data = array();

		$total = 0;
		$poids = 0;

		foreach ($cart['produits'] as $key => $price)
		{
			$total = $total + ($price['Article']['quantity'] * $price['Product']['price']);
		}

		foreach ($cart['produits'] as $key => $weight)
		{
			$poids = $poids + ($weight['Article']['quantity'] * $weight['Article']['weight']);
		}

		if($user = $this->Auth->user())
		{
			$data['email'] = $user['email'];
			$data['token'] = null;
		}
		else
		{
			$data['email'] = $cart['address']['email'];
			$data['token'] = $this->random_char(20);
		}

		$data['firstname'] = $cart['address']['firstname'];
		$data['lastname'] = $cart['address']['lastname'];
		$data['address'] = $cart['address']['address'];
		$data['country'] = $cart['address']['country'];
		$data['zipcode'] = $cart['address']['zipcode'];

		$data['price'] = $total - (($total*$cart['promo']['Promo']['reduction'])/100);
		$data['promo_code'] = $cart['promo']['Promo']['code'];

		$data['total_weight'] = $poids;
		$data['gift_wrap'] = 0;
		$data['status'] = 0;

		$this->Order->create();
		$this->Order->save($data, true);

		$purchases = array();

		foreach ($cart['produits'] as $key => $article)
		{
			$purchases['article_id'] = $article['Article']['id'];
			$purchases['product_id'] = $article['Product']['id'];
			$purchases['picture_id'] = $article['Picture']['id'];
			$purchases['order_id'] = $this->Order->getInsertID();
			$purchases['quantity'] = $article['Article']['quantity'];
			$purchases['price'] = $article['Product']['price'] * $article['Article']['quantity'];
			$this->Purchase->create();
			$this->Purchase->save($purchases, true);

			$q_article = $this->Article->find('first', array(
				'conditions' => array('Article.id' => $article['Article']['id'])
			));

			$this->Article->id = $q_article['Article']['id'];
			$this->Article->saveField('quantity', $q_article['Article']['quantity'] - $purchases['quantity']);
		}

		if(!$this->Session->read('Auth.User'))
		{
			if($this->order_email($data['email'], $data['token']))
			{

			}
		}

		$this->Session->delete('cart');

		$this->Session->setFlash('Commande effectuée','default',array('class'=>'container alert btn-green'));
        return $this->redirect(array('controller' => 'orders', 'action' => 'cart'));

	}

	public function promoCode()
	{
		$this->autoRender = false;
		$promo = $this->request->data;

		$promos = $this->Promo->find('first', array(
			'conditions' => array('Promo.code' => $promo)
		));

		if(count($promos) > 0)
		{
			if(CakeSession::write('cart.promo', $promos))
			{
				echo json_encode(true);
			}
			else
			{
				echo json_encode(false);
			}
		}
		else
		{	
			echo json_encode(false);
		}
	}

	public function commander()
	{
		$cart = $this->Session->read('cart');
		$total = 0;

		foreach ($cart['produits'] as $key => $price)
		{
			$total = $total + ($price['Article']['quantity'] * $price['Product']['price']);
		}

		if($user_id = $this->Auth->user('id'))
		{
			$addresses = $this->Address->find('all', array(
				'conditions' => array('Address.user_id' => $user_id)
			));
		}
		else
		{
			$addresses = false;
		}

		$this->set(compact('cart', 'total', 'addresses'));
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
		//
	}

	public function addressOrder()
	{
		$this->autoRender = false;
		$address = $this->request->data;

		$cart = $this->Session->read('cart');
		if(CakeSession::write('cart.address', $address))
		{
			echo true;
		}
		else
		{
			echo false;
		}
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