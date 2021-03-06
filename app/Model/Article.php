<?php
class Article extends AppModel
{
    public $belongsTo = array('Picture', 'Product');

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
        'description' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une description',
            'allowEmpty' => false,
        ),
        'size' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une taille',
            'allowEmpty' => false,
        ),
        'weight' => array(
            'rule'      => 'numeric',
            'message'   => 'Vous devez rentrer un prix',
            'allowEmpty' => false,
        ),
        'product_id' => array(
            'rule'      => 'numeric',
            'message'   => 'Produit invalide',
            'allowEmpty' => false,
        ),
        'picture_id' => array(
            'rule'      => 'numeric',
            'message'   => 'Image invalide',
            'allowEmpty' => false,
        ),
        'quantity' => array(
            'rule'      => 'numeric',
            'message'   => 'Vous devez rentrer une quantité',
            'allowEmpty' => false,
        ),
    );
}