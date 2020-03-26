<?php

class Html
{

    public function start($lang)
    {
        echo "<!DOCTYPE html>";
        echo "<html lang='$lang'>";
    }

    public function end()
    {
        echo "</html>";
    }

    public function section($tag , bool $start){
        if($start = true){
            echo "<$tag>";
        }
        else{
            echo "</$tag>";
        }
        
    }

    public function meta($name=null , $content=null , $charset=null){
        if($charset){
            echo "<meta charset=$charset>";
        }
        else{
            echo "<meta name='$name' , content='$content'>";
        }
        
    }

    public function css($src)
    {
        echo "<link rel='stylesheet' href='$src'>";
    }

    public function title($title){
        echo "<title>$title</title>";
    }

    public function img($src){
        echo "<img src=$src>";
    }

    public function a($href , $text){
        echo "<a href='$href'>$text</a>";
    } 

    public function script($src){
        echo "<script src='$src'></script>";
    }
}

// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <link rel="stylesheet" href="style.css">
//     <title>Document</title>
// </head>
// <body>
    
// </body>
// </html>
