<?php
class PromosController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index', 'add', 'edit');
		$this->layout = 'admin';
	}

	public function index($status = 1)
	{
		$result = ($status == 1) ? $this->Promo->find('all', array('conditions' => array('DATEDIFF(`limit_date`, CURRENT_DATE()) >=' => '0'))) : $this->Promo->find('all', array('conditions' => array('DATEDIFF(`limit_date`, CURRENT_DATE()) <' => '0')));
		// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Ajoute au résultat un array contenant la date en BDD ET la date en plus naturel : resultat['limit_date'] = ['orginal' => 'AAAA-MM-JJ', 'formatted' => 'JJ/MM/AAAA'].
		foreach ($result AS $key => $value)
			$result[$key]['Promo']['limit_date'] = array('original' => $result[$key]['Promo']['limit_date'], 'formatted' => $this->rewriteDate($result[$key]['Promo']['limit_date']));
		$this->set('promos', $result);
	}

	public function add()
	{
		if ($this->request->is('post')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence.
			$d = $this->request->data;
			if ($this->Promo->save($d)) {
				$this->Session->setFlash('L\'entrée a bien été ajoutée');
				return $this->redirect(array('controller' => 'promos', 'action' => 'index'));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de l\'ajout de l\'entrée');
		}
	}

	public function edit($id)
	{
			var_dump($this->request->is('post'));
		if ($this->request->is('post') || $this->request->is('put')) {
//			$this->autoRender = false; // ----> En cas d'utilisation d'AJAX, modifier le retour de la fonction en conséquence.
			$d = $this->request->data;
			$d['Promo']['id'] = $id;
			if ($this->Promo->save($d, true, array('limit_date'))) {
				$this->Session->setFlash('Les informations ont bien été modifiées');
//				return $this->redirect(array('controller' => 'promos', 'action' => 'index'));
			} else
				$this->Session->setFlash('Une erreur s\'est produite lors de la modification des informations');
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
				echo $this->returnStatus(0, "l'entrée a bien été désactivée");
		} else
			echo $this->returnStatus(1, "Une erreur s'est produite lors de la désactivation de l'entrée");
	}

//	Ces fonctions devraient être placées dans un helper.
	public function rewriteDate($date)
	{
		return preg_replace('/^(20[0-2][0-9])-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', '$3/$2/$1', $date);
	}

	public function returnStatus($code, $message)
	{
		return '{"code": "' . $code . '", "message": "' . $message . '"}';
	}
}