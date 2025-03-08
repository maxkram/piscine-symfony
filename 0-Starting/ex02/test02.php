<?php
include('./array2hash.php');

// Test input array
$array = array(array("Pierre", "30"), array("Mary", "28"));

// Call the function and print the result
print_r(array2hash($array));
?>