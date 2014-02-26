<?php
class AddressesController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}

	public function index()
	{
		$addresses = $this->Address->find('all', array(
			'conditions' => array(
	        	'Address.user_id' => $this->Auth->user('id'),
	        	'User.active' => 1
        	),
        	'order' => array('Address.created DESC'),
		));
		$this->set(compact('addresses'));
	}

	public function add()
	{
		if ($this->request->is('post'))
        {
        	$data = $this->request->data;
        	$data['Address']['user_id'] = $this->Auth->user('id');

			$this->Address->create();
			if($this->Address->save($data, true))
			{
				$this->Session->setFlash('Adresse rajoutée aux favoris','default',array('class'=>'container alert btn-green'));
                return $this->redirect(array('controller' => 'Addresses', 'action' => 'index'));
            }
            $this->Session->setFlash('Informations invalides','default',array('class'=>'container alert btn-red'));
            return $this->redirect(array('controller' => 'Addresses', 'action' => 'index'));
		}
	}

	public function del($id=null)
	{
		$address = $this->Address->findById($id);
		if (!$address)
		{
			throw new NotFoundException(__('Invalid address'));
		}

		if($this->Auth->user('id') == $address['Address']['user_id'])
		{
			if($this->Address->delete($id))
			{
				$this->Session->setFlash('Adresse effacée','default',array('class'=>'container alert btn-green'));
				return $this->redirect(array('controller' => 'Addresses', 'action' => 'index'));
			}
		}
		$this->Session->setFlash('Informations invalides','default',array('class'=>'container alert btn-red'));
		return $this->redirect(array('controller' => 'Addresses', 'action' => 'index'));
	}
}