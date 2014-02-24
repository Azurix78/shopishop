<?php
class ArticlesController extends AppController
{
	public $uses = array('Article', 'Product');

	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}

	public function index()
	{
		
	}

	public function add($id=null)
	{
		$product = $this->Product->findById($id);
		if (!$product)
		{
			throw new NotFoundException(__('Invalid product'));
		}

		$data['Article'] = $this->request->data['Articles'];
		$data['Article']['name'] = $product['Product']['name'] . ' ' . $data['Article']['size'] . ' ' . $data['Article']['color'];
		$data['Article']['product_id'] = $id;
		$data['Article']['reference'] = strtoupper(preg_replace('/\s+/', '', $data['Article']['name']));

		$this->Article->create;
		if($this->Article->save($data, true))
		{
			$this->Session->setFlash('Article ajouté');
            return $this->redirect(array('controller' => 'AdminProducts', 'action' => 'edit/'.$id));
		}
		else
		{
			$this->Session->setFlash('Informations invalides');
            return $this->redirect(array('controller' => 'AdminProducts', 'action' => 'edit/'.$id));
		}
	}

	public function active($id=null)
	{
		$article = $this->Article->findById($id);
		if (!$article)
		{
			throw new NotFoundException(__('Invalid article'));
		}

		$this->Article->id = $id;
		if($article['Article']['status'] == 1)
		{
			if($this->Article->saveField('status', 0))
			{
				$this->Session->setFlash('Article désactivé');
				return $this->redirect($this->referer());
			}
		}
		elseif($article['Article']['status'] == 0)
		{
			if($this->Article->saveField('status', 1))
			{
				$this->Session->setFlash('Article activé');
				return $this->redirect($this->referer());
			}
		}

		$this->Session->setFlash('Informations invalides');
		return $this->redirect($this->referer());
	}
}