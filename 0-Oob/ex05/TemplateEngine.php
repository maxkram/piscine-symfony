<?php

class TemplateEngine {
    public function createFile(HotBeverage $beverage): void {
        $reflection = new ReflectionClass($beverage);
        $properties = $reflection->getProperties();

        $template = file_get_contents('template.html');

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $propertyName = $property->getName();
            $getter = 'get' . ucfirst($propertyName);
            if (method_exists($beverage, $getter)) {
                $value = $beverage->$getter();
                $template = str_replace("{{ $propertyName }}", $value, $template);
            }
        }

        $className = $reflection->getShortName();
        file_put_contents("$className.html", $template);
    }
}