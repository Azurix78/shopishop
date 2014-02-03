<?php
class Ticket extends AppModel
{
    public $validate = array(
        'category' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer une catégorie',
            'allowEmpty' => false,
        ),
        'title' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un titre',
            'allowEmpty' => false,
        ),
        'message' => array(
            'rule'      => 'notEmpty',
            'message'   => 'Vous devez rentrer un message',
            'allowEmpty' => false,
        ),
    );
}