<?php 
class removeAcentos {

    /**
     * Array com os termos que serão substituidos
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
    "á" => "a" ,
    "é" => "e" ,
    "í" => "i" ,
    "ó" => "o" ,
    "ú" => "u" ,
    "à" => "a" ,
    "è" => "e" ,
    "ì" => "i" ,
    "ò" => "o" ,
    "ù" => "ù" ,
    "ã" => "a" ,
    "õ" => "o" ,
    "â" => "a" ,
    "ê" => "e" ,
    "î" => "i" ,
    "ô" => "o" ,
    "û" => "u" ,
	'Á' => 'A' ,
         'É' => 'E' ,
         'Í' => 'I' ,
         'Ó' => 'O' ,
         'Ú' => 'U' ,
         'â' => 'A' ,
         'Ê' => 'E' ,
         'Ô' => 'O' ,
         'À' => 'A' ,
         'Ç' => 'C' ,
         'Ã' => 'A' ,
         'Õ' => 'O' ,
    "," => ""  ,
    "!" => "" ,
    "#" => "" ,
    "%" => "",
    "¬" => "" ,
    "_" => "-" ,
    "{" => "" ,
    "}" => "" ,
    "^" => ""  ,
    "´" => "" ,
    "`" => "" ,
    "" => "" ,
    "/" => "" ,
    ";" => "" ,
    ":" => "" ,
    "?" => "" ,
    "¹" => "1" ,
    "²" => "2" ,
    "³" => "3" ,
    "ª" => "a" ,
    "º" => "o" ,
    "ç" => "c" ,
    "ü" => "u" ,
    "ä" => "a" ,
    "ï" => "i" ,
    "ö" => "o" ,
    "ë" => "e" ,
    "$" => "s" ,
    "ÿ" => "y" ,
    "w" => "w" ,
    "<" => "" ,
    ">" => "" ,
    "[" => "" ,
    "]" => "" ,
    "&" => "e" ,
    " " => "-" , //aki transformamos os espaços
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
        'á' => 'a' , 'Á' => 'A' ,
        'é' => 'e' , 'É' => 'E' ,
        'í' => 'i' , 'Í' => 'I' ,
        'ó' => 'o' , 'Ó' => 'O' ,
        'ú' => 'u' , 'Ú' => 'U' ,
        'â' => 'â' , 'â' => 'A' ,
        'ê' => 'ê' , 'Ê' => 'E' ,
        'ô' => 'ô' , 'Ô' => 'O' ,
        'à' => 'a' , 'À' => 'A' ,
        'ç' => 'c' , 'Ç' => 'C' ,
        'ã' => 'a' , 'Ã' => 'A' ,
        'õ' => 'o' , 'Õ' => 'O'
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