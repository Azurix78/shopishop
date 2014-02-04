<?php
class Ticket extends AppModel
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
        'id_user' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Utilisateur invalide',
            'allowEmpty' => false,
        ),
        'id_order' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Commande invalide',
            'allowEmpty' => false,
        ),
    );
}