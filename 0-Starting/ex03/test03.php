<?php
include('./array2hash_sorted.php');

// Test input array
$array = array(array("Pierre", "30"), array("Mary", "28"), array("Nelly", "22"));

// Call the function and print the result
print_r(array2hash_sorted($array));
?>