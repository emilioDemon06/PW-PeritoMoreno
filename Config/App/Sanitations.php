<?php


class Sanitations
{

    //sanitizar Email
    public static function san_email($email)
    {
        $emailLimpio = filter_var($email, FILTER_SANITIZE_EMAIL);
        $emailLimpio = trim($emailLimpio);
        $emailLimpio = addslashes($emailLimpio);

        return $emailLimpio;
    }

    //sanitizar caracteres especiales como palabras reservadas en html y javascript
    public static function san_caracter_especial($string)
    {
        $stringLimpio = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
        $stringLimpio = trim($stringLimpio);
        $stringLimpio = addslashes($stringLimpio);
        
        return $stringLimpio;
    }
    //sanitizar numeros enteros
    public static function san_entero($int)
    {
        $intLimpio = filter_var($int, FILTER_SANITIZE_NUMBER_INT);
        $intLimpio = trim($intLimpio);
        $intLimpio = addslashes($intLimpio);

        return $intLimpio;
    }
    //sanitizar string
    public static function san_string($string)
    {
        $stringLimpio = filter_var($string, FILTER_SANITIZE_STRING);
        $stringLimpio = trim($stringLimpio);
        $stringLimpio = addslashes($stringLimpio);
        return $stringLimpio;
    }
}
