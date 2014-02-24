<?php
class Message extends AppModel
{
    public $validate = array(
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