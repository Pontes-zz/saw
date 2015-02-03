<?php 
class removeAcentos {

    /**
     * Array com os termos que ser�o substituidos
     * @var array
     */
    private static $removeArray = array(
    "a" => "a" ,
    "b" => "b" ,
    "c" => "c" ,
    "d" => "d" ,
    "e" => "e" ,
    "f" => "f" ,
    "g" => "g" ,
    "h" => "h" ,
    "i" => "i" ,
    "j" => "j" ,
    "k" => "k" ,
    "l" => "l" ,
    "m" => "m" ,
    "n" => "n" ,
    "o" => "o" ,
    "p" => "p" ,
    "q" => "q" ,
    "r" => "r" ,
    "s" => "s" ,
    "t" => "t" ,
    "u" => "u" ,
    "v" => "v" ,
    "x" => "x" ,
    "y" => "y" ,
    "z" => "z" ,
    "�" => "a" ,
    "�" => "e" ,
    "�" => "i" ,
    "�" => "o" ,
    "�" => "u" ,
    "�" => "a" ,
    "�" => "e" ,
    "�" => "i" ,
    "�" => "o" ,
    "�" => "�" ,
    "�" => "a" ,
    "�" => "o" ,
    "�" => "a" ,
    "�" => "e" ,
    "�" => "i" ,
    "�" => "o" ,
    "�" => "u" ,
	'�' => 'A' ,
         '�' => 'E' ,
         '�' => 'I' ,
         '�' => 'O' ,
         '�' => 'U' ,
         '�' => 'A' ,
         '�' => 'E' ,
         '�' => 'O' ,
         '�' => 'A' ,
         '�' => 'C' ,
         '�' => 'A' ,
         '�' => 'O' ,
    "," => ""  ,
    "!" => "" ,
    "#" => "" ,
    "%" => "",
    "�" => "" ,
    "_" => "-" ,
    "{" => "" ,
    "}" => "" ,
    "^" => ""  ,
    "�" => "" ,
    "`" => "" ,
    "" => "" ,
    "/" => "" ,
    ";" => "" ,
    ":" => "" ,
    "?" => "" ,
    "�" => "1" ,
    "�" => "2" ,
    "�" => "3" ,
    "�" => "a" ,
    "�" => "o" ,
    "�" => "c" ,
    "�" => "u" ,
    "�" => "a" ,
    "�" => "i" ,
    "�" => "o" ,
    "�" => "e" ,
    "$" => "s" ,
    "�" => "y" ,
    "w" => "w" ,
    "<" => "" ,
    ">" => "" ,
    "[" => "" ,
    "]" => "" ,
    "&" => "e" ,
    " " => "-" , //aki transformamos os espa�os
	"-" => "-",
    "'" => '' ,
    '"' => ""  ,
    '1' => '1' ,
    '2' => '2' ,
    '3' => '3' ,
    '4' => '4' ,
    '5' => '5' ,
    '6' => '6' ,
    '7' => '7' ,
    '8' => '8' ,
    '9' => '9' ,
    '0' => '0'
    );

    private static $acentosArray = array(
        '�' => 'a' , '�' => 'A' ,
        '�' => 'e' , '�' => 'E' ,
        '�' => 'i' , '�' => 'I' ,
        '�' => 'o' , '�' => 'O' ,
        '�' => 'u' , '�' => 'U' ,
        '�' => '�' , '�' => 'A' ,
        '�' => '�' , '�' => 'E' ,
        '�' => '�' , '�' => 'O' ,
        '�' => 'a' , '�' => 'A' ,
        '�' => 'c' , '�' => 'C' ,
        '�' => 'a' , '�' => 'A' ,
        '�' => 'o' , '�' => 'O'
    );
    
    /**
     * Limpa uma string para ser usada como termo de uma URL
     * @param string $string
     * @return string
     */
    public static function clean($string) {
        $finalString = "";
        $string = strtolower($string);
        $string = str_replace("'", "", $string);
        $string = str_replace('"', "", $string);

        $string = trim($string);

        $string = filter_var($string, FILTER_SANITIZE_STRING);

        foreach(str_split($string) as $str) {
            $finalString .= self::$removeArray[$str];
			//$finalString .= self::$acentosArray[$str];
        }

        $finalString = str_replace("--", "-", $finalString);
        $finalString = str_replace("--", "-", $finalString);

        if(substr($finalString, -1, 1)=="-") {
            $finalString = substr($finalString, 0, -1);
        }
		
		$finalString = strtolower($finalString);
        return $finalString;
    }

    /**
     * Remove os acentos de uma string
     *
     * @param string $string
     * @return string
     */
    public static function removeAce($string) {
        $finalString = "";
        $string = str_replace("'", "", $string);
        $string = str_replace('"', "", $string);
        $string = str_replace('&', "", $string);

        $string = trim($string);

        $string = filter_var($string, FILTER_SANITIZE_STRING);

        foreach(str_split($string) as $str) {
            if(key_exists($str, self::$acentosArray)) {
                $finalString .= self::$acentosArray[$str];
            } else {
                $finalString .= $str;
            }
        }

        if(substr($finalString, -1, 1)=="-") {
            $finalString = substr($finalString, 0, -1);
        }
			$finalString = strtolower($finalString);
        return $finalString;
    }
}

?>