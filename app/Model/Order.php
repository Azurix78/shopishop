<?php
class Order extends AppModel
{
    public $validate = array(
        'email' => array(
            'rule'      => 'email',
            'message'   => 'Vous devez rentrer un email valide',
            'allowEmpty' => false,
        ),
        'payement' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Entrez un mode de paiement',
            'allowEmpty' => false,
        ),
        'delivery' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Entrez un mode de livraison',
            'allowEmpty' => true,
        ),
        'adress' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Entrez une adresse',
            'allowEmpty' => false,
        ),
        'price' => array(
            'rule'       => 'numeric',
            'message'    => 'Entrez un prix',
            'allowEmpty' => false,
        ),
    );
}

