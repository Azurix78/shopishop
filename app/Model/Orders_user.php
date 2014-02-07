<?php
class Orders_user extends AppModel
{
    public $validate = array(
        'user_id' => array(
            'rule'      => 'numeric',
            'message'   => 'Utilisateur invalide',
            'allowEmpty' => false,
        ),
        'address_id' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Adresse invalide',
            'allowEmpty' => false,
        ),
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
    );
}