<?php
echo 'Hello World';
// Input from console
$name = readline('What is your name : ');

$products = explode(',', $name);

// Debug output
var_dump($name);
print_r($products);


?>