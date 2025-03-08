<?php
function array2hash_sorted($array) {
    $hash = array(); // Initialize an empty associative array

    // Iterate through each sub-array
    foreach ($array as $subArray) {
        $name = $subArray[0]; // Name is the first element
        $age = $subArray[1];  // Age is the second element
        $hash[$name] = $age;  // Add to the hash with name as key and age as value
    }

    // Sort the hash by keys in reverse alphabetical order
    krsort($hash);

    return $hash; // Return the sorted hash
}
?>