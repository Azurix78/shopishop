<?php
class ArticlesController extends AppController
{
	public $uses = array('Article', 'Product', 'Picture');

	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('sizeArray');
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
		if($this->upload($this->request->data['Articles']['image_file']) || isset($this->request->data['img']))
        {
        	$data['Article']['picture_id'] = (int) $this->Picture->getInsertID();
            if(!empty($this->request->data['img'])) $data['Article']['picture_id'] = $this->request->data['img'];

			if($this->Article->save($data, true))
			{
				$this->Session->setFlash('Article ajouté','default',array('class'=>'container alert btn-green'));
	            return $this->redirect(array('controller' => 'AdminProducts', 'action' => 'edit/'.$id));
			}
			else
			{
				$this->Session->setFlash('Informations invalides','default',array('class'=>'container alert btn-red'));
	            return $this->redirect(array('controller' => 'AdminProducts', 'action' => 'edit/'.$id));
			}
		}
		return $this->redirect(array('controller' => 'AdminProducts', 'action' => 'edit/'.$id));
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
				$this->Session->setFlash('Article désactivé','default',array('class'=>'container alert btn-green'));
				return $this->redirect($this->referer());
			}
		}
		elseif($article['Article']['status'] == 0)
		{
			if($this->Article->saveField('status', 1))
			{
				$this->Session->setFlash('Article activé','default',array('class'=>'container alert btn-green'));
				return $this->redirect($this->referer());
			}
		}

		$this->Session->setFlash('Informations invalides','default',array('class'=>'container alert btn-red'));
		return $this->redirect($this->referer());
	}

	public function sizeArray()
	{
		$this->autoRender = false;
		$id_product = $this->request->params['pass'][0];
		$color = $this->request->params['pass'][1];
		echo json_encode($articles = $this->Article->find('all', array('conditions' => array('color' => $color, 'product_id' => $id_product))));
	}
}