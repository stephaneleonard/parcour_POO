<?php

class Validator
{    
    /**
     * verify that the given arg is a string
     *
     * @param  mixed $string
     * @return bool
     */
    public function string($string)
    {
        //regex
        $accentedCharacters = "àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ";
        return preg_match('/^[a-zA-Z' . $accentedCharacters . '\s]+$/', $string) ==1 ;
    }
    
    /**
     * verify that the given arg is a int
     *
     * @param  mixed $int
     * @return bool
     */
    public function int($int){
        return is_int($int);
    }
    
    /**
     * verify that the given arg is a float
     *
     * @param  mixed $float
     * @return bool
     */
    public function float($float){
        return is_float($float);
    }
    
    /**
     * verify that the given arg is a bool
     *
     * @param  mixed $bool
     * @return bool
     */
    public function bool($bool){
        return is_bool($bool);
    }
}
