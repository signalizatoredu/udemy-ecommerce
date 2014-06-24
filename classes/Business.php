<?php

class Business extends Application {
    
    private $_table = 'business';
    
    public function getBusiness(){
        $sql = "SELECT t.* FROM `{$this->_table}` t
                WHERE `id` = 1";
        
        return $this->db->fetchOne($sql);
    }
    
    public function  getVatRate(){
        $business = $this->getBusiness();
        return $business['vat_rate'];
    }
    
    public function updateBusiness($vars = null){
        if (!empty($vars)){
            $this->db->prepareUpdate($vars);
            return $this->db->update($this->_table,1);
        }
    }
    
    // end of Business class
}
