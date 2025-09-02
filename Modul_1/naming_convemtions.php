<?php
namespace App;

// PHP opening/closing tag
  echo "Hello World";
?>
// if no closing tag the rest of the file will be considered PHP

// Short syntax for PHP echo
<?= "Hello World" ?>

//Enable strict typing (first line of your PHP file)
<? declare(strict_types=1); ?>

// Include a PHP file
// Create a namespace
// (Moved to top of file as required by PHP)
// Create a namespace
<? namespace App; ?>

// Use a namespace
<?php use App\Product; ?>

<?php
$firstName = 'Mike';  // camelCase
function updateProduct() { // camelCase
    // function body
}

class ProductItem { // StudlyCaps
    // class body
}

define('ACCESS_KEY', '123abc'); // all upper case with underscore separators
?>