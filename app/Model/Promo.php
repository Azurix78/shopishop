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
            'rule'      => array('between', 1, 99),
            'message'   => 'Réduction invalide',
            'allowEmpty' => false,
        ),
        'limit_date' => array(
            'rule'      => 'datetime',
            'message'   => 'Date invalide',
            'allowEmpty' => false,
        ),
    );
}