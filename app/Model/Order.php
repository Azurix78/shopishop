<?php
class Order extends AppModel
{
    public $hasMany = 'Purchase';

    public $validate = array(
        'gift_wrap' => array(
            'rule'       => 'numeric',
            'message'    => 'Vous devez choisir un emballage',
            'allowEmpty' => true,
        ),
        'status' => array(
            'rule'       => 'numeric',
            'message'    => 'Status invalide',
            'allowEmpty' => false,
        ),
        'firstname' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez rentrer un prénom',
            'allowEmpty' => false,
        ),
        'lastname' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez rentrer un nom',
            'allowEmpty' => false,
        ),
        'address' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez rentrer une adresse',
            'allowEmpty' => false,
        ),
        'country' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez rentrer un pays',
            'allowEmpty' => false,
        ),
        'email' => array(
            'rule'      => 'email',
            'message'   => 'Vous devez rentrer un email valide',
            'allowEmpty' => false,
        ),
    );
}