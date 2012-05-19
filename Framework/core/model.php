<?php

class NN_Model
{       
    protected $db;
    
    function __construct()
    {
        $this->db = new NN_DB();
    }
}

class NN_DB
{   
    protected $dbHandle;
    protected $connected;
    
    function __construct()
    {
        $this->connected = false;              
    }
    
    function connect()
    {           
        if ($this->connected) return true;
        
        $this->dbHandle = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        
        if ($this->dbHandle != 0)
        {
            $this->connected = mysql_select_db(DB_NAME, $this->dbHandle);                                                      
        }
        
        return $this->connected;        
    }
    
    function disconnect()
    {               
        if (!$this->connected) return true;
        
        if (@mysql_close($this->dbHandle) != 0) 
        {
            $this->connected = false;
            
            return true;
        }
        else 
        {
            return false;
        }
    }
    
    function query($query)
    {   
        if (!$this->connected) return null;
        
        $result = mysql_query($query);
            
        return $result;            
    }    
}

#end of model.php