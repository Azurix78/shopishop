<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	public $helpers = array('Html', 'Form', 'Session');
	public $components = array('Session', 'Cookie', 'Auth', 'Security' => array('csrfUseOnce' => false));

	protected function upload($file)
	{
		$this->Picture->create();
		$filename = $file['name'];
        $tmp_name = $file['tmp_name'];
        $extension = strtolower(pathinfo($filename , PATHINFO_EXTENSION));
        if(!empty($tmp_name))
        {
            if(in_array($extension, array('jpg','jpeg','png', 'gif'))){
                $filename = strtr($filename,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $filename = time() . "_" . preg_replace('/([^a-z0-9]+)/i', '-', $filename);

                if(move_uploaded_file($tmp_name, IMAGES . 'files' . DS . $filename . '.' .$extension))
                {
                	$picture = array();
                	$picture['picture'] = $filename . '.' .$extension;
                    if($this->Picture->save($picture))
                    {
                        return true;
                    }
                    $this->Session->setFlash('Erreur lors du l\'enregistrement ','default', array('class' => 'message erreur'));
                }               
            } else {
                $this->Session->setFlash('Extension incorrect (.png, .jpg, .jpeg, .gif)','default', array('class' => 'message erreur'));
            }            
        }
        return false;
	}
}