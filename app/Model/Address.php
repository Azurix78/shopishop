<?php
class Address extends AppModel
{
    
    public $belongsTo = 'User';

    public $validate = array(
        'lastname' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un nom',
            'allowEmpty' => false,
        ),
        'firstname' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un Prénom',
            'allowEmpty' => false,
        ),
        'address' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une adresse',
            'allowEmpty' => false,
        ),
        'user_id' => array(
            'rule'       => 'numeric',
            'message'    => 'Utilisateur invalide',
            'allowEmpty' => false,
        ),
        'country' => array(
            'rule'       => 'notEmpty',
            'message'    => 'Vous devez renter un pays',
            'allowEmpty' => false,
        ),
        'zipcode' => array(
            'notEmpty' => array(
                'rule'       => 'notEmpty',
                'message'    => 'Vous devez renter un code postal',
                'allowEmpty' => false,
            ),
            'between' => array(
                'rule'    => array('between', 5, 5),
                'message' => 'Votre code postal doit faire 5 caractère'
            ),
        ),
        
    );

}