<?php
class Article extends AppModel
{
    public $validate = array(
        'reference' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une référence',
            'allowEmpty' => false,
        ),
        'color' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une couleur',
            'allowEmpty' => false,
        ),
        'size' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une taille',
            'allowEmpty' => false,
        ),
        'price' => array(
            'rule'      => 'numeric',
            'message'   => 'Vous devez rentrer un prix',
            'allowEmpty' => false,
        ),
        'quantity' => array(
            'rule'      => 'numeric',
            'message'   => 'Vous devez rentrer une quantité',
            'allowEmpty' => false,
        ),
    );
}