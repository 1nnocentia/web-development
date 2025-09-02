<?php
    $name = 'Mike'; //string
    $isActive = true; //boolean
    $number = 25; //integer
    $amount = 99.95; //float
    $fruits = ['orange', 'apple', 'banana']; //array
    // const MAX_USERS = 50; //constant
    define('MAX_USERS', 50); //constant

    // Assign 'by reference' with the & keyword
    $name_2 = &$name_1;

    // Type conversion
    $age = (int)readline('Your age: ');
    echo 'Your age is ' .  (string)$age . "\n";

    echo gettype($age); // int

    echo is_int($age); // true
    echo is_float(12.5); // true
    echo is_string($name); // true
?>