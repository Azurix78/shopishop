<?php
class Brand extends AppModel
{
    public $validate = array(
        'name' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un nom',
            'allowEmpty' => false,
        ),
        'email' => array(
            array(
                'rule'      => 'email',
                'message'   => 'Vous devez rentrer un email valide',
                'allowEmpty' => false,
            ),
            array(
                'rule'  => 'isUnique',
                'message' => 'Cet email est déjà utilisé',
            ),
        ),
    );
}