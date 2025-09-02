<?php
    // String can use single quote
    $name = 'Mike';
    // or double quote
    $name = "Mike";

    // Double quote string can escape characters \n = new line  \t = tab  \\ = backslash
    echo "Hello Mike\nHello David";
    echo "\n";
    // Double quote string can do interpolation
    echo "Hello $name";
    echo "\n";
    // string concat
    echo 'Hello ' . $name;
    echo "\n";
    // string length
    echo strlen($name);
    echo "\n";
    $text = "   Hello World   ";
    // Remove space(s) before and after
    echo trim($text);
    echo "\n";
    $email = "Inno@example.com";
    // Convert to lowercase / uppercase
    echo strtolower($email);
    echo "\n";
    echo strtoupper($name);
    echo "\n";
    // Converts the first character to uppercase
    echo ucfirst($name);  // 'Mike' 
    echo "\n";
    // Replace text a by text b in $text
    echo str_replace('a', 'b', $text);
    echo "\n";
    // String Contains (PHP 8)
    echo str_contains($name, 'ke');  # true
    echo "\n";
    // Find numeric position of first occurrence 
    $pos = strpos($name, 'k'); # 2
    echo "\n";
    // Returns portion of string (offset / length)
    echo substr($name, 0, $pos); # Mi 
?>