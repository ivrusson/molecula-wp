<?php
/**
* molecula-wp
*
*
* @package   molecula-wp
* @author    Ivrusson
* @license   GPL-3.0
* @link      https://github.com/ivrusson
*/

namespace MoleculaWP;

class Utils {

    public static function get_string_between($string, $start, $end){
        $string = " ".$string;
        $ini = strpos($string,$start);
        if ($ini == 0) return "";
        $ini += strlen($start);   
        $len = strpos($string,$end,$ini) - $ini;
        return substr($string,$ini,$len);
    }

}