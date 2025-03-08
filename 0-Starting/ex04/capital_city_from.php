<?php
function capital_city_from($state) {
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

    // Check if the state exists in the $states array
    if (array_key_exists($state, $states)) {
        $abbreviation = $states[$state]; // Get the state abbreviation

        // Check if the abbreviation exists in the $capitals array
        if (array_key_exists($abbreviation, $capitals)) {
            return $capitals[$abbreviation]; // Return the capital city
        }
    }

    // If the state or capital is not found, return "Unknown"
    return "Unknown";
}
?>