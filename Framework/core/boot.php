<?php   
     
    // Class autoload function
    function __autoload($className) 
    {
        if (file_exists(CORE_PATH.strtolower($className).'.php')) 
        {
            require_once(CORE_PATH.strtolower($className).'.php');
        } 
        else if (file_exists(CONTROLLERS_PATH.strtolower($className).'.php')) 
        {
            require_once(CONTROLLERS_PATH.strtolower($className).'.php');
        } 
        else if (file_exists(MODELS_PATH.strtolower($className).'.php')) 
        {
            require_once(MODELS_PATH.strtolower($className).'.php');
        }
        else if (file_exists(VIEWS_PATH.strtolower($className).'.php')) 
        {
            require_once(VIEWS_PATH.strtolower($className).'.php');
        }  
    }

    // Set error reporting
    if (DEVELOPMENT_ENVIRONMENT == true) 
    {
        error_reporting(E_ALL);
        ini_set('display_errors','On');
    } 
    else 
    {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', LOGS_PATH.'error.log');
    }    

    // Get controller    
    $url = $_GET['url'];       
    if (isset($url))
	{               
		$urlArray = explode('/', $url);
        $controller = ucwords(array_shift($urlArray));
        $action = array_shift($urlArray);
        $query_string = $urlArray; 
    }
    else
    {
        // Default controller
        $controller = 'Index';
        $action = 'defaultAction';
        $query_string = array(''); 
    }
                     
    // Run controller                                   
    if (class_exists($controller))
    {
        $objController = new $controller();
                         
        if (method_exists($objController, $action))
        {                
            call_user_func_array(array($objController, $action), $query_string);
        }   
        else
        {
            // Default action
            call_user_func_array(array($objController, 'defaultAction'), $query_string);
        }
    }   
    else
    {       
        // Default controller
        $controller = 'Index';
        $action = 'defaultAction';
        $query_string = array(''); 
        
        $objController = new $controller();                                                    
        call_user_func_array(array($objController, $action), $query_string);               
    }              
			    
#end of boot.php