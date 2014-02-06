<?php
class Ticket_user extends AppModel
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
        'user_id' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Utilisateur invalide',
            'allowEmpty' => false,
        ),
        'orders_user_id' => array(
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