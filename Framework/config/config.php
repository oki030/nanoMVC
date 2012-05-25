<?php

    // Development Environment
    define('DEVELOPMENT_ENVIRONMENT', true);
    
    // DB settings   
    define('DB_HOST', '');
    define('DB_NAME', '');
    
    define('DB_USER', '');
    define('DB_PASSWORD', '');    
    
    // Default controller
    define('DEFAULT_CONTROLLER', ''); 
    
    // Base path
    define('BASE_PATH', '');    
            
    // Paths
    define('CORE_PATH', ROOT.DS.'core'.DS);
    define('LOGS_PATH', ROOT.DS.'tmp'.DS.'logs'.DS);
    
    define('APPLICATION_PATH', ROOT.DS.'application'.DS);
    
    define('CONTROLLERS_PATH', APPLICATION_PATH.'controllers'.DS);
    define('MODELS_PATH', APPLICATION_PATH.'models'.DS);
    define('VIEWS_PATH', APPLICATION_PATH.'views'.DS);          
          
#end of config.php