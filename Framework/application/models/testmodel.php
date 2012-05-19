<?php

class TestModel extends NN_Model
{
    function __construct()
    {
        parent::__construct();        
        $this->db->connect();
    }
    
    function __destruct()
    {
        $this->db->disconnect();
    }
    
    function giveBack()
    {
        $data['title'] = 'My MVC framefork';
        $data['msg'] = 'Hallo to all from model!';                                
        
        return $data;
    }
    
    function testDB()
    {                            
        $result = $this->db->query("SELECT * FROM `testtable`");
        
        while ($row = mysql_fetch_assoc($result)) 
        {
            echo $row['Title'];
            echo $row['Msg'];            
        }             
    }
}

#end of testmodel.php