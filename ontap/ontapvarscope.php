<?php
/**
 * Created by PhpStorm.
 * User: datdo
 * Date: 2/10/2019
 * Time: 1:36 PM
 */

/**
 * 1 - Global
 */

// global
$x = 10;
echo '<br> biến x global ' . $x;

/**
 * 2 - Local
 */
function test_var_local() {
    $x = 5;
    echo '<br> biến x local ' . $x;
}
test_var_local();

/**
 * 3 - Static
 */

function myTest() {
    static $x = 0;
    echo '<br> test keyword static : ' . $x;
    $x++;
}

myTest();
myTest();
myTest();