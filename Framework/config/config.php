<?php

    // Development Environment
    define('DEVELOPMENT_ENVIRONMENT', true);
    
    // DB settings   
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'test');
    
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');    
    
    // Default controller
    define('DEFAULT_CONTROLLER', 'index');    
            
    // Paths
    define('CORE_PATH', ROOT.DS.'core'.DS);
    define('LOGS_PATH', ROOT.DS.'tmp'.DS.'logs'.DS);
    
    define('APPLICATION_PATH', ROOT.DS.'application'.DS);
    
    define('CONTROLLERS_PATH', APPLICATION_PATH.'controllers'.DS);
    define('MODELS_PATH', APPLICATION_PATH.'models'.DS);
    define('VIEWS_PATH', APPLICATION_PATH.'views'.DS);  
          
#end of config.php