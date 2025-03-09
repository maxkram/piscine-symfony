<?php
class TemplateEngine {
    // Method to create a new file by replacing placeholders in a template
    public function createFile($fileName, $templateName, $parameters) {
        // Read the template file
        if (!file_exists($templateName)) {
            throw new Exception("Template file not found: $templateName");
        }

        $templateContent = file_get_contents($templateName);

        // Replace placeholders with values from the parameters array
        foreach ($parameters as $placeholder => $value) {
            $templateContent = str_replace("{{$placeholder}}", $value, $templateContent);
        }

        // Write the modified content to the output file
        if (file_put_contents($fileName, $templateContent)) {
            echo "File '$fileName' created successfully.\n";
        } else {
            throw new Exception("Failed to create file: $fileName");
        }
    }
}
?>