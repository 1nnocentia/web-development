<?php
    // Get the current dir
    $current_dir = __DIR__;
    $file = __DIR__ ."/posts/first.txt";

    // Check if file exist
    if (file_exists($file)) {
        echo "File exists!<br>";
    } else {
        echo "File not found!";
    }


    // Read file content into one variable
    $testFile = __DIR__ . "/posts/test.txt";

    if (file_exists($testFile)) {
        $handle = fopen($testFile, "r");

        // Output lines until EOF
        while (!feof($handle)) {
            $line = fgets($handle);
            echo $line . "<br>";
        }
        fclose($handle);
    } else {
        echo "test.txt tidak ditemukan, buat dulu filenya.<br>";
    }

    // File write (csv)
    $file = fopen('export.csv', 'a');
    $array = [
        ['name' => 'Mike', 'age' => 45],
        ['name' => 'Jane', 'age' => 32]
    ];

    //Write key name as csv header
    fputcsv($file, array_keys($array[0]));

    //Write lines (format as csv)
    foreach ($array as $row) {
        fputcsv($file, $row); 
    }
    fclose($file);
?>