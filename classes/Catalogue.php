<?php


class Catalogue extends Application {
    
    private $_table = 'categories';
    private $_table_2 = 'products';
    public $_path = 'media/catalogue/';
    public static $_currency = '&pound;';
    
    
    
    public function getCategories(){
        
        $sql = "SELECT `t`.* FROM `{$this->_table}` `t`
                ORDER BY `t`.`name` ASC";
                
        return $this->db->fetchAll($sql);
    }
    
    public function getCategory($id) {
        
        $sql = "SELECT `t`.* FROM `{$this->_table}` `t`
                WHERE `t`.`id` = '".$this->db->escape($id). "'";
        
        return $this->db->fetchOne($sql);
    }
    
    public function getProducts($cat){
        $sql = "SELECT `t`.* FROM `{$this->_table_2}` `t`
                WHERE `t`.`category` = '".$this->db->escape($cat). "'
                ORDER BY `t`.`date` DESC";
               
        return $this->db->fetchAll($sql);
    }
    
    
    public function getProduct($id){
        $sql = "SELECT `t`.* FROM `{$this->_table_2}` `t`
                WHERE `t`.`id` = '".$this->db->escape($id). "'
                ORDER BY `t`.`date` DESC";
               
        return $this->db->fetchOne($sql);
    }
    
}
