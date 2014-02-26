<?php
class AdminPromosController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		// $this->Auth->allow();
		$this->layout = 'admin';
		if( ! $this->isAuthorized($this->Auth->user('Role')['name']))
		{
			$this->Session->setFlash('Vous n\'avez pas les droits nécessaires pour accéder à cette page','default',array('class'=>'container alert btn-red'));
			return $this->redirect($this->Auth->redirectUrl());
		}
	}

	public $uses = array('Promo');

	public function index($status = 1)
	{
		$result = ($status == 1) ? $this->Promo->find('all', array('conditions' => array('DATEDIFF(`limit_date`, CURRENT_DATE()) >=' => '0'))) : $this->Promo->find('all', array('conditions' => array('DATEDIFF(`limit_date`, CURRENT_DATE()) <' => '0')));
		// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Ajoute au résultat un array contenant la date en BDD ET la date en "plus naturel" : resultat['limit_date'] = ['orginal' => 'AAAA-MM-JJ', 'formatted' => 'JJ/MM/AAAA'].
		foreach ($result AS $key => $value)
			$result[$key]['Promo']['limit_date'] = array('original' => $result[$key]['Promo']['limit_date'], 'formatted' => $this->Promo->rewriteDate($result[$key]['Promo']['limit_date']));
		$this->set('promos', $result);
	}

	public function add()
	{
		if ($this->request->is('post')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence.
			$d = $this->request->data;
			if ($this->Promo->save($d)) {
				$this->Session->setFlash('L\'entrée a bien été ajoutée','default',array('class'=>'container alert btn-green'));
				return $this->redirect(array('controller' => 'adminpromos', 'action' => 'index'));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de l\'ajout de l\'entrée','default',array('class'=>'container alert btn-red'));
		}
	}

	public function edit($id)
	{
		if ($this->request->is('post') || $this->request->is('put')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence.
			$d = $this->request->data;
			$d['Promo']['id'] = $id;
			if ($this->Promo->save($d, true, array('limit_date'))) {
				$this->Session->setFlash('Les informations ont bien été modifiées','default',array('class'=>'container alert btn-green'));
//				return $this->redirect(array('controller' => 'promos', 'action' => 'index'));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de la modification des informations','default',array('class'=>'container alert btn-red'));
		}
		$result = $this->Promo->findById($id);
		$this->data = $result;
		$this->set('promo', $result);
	}

// REMARQUE : Cette fonction retourne du JSON en prévision d'une utilisation en AJAX.
	public function desactivate($id)
	{
		if ($this->request->is('post')) {
			$this->request->data['Promo']['id'] = $id;
			if ($this->Promo->save($d, true, array('limit_date')))
				echo $this->Promo->returnStatus(0, "l'entrée a bien été désactivée");
		} else
			echo $this->Promo->returnStatus(1, "Une erreur s'est produite lors de la désactivation de l'entrée");
	}
}