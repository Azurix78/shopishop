<?php
class Product extends AppModel
{
    public $validate = array(
        'name' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un nom',
            'allowEmpty' => false,
        ),
        'category' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une catégorie',
            'allowEmpty' => false,
        ),
        'id_picture' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Image invalide',
            'allowEmpty' => false,
        ),
        'id_category' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Catégorie invalide',
            'allowEmpty' => false,
        ),
        'id_brand' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Marque invalide',
            'allowEmpty' => false,
        ),
        'id_promo' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Promotion invalide',
            'allowEmpty' => true,
        ),
    );
}

