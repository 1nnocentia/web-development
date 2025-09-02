<?php
    //function declararion
    function fullName($firstName, $lastName = 'defaultvalue') {
        return "$firstName $lastName";
    }

    //function call
    echo fullName('Mike', 'Taylor');

    //function call with named parameters (PHP 8)
    echo fullName(firstName: 'Mike', lastName: 'Taylor'); // order can change

    //function variables params
    function combineNames(...$params) {
        return $params[0] . " " . $params[1];
    }

    echo combineNames('Alice', 'Wonderland') . PHP_EOL;

    // Closure function
    $greet = function ($name) {
        return "Hello $name!";
    };
    echo $greet('David') . PHP_EOL;

    $greetArrow = fn($name) => "Hi $name!";
    echo $greetArrow('Eve') . PHP_EOL;


    // Typed parameter and typed return
    function displayFull(string $first, string $last) : string {
        return "$first $last";
    }
    echo displayFull('Foo', 'Bar') . PHP_EOL;

    // Typed or null
    function displayName(?string $name) {
        return $name ?? 'No name provided';
    }
    echo displayName(null) . PHP_EOL;
    echo displayName('George') . PHP_EOL;

    // Union type (or)
    function showData(string|int $data) {
        return "Data: $data";
    }
    echo showData('Hello') . PHP_EOL;
    echo showData(123) . PHP_EOL;

    // Intersection type (and)
    class MyCollection implements Iterator, Countable {
        private $items = [];
        private $position = 0;

        public function __construct($items) {
            $this->items = $items;
        }

        // Iterator methods
        public function current(): mixed { return $this->items[$this->position]; }
        public function key(): mixed { return $this->position; }
        public function next(): void { ++$this->position; }
        public function rewind(): void { $this->position = 0; }
        public function valid(): bool { return isset($this->items[$this->position]); }

        // Countable method
        public function count(): int { return count($this->items); }
    }

    function count_and_iterate(Iterator&Countable $value) {
        foreach ($value as $item) {
            echo "Item: $item" . PHP_EOL;
        }
        return count($value);
    }

    $collection = new MyCollection(['apple', 'banana', 'cherry']);
    echo "Total: " . count_and_iterate($collection) . PHP_EOL;

    // 9. Function with mixed return
    function logInfoReturn(string $info) : mixed {
        return "Logged: $info";
    }
    echo logInfoReturn("Testing log") . PHP_EOL;

    // 10. Function with void return
    function logInfoVoid(string $info) : void {
        // Log ke PHP error log
        error_log("VOID LOG: $info");
    }
    logInfoVoid("Something happened");
?>