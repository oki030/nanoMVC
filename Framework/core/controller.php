<?php

class NN_Controller
{
    protected $load;
    
    function __construct()
    {
        $this->load = new NN_Load($this);
    }
    
    // Default action
    function index()
    {
        
    }
}

class NN_Load
{
    protected $controller;
    
    function __construct($controllerObject)
    {
        $this->controller = $controllerObject;
    }
    
    function view($viewName, $data = null)
    {
        if (file_exists(VIEWS_PATH.strtolower($viewName).'view.php')) 
        {
            if (is_array($data))
            {
                extract($data);
            }
            
            require_once(VIEWS_PATH.strtolower($viewName).'view.php');
        }
    }
    
    function model($modelName, $objectName = '')
    {
        if (file_exists(MODELS_PATH.strtolower($modelName).'model.php')) 
        {
            require_once(MODELS_PATH.strtolower($modelName).'model.php');
            
            $className = $modelName.'model';
            
            if (class_exists($className))
            {                                                     
                if ($objectName != '')
                {
                    $this->controller->$objectName = new $className;
                }
                else
                {
                    $this->controller->$modelName = new $className;
                }                
            }            
        }
    }
}

#end of controller.php