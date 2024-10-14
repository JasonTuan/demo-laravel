3 buổi

1 - Overview
- PHP
- Laravel

2 - CRUD Application

3 - Hỏi đáp
---------------------------------------
PHP
W3Schools Php turorial

- PHP là ngôn ngữ lập trình phía server
Apache
Nginx

<?php
1 - Overview
PHP
$a = 1;
$A = "Hello";

$array1 = []; // <<<
$array2 = array();

$array1 = [1, 2, 3];
$array1[] = 4;
push($array1, 5);
$array1[0] = 10;

$array2 = [
    "name" => "Nguyen Van A",
    "age" => 20,
    "address" => "Ha Noi"
];
$array2["name"] = "Nguyen Van B"; 

if () {
    // do something
} elseif () {
    // do something
} else {
    // do something
}

Máy Chủ ------- Internet ------ Máy Khách
Server  ------- Internet ------ Client Browser
Apache              
Nginx <<< Chuộm
    Thông dịch PHP

1 page
    demo.php
    Model
        Repository
    Controller
        Action
    View
====================================================
function demo1() {
    echo "Hello";
}

$demo2 = function() {
    echo "Hello";
};

$demo2 = fn() => "Hello";

function demo3($a, $b) {
    return $a + $b;
}

function demo4(int $a, int $b) {
    return $a + $b;
}

echo "Hello World!";

function demo1(int $a, int $b): int {
    return $a + $b;
}

function demo2(int $a, int $c, int $b = 0): int {
    return $a + $b;
}

function demo3(int $a, int $b = 0): int|null {
    return $a + $b;
}

echo demo3(1, null);

function demo4(...$a): int {
    var_dump($a);
    // $a la array
    return $a + $b;
}
====================================================
PHP Class
PRS: convesion



$person = new Person();

class Person {
    
}
====================================================
Database: MySQL
Laravel SRC
    - Model
    - Migration



