<?php

class User extends Application{
    
    private $_table = "clients";
    public $_id;
    
    public function isUser($email, $password){
        $password = Login::string2hash($password);
        $sql = "SELECT * FROM `{$this->_table}`
        WHERE `email` = '".$this->db->escape($email)."'
        AND `password` = '".$this->db->escape($password)."'
        AND  `active` = 1";
        
        $result = $this->db->fetchOne($sql);
        
        if (!empty($result)){
            $this->_id = $result['id'];
            return true;
        }
        return false;
        }
    
}
