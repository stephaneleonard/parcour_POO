<?php
require_once('class/form.class.php');
require_once('class/html.class.php');
require_once('class/validator.class.php');

//create html tags
$html = new Html();
$html->start('en');
$html->section('head', true);
$html->meta(null , null , 'UTF-8');
$html->meta('viewport' , 'width=device-width, initial-scale=1.0');
$html->title('POO');
$html->css('style.css');
$html->section('head', false);
$html->section('body', true);
//create a form
$form = new Form();
$form->create('index.php');
$form->text('name', 'stéphane');
$form->select('country', ['Belgium', 'Holland', 'Germany']);
$form->textArea('message', 4, 50, 'enter your message here');
$form->radio('gender', array("male" => "male", "female" => "female", "other" => "other"));
$form->checkbox('newsletter', 1);
$form->submit('submit');
$form->end();
$html->img("https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/hostedimages/1433905519i/15156249._SY540_.jpg");
$html->a("google.com" , "google");
$html->script('srcipt.js');
$html->section('body', false);
$html->end();

//test validator
$validator = new Validator();
var_dump( $validator->string('stéphane'));
var_dump($validator->string('1234'));
var_dump( $validator->int(1));
var_dump( $validator->int('abcd'));
var_dump( $validator->int('123'));