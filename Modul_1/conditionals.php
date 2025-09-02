<?php

    $condition = 10;
    $condition2 = 5;
    // If / elseif / else
    if ($condition == 10) {
        echo 'condition 10';
    } elseif  ($condition == 5) {
        echo 'condition 5';
    } else {
        echo 'all other conditions';
    }

    // And condition = &&
    if ($condition === 10 && $condition2 === 5) {
        echo '10 and 5';
    }

    // Or condition = ||
    if ($condition === 10 || $condition2 === 5) {
        echo '10 or 5';
    }

    $isActive = true;

    // One line 
    if ($isActive) return true;

    // Null check
    if (is_null($name)) {
        // do something here, e.g. assign a value or handle null case
    }
    //Comparaison operation
    // == equal no type check
    // === equal with type check
    // .!= not equal
    // || or
    // && and
    // > greater than
    // < less than

    // Ternary operator (true : false)
    echo $isValid ? 'user valid' : 'user not valid';

    //Null Coalesce Operator
    echo $name ?? 'Mike';  //output 'Mike' if $name is null

    //Null Coalesce Assignment
    $name ??= 'Mike';

    // Null Safe Operator (PHP 8) will return null if one ? is null
    echo $user?->profile?->activate();

    // Null Safe + Null Coalesce (if null will return 'No user profile')
    echo $user?->profile?->activate() ?? 'Not applicable';

    //Spaceship operator return -1 0 1
    $names = ['Mike', 'Paul', 'John'];
    usort($names, function($a, $b) {
        return $a <=> $b;
    });
    // ['John', 'Mike', 'Paul']

    // Return false when converted to boolean:
    // false, 0, 0.0, null, '0', '', [], unset($var);

    // Compare same variable with multiple values
    switch ($color) {
        case 'red':
            echo 'The color is red';
            break;
        case 'yellow':
            echo 'The color is yellow';
            break;
        case 'blue':
            echo 'The color is blue';
            break;
        default:
            echo 'The color is unknown';
    }

    $color = 'green';
    // Match Expression (PHP 8)
    $type = match($color) {
        'red' => 'danger',
        'yellow', 'orange' => 'warning',
        'green' => 'success',
        default => 'Unknown'
    };

    // Check if variable declare
    isset($color['red']);  # true
?>