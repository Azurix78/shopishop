<?php
class OrdersController extends AppController
{
	public $uses = array('Order','Article','Purchase','Address');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('addToCart', 'cart', 'changeCart', 'commander', 'addressOrder', 'buy');
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

	public function buy()
	{
		$cart = $this->Session->read('cart');

		// id	int(11)			Non	Aucune	AUTO_INCREMENT	 Modifier	 Supprimer	 Affiche les valeurs distinctes	Primaire	 Unique	 Index	Spatial	Texte entier
	 // 2	email	varchar(255)	utf8_general_ci		Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 3	firstname	varchar(255)	utf8_general_ci		Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 4	lastname	varchar(255)	utf8_general_ci		Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 5	status	int(11)			Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 6	address	varchar(255)	utf8_general_ci		Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 7	price	decimal(18,2)			Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 8	zipcode	varchar(255)	utf8_general_ci		Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 9	country	varchar(255)	utf8_general_ci		Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 10	gift_wrap	int(11)			Non	0		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 11	promo_code	varchar(255)	utf8_general_ci		Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 12	total_weight	int(11)			Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 13	created	datetime			Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 14	udpated	datetime			Non	Aucune		 Modifier	 Supprimer	 Affiche les valeurs distinctes	 Primaire	 Unique	 Index	Spatial	Texte entier
	 // 15	token	varchar(255)	u

		$data = array();

		$total = 0;
		$poids = 0;

		foreach ($cart['produits'] as $key => $price)
		{
			$total = $total + ($price['Article']['quantity'] * $price['Product']['price']);
		}

		if($user = $this->Auth->user())
		{
			$data['email'] = $user['email'];
			$data['token'] = null;
		}
		else{
			$data['email'] = $cart['address']['email'];
			$data['token'] = $this->random_char(20);
		}
			$data['firstname'] = $cart['address']['firstname'];
			$data['lastname'] = $cart['address']['lastname'];
			$data['address'] = $cart['address']['address'];
			$data['country'] = $cart['address']['country'];
			$data['zipcode'] = $cart['address']['zipcode'];

			$data['price'] = $total;
			$data['promo_code'] = '';

			$data['total_weight'] = 
			$data['gift_wrap'] = 0;
			$data['status'] = 0;

		// $this->Order->create();
		// $this->Order->save
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