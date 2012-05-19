<?php

class TestController extends NN_Controller
{		
    function __construct()
    {
        parent::__construct();
    }
    
	function index()
	{	
        $this->load->model('test', 'test_model');   
           
        $data = $this->test_model->giveBack();
        
        $this->load->view('test', $data);
        
        $data = $this->test_model->testDB();                
	}
}

#end of testcontroller.php