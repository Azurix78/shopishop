<?php
class Ticket_visitor extends AppModel
{
    public $validate = array(
        'category' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une catégorie',
            'allowEmpty' => false,
        ),
        'object' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un objet',
            'allowEmpty' => false,
        ),
        'email' => array(
            'rule'      => 'email',
            'message'   => 'Vous devez rentrer un email valide',
            'allowEmpty' => false,
        ),
        'orders_visitor_id' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Commande invalide',
            'allowEmpty' => false,
        ),
        'content' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un message',
            'allowEmpty' => false,
        ),
    );
}