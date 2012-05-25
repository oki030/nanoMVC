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
    
    function selectQuery($query)
    {
        $ret = array();
        
        if (!$this->connected) return $ret;
                        
        $result = mysql_query($query);
        
        if (!$result) return $ret;
        
        $num_col = mysql_num_fields($result);              
        
        if ($num_col)
        {
            for($i = 0; $i<$num_col; $i++)
            {
                $ret[mysql_field_name($result, $i)] = array();
            }    
            
            while ($row = mysql_fetch_row($result))
            {
                $i = 0;
                foreach($ret as $key => $value)
                {
                    array_push($ret[$key], $row[$i]);
                    $i++;
                }                
            }                    
        }   
        
        mysql_free_result($result);
        return $ret;                            
    }    
}

#end of model.php