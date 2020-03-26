<?php

class Validator
{
    public function string($string)
    {
        //regex
        $accentedCharacters = "àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ";
        return preg_match('/^[a-zA-Z' . $accentedCharacters . '\s]+$/', $string) ==1 ;
    }

    public function int($int){
        return is_int($int);
    }

    public function float($float){
        return is_float($float);
    }

    public function bool($bool){
        return is_bool($bool);
    }
}
