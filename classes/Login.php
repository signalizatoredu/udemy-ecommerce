<?php


class Login {
    
    public static function string2hash($string = null){
        if (!empty($string)){
            return hash('sha512', $string);
        }
    }
}
