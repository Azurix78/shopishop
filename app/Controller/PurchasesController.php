<?php
class PurchasesController extends AppController
{
	public $uses = array('Purchases_user', 'Purchases_visitor');

	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}
}