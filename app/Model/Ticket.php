<?php
class Ticket extends AppModel
{
    public $hasOne = array(
        'Message' => array(
            'order' => array('Message.created' => 'DESC'),
            'limit' => '1',
        )
    );
    public $belongsTo = array('Order');

    public $validate = array(
        'category' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une catégorie',
            'allowEmpty' => false,
        ),
        'object' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un objet',
            'allowEmpty' => false,
        ),
        'email' => array(
            'rule'      => 'email',
            'message'   => 'Vous devez rentrer un email valide',
            'allowEmpty' => false,
        ),
        'content' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un message',
            'allowEmpty' => false,
        ),
    );
}