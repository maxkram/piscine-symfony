<?php

class TemplateEngine {
    public function createFile(HotBeverage $beverage): void {
        // Use ReflectionClass to inspect the object
        $reflection = new ReflectionClass($beverage);
        $properties = $reflection->getProperties();

        // Load the template file
        $template = file_get_contents('template.html');

        // Replace placeholders in the template with actual values
        foreach ($properties as $property) {
            $property->setAccessible(true); // Make private properties accessible
            $propertyName = $property->getName();
            $getter = 'get' . ucfirst($propertyName); // Construct getter method name
            if (method_exists($beverage, $getter)) {
                $value = $beverage->$getter(); // Call the getter to get the value
                $template = str_replace("{{ $propertyName }}", $value, $template);
            }
        }

        // Save the modified template as an HTML file
        $className = $reflection->getShortName(); // Get the class name (e.g., "Coffee" or "Tea")
        file_put_contents("$className.html", $template);
    }
}