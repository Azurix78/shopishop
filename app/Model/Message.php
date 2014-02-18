<?php
class Message extends AppModel
{
    public $belongsTo = array('Ticket');
    public $hasOne = array('User');
}