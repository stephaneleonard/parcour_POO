<?php
require_once('class/form.class.php');

//create a form
$form = new Form();
$form->create('index.php');
$form->text('name' , 'stéphane');
$form->select('country' , ['Belgium' , 'Holland' , 'Germany']);
$form->textArea('message' , 4 , 50 , 'enter your message here');
$form->radio('gender' , Array("male"=>"male" , "female"=>"female" , "other"=>"other"));
$form->checkbox('newsletter' , 1);
$form->submit('submit');
$form->end();