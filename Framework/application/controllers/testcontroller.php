<?php

class TestController extends NN_Controller
{		
    function __construct()
    {
        parent::__construct();
    }
    
	function index()
	{	
        $this->load->model('test');   
           
        $data = $this->test->giveBack();
        
        $this->load->view('test', $data);       
	}
}

#end of testcontroller.php