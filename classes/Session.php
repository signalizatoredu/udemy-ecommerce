<?php

class Session {
    
    public static function setItem($id, $qty = 1){
        $_SESSION['basket'][$id]['qty'] = $qty;
    }

    public static function removeItem($id, $qty = null){
        if ($qty != null && $qty < $_SESSION['basket'][$id]['qty']){
            $_SESSION['basket'][$id]['qty'] - $qty;
        } else {
            $_SESSION['basket'][$id] = null;
            unset($_SESSION['basket'][$id]);
        }
    }
    
    public static function getSession($name = null){
        if (!empty($name)){
            return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
        }
    }
    
}
