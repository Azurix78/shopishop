<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel
{
    public function beforeSave($options = array())
    {
        if (!$this->id)
        {
            $passwordHasher = new SimplePasswordHasher();
            $this->data['User']['password'] = $passwordHasher->hash(
                $this->data['User']['password']
            );
        }
        return true;
    }


    public $validate = array(
        'lastname' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un nom',
            'allowEmpty' => false,
        ),
        'firstname' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un Prénom',
            'allowEmpty' => false,
        ),
        'email' => array(
            array(
                'rule'      => 'email',
                'message'   => 'Vous devez rentrer un email valide',
                'allowEmpty' => false,
            ),
            array(
                'rule'  => 'isUnique',
                'message' => 'Cet email est déjà utilisé',
            ),
        ),
        'password' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez renter un mot de passe',
            'allowEmpty' => false,
        ),
        'birthday' => array(
            'rule'       => 'date',
            'message'    => 'Entrez une date valide',
            'allowEmpty' => false,
        ),   
        'title' => array(
            'isTitle' => array(
                'rule' => array('isTitle', 'title'),
                'message' => 'Civilité invalide'
                ),
        ), 
        'password_verify' => array(
            'compareFields' => array(
                'rule' => array('compareFields', 'password_verify'),
                'message' => 'Les mots de passe ne correspondent pas'
                ),
        ),   
  


    );

    public function isTitle($field)
    {
        if (isset($this->data['User']['title']) && ($this->data['User']['title'] == 'M.' OR $this->data['User']['title'] == 'Mme'))
        {
            return true;
        }
        return false;
    }

    public function compareFields() {
        if ($this->data['User']['password'] == $this->data['User']['password_verify'])
        {
            return true;
        }
        return false;
    }

    

}

