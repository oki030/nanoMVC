<?php   
    require_once(CORE_PATH.'controller.php');
    require_once(CORE_PATH.'model.php'); 
     
    // Autoload function of controller classes
    function __autoload($className) 
    {
        if (file_exists(CONTROLLERS_PATH.strtolower($className).'.php')) 
        {
            require_once(CONTROLLERS_PATH.strtolower($className).'.php');
        }               
    }

    // Set error reporting ************************************************//    
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
    //*********************************************************************//

    // Get controller *****************************************************//
    if (!empty($_GET['url'])) $url = $_GET['url'];      
    
    if (isset($url))
	{               
		$urlArray = explode('/', $url);
        $controller = ucwords(array_shift($urlArray)).'Controller';
        $action = array_shift($urlArray);
        $query_string = $urlArray; 
    }
    else
    {
        // Default controller
        $controller = DEFAULT_CONTROLLER.'Controller';
        $action = 'index';
        $query_string = array(''); 
    }
    //*********************************************************************//
                     
    // Run controller *****************************************************//                                       
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
            call_user_func_array(array($objController, 'index'), $query_string);
        }
    }   
    else
    {       
        // Default controller
        $controller = DEFAULT_CONTROLLER.'Controller';
        $action = 'index';
        $query_string = array(''); 
        
        $objController = new $controller();                                                    
        call_user_func_array(array($objController, $action), $query_string);               
    }       
    //*********************************************************************//  
    
    function echoURL($path)
    {
        echo BASE_PATH.$path;
    }
    
    function returnURL($path)
    {
        $ret = BASE_PATH.$path;
        
        return $ret;
    }      
			    
#end of boot.php