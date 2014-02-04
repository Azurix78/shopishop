<?php
class FaqsController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}
}