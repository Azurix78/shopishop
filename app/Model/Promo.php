<?php
class Promo extends AppModel
{
    public $validate = array(
        'name' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un nom pour la catégorie',
            'allowEmpty' => false,
        ),
        'code' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un code pour votre réduction',
            'allowEmpty' => false,
        ),
        'reduction' => array(
            'rule'      => '[0-9][1-9]%',
            'message'   => 'Réduction invalide',
            'allowEmpty' => false,
        ),
        'limit_date' => array(
            'rule'      => 'date',
            'message'   => 'Date invalide',
            'allowEmpty' => false,
        ),
    );
}