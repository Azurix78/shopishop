<?php
class PicturesController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}
}