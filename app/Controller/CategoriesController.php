<?php
class CategoriesController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		// $this->Auth->allow('index', 'add', 'edit');
	}
}