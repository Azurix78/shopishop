<?php
class MessagesController extends AppController
{
	function beforeFilter()
	{
		parent::beforeFilter();
		//$this->Auth->allow('index');
	}
}