<?php


class Login {
    
    public static $_login_page_front = "/?page=login";
    public static $_dashboard_front = "/?page=orders";
    public static $_login_front = "cid";
    
    public static $_login_page_admin = "/admin/";
    public static $_dashborad_admin = "/admin/?page=products";
    public static $_login_admin = "aid";
    
    public static $_valid_login = "valid";
    public static $_referrer = "refer";


    // ---------------------------------
    
    public static function isLogged($case = null){
        if (!empty($case)){
            if (isset($_SESSION[self::$_valid_login]) && $_SESSION[self::$_valid_login] == 1){
                return isset($_SESSION[$case]) ? true : false;
            }
            return false;
        }
        return false;
    }
    
    public static function LoginFront($id, $url = null){
        $url = !empty($url) ? $url : self::$_dashboard_front;
        $_SESSION[self::$_login_front] = $id;
        $_SESSION[self::$_valid_login] = 1;
        
        Helper::redirect($url);
    }
    
    public static function restrictFront(){
        if (!self::isLogged(self::$_login_front)){
            $url = Url::cPage() != "logout" ? 
                    self::$_login_page_front."&".self::$_referrer."=".Url::cPage() 
                    : self::$_login_page_front;
            
            Helper::redirect($url);
        }
    }
    
    public static function string2hash($string = null){
        if (!empty($string)){
            return hash('sha512', $string);
        }
    }
    
    public static function getFullNameFront($id = null){
        if (!empty($id)){
            $objUser = new User();
            $user = $objUser->getUser($id);
            
            if (!empty($user)){
                return $user['first_name']." ".$user['last_name'];
            }
        }
    }
    
    public static function logout($case = null){
        if (!empty($case)){
            $_SESSION[$case] = null;
            unset($_SESSION[$case]);
        } else {
            session_destroy();
        }
    }
            
            
   // end class;         
}
