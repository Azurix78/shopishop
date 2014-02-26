<?php
class Purchase extends AppModel
{
    public $belongsTo = array('Article', 'Order', 'Picture', 'Product');
}