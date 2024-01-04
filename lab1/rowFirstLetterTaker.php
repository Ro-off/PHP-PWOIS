<?php
class TextFileProcessor {
    private $inputFilePath;
    private $outputFilePath;

    public function __construct($inputFilePath, $outputFilePath) {
        $this->inputFilePath = $inputFilePath;
        $this->outputFilePath = $outputFilePath;
    }

    public function extractFirstLetters() {
        $inputFile = fopen($this->inputFilePath, "r");
        $outputFile = fopen($this->outputFilePath, "w");

        if ($inputFile && $outputFile) {
            while (($line = fgets($inputFile)) !== false) {
                $words = explode(" ", $line);
                foreach ($words as $word) {
                    $firstLetter = substr($word, 0, 1);
                    fwrite($outputFile, $firstLetter . PHP_EOL);
                }
            }

            fclose($inputFile);
            fclose($outputFile);
            echo "First letters extracted successfully.";
        } else {
            echo "Failed to open files.";
        }
    }
}

// Usage example:
$inputFilePath = "input.txt";
$outputFilePath = "output.txt";

$fileProcessor = new TextFileProcessor($inputFilePath, $outputFilePath);
$fileProcessor->extractFirstLetters();

?>