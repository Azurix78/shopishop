<?php
class Product extends AppModel
{
    public $belongsTo = array(
        'Category',
        'Brand',
        'Picture' => array('conditions' => array('Picture.status' => 0)),
        'Promo');

    public $hasMany = array('Article' => array(
        'conditions' => array('Article.status' => 1),
    ));

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
            'rule'      => 'numeric',
            'message'   => 'Image invalide',
            'allowEmpty' => false,
        ),
        'description' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Image invalide',
            'allowEmpty' => false,
        ),
        'category_id' => array(
            'rule'      => 'numeric',
            'message'   => 'Catégorie invalide',
            'allowEmpty' => false,
        ),
        'brand_id' => array(
            'rule'      => 'numeric',
            'message'   => 'Marque invalide',
            'allowEmpty' => false,
        ),
        'promo_id' => array(
            'rule'      => 'numeric',
            'message'   => 'Promotion invalide',
            'allowEmpty' => true,
        ),
    );
}

