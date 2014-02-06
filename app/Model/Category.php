<?php
class Category extends AppModel
{
    public $validate = array(
        'name' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un nom pour la catégorie',
            'allowEmpty' => false,
        ),
        'menu_color' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une couleur pour votre catégorie',
            'allowEmpty' => false,
        ),
        'picture_id' => array(
            'rule'      => '[0-9]+',
            'message'   => 'Image invalide',
            'allowEmpty' => false,
        ),
    );
}

