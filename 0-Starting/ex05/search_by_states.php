<?php
function search_by_states($input) {
    // Define the states and their abbreviations
    $states = [
        'Oregon' => 'OR',
        'Alabama' => 'AL',
        'New Jersey' => 'NJ',
        'Colorado' => 'CO',
    ];

    // Define the capitals mapped by their state abbreviations
    $capitals = [
        'OR' => 'Salem',
        'AL' => 'Montgomery',
        'NJ' => 'trenton',
        'KS' => 'Topeka',
    ];

    // Split the input string into an array of items
    $items = explode(',', $input);

    // Initialize an array to store the results
    $results = [];

    // Iterate through each item
    foreach ($items as $item) {
        $item = trim($item); // Remove leading/trailing whitespace

        // Check if the item is a state
        if (array_key_exists($item, $states)) {
            $abbreviation = $states[$item];
            if (array_key_exists($abbreviation, $capitals)) {
                $capital = $capitals[$abbreviation];
                $results[] = "$capital is the capital of $item.";
            }
        }
        // Check if the item is a capital
        elseif (in_array($item, $capitals)) {
            $abbreviation = array_search($item, $capitals);
            $state = array_search($abbreviation, $states);
            if ($state !== false) {
                $results[] = "$item is the capital of $state.";
            } else {
                $results[] = "$item is neither a capital nor a state.";
            }
        }
        // If the item is neither a state nor a capital
        else {
            $results[] = "$item is neither a capital nor a state.";
        }
    }

    // Output the results
    foreach ($results as $result) {
        echo $result . "\n";
    }
}
?>