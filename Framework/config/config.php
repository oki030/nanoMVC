<?php

    // DEVELOPMENT ENVIRONMENT
    define('DEVELOPMENT_ENVIRONMENT', true);
    
    // DB
    define('DB_NAME', 'yourdatabasename');
    define('DB_USER', 'yourusername');
    define('DB_PASSWORD', 'yourpassword');
    define('DB_HOST', 'localhost');
            
    // PATHS
    define('CORE_PATH', ROOT.DS.'core'.DS);
    define('LOGS_PATH', ROOT.DS.'tmp'.DS.'logs'.DS);
    define('APPLICATION_PATH', ROOT.DS.'application'.DS);
    define('CONTROLLERS_PATH', APPLICATION_PATH.'controllers'.DS);
    define('MODELS_PATH', APPLICATION_PATH.'models'.DS);
    define('VIEWS_PATH', APPLICATION_PATH.'views'.DS);  
          
#end of config.php