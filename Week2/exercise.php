<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise: function</title>
</head>
<body>
    <h1 style="background-color:dodgerblue; text-align:center; color:white; top: padding 2%;"><?php 
            function greet($name) {
                $indexedArray = array("Hello World, fellow coder!", 
                                        "Greetings, logic wizards", 
                                        "Welcome to the matrix, Informatics crew!", 
                                        "Hey, problem solvers — ready to debug life today?", 
                                        "Hello future innovators of AI and beyond!");
                $random_index = array_rand($indexedArray);
                return "- $name Space - <br>" . "<i>" . $indexedArray[$random_index] . "</i>";
            } echo greet("Inno");
        ?></h1>
    <h3><?php
        mktime(0,0,0,0,0,0);
        echo date("l, F j, Y", mktime(0,0,0,8,9,2025));
    ?></h3>
</body>
</html>