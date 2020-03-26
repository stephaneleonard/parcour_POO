<?php

class Form
{
    public function create($action)
    {
        echo "<form method='post' action=$action>";
    }
    public function end()
    {
        echo "</form>";
    }

    public function submit($name)
    {
        echo "<button type='submit' , name='$name'>$name</button>";
    }
    public function text($name, $default)
    {
        echo "<label for='$name'>$name</label>";
        echo "<input id='$name' name='$name' type='text' value='$default'>";
    }

    public function select($name, $options)
    {
        echo "<label for='$name'>$name</label>";
        echo "<select id='$name'>";
        foreach ($options as $option) {
            echo "<option value='$option'>$option</option>";
        }

        echo "</select>";
    }

    public function textArea($name, $rows, $cols, $default)
    {
        echo "<label for='$name'>$name</label>";
        echo "<textarea id='$name' rows='$rows' cols='$cols'>$default</textarea>";
    }

    public function radio($name, $values)
    {
        foreach ($values as $id => $value) {
            echo "<input type='radio' name='$name' id='$id' , value='$value'>";
            echo "<label for='$$id'>$value</label>";
        }
    }

    public function checkbox($name, $value)
    {
        echo "<input type='checkbox' name='$name' id='$name' , value='$value'>";
        echo "<label for='$$name'>$name</label>";
    }
}
