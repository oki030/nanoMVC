<?php

class TestModel extends NN_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function giveBack()
    {
        $data['title'] = 'My MVC framefork';
        $data['msg'] = 'Hallo to all from model!'; 
        
        return $data;
    }
}

#end of testmodel.php