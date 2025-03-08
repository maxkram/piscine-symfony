<?php
function array2hash($array) {
    $hash = array(); // Initialize an empty associative array

    // Iterate through each sub-array
    foreach ($array as $subArray) {
        $name = $subArray[0]; // Name is the first element
        $age = $subArray[1];  // Age is the second element
        $hash[$age] = $name;  // Add to the hash with age as key and name as value
    }

    return $hash; // Return the resulting hash
}
?>