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
        'picture_id' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Image invalide',
            'allowEmpty' => false,
        ),
        'category_id' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Catégorie invalide',
            'allowEmpty' => false,
        ),
        'brand_id' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Marque invalide',
            'allowEmpty' => false,
        ),
        'promo_id' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Promotion invalide',
            'allowEmpty' => true,
        ),
    );
}

