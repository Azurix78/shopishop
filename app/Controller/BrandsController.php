<?php
class BrandsController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}
}