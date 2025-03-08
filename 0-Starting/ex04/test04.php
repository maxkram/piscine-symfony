<?php
include('./capital_city_from.php');

// Test cases
echo capital_city_from('Oregon') . "\n"; // Should output "Salem"
echo capital_city_from('Origan') . "\n"; // Should output "Unknown"
?>