<?php

class CSV {
    private $_csv_file = null;

    // @param string $csv_file = "table.csv"

    public function __construct($csv_file) {
        if (file_exists($csv_file)) {
            $this->_csv_file = $csv_file;
        } else {
            throw new Exception("File not found");
        }
    }

    public function setCSV(Array $csv) {
        $handle = fopen($this->_csv_file, "a"); // Open the file for writing

        foreach ($csv as $value) {
            fputcsv($handle, explode(";", $value), ";");
        }

        fclose($handle);
    }

    public function getCSV() {
        $handle = fopen($this->_csv_file, "r"); // Open the file for reading

        $array_line_full = array();
        while (($line = fgetcsv($handle, 0, ";")) !== FALSE) {
            $array_line_full[] = $line;
        }

        fclose($handle);

        return $array_line_full;
    }
}

try {
    $csv = new CSV("table.csv");
    $get_csv = $csv->getCSV();

    foreach ($get_csv as $value) {
        echo "Last name: " . $value[0] . "\n";
        echo "First name: " . $value[1] . "\n";
        echo "Position: " . $value[2] . "\n";
        echo "Salary: " . $value[3] . "\n";
        echo "--------\n";
    }

    $arr = array("Ponomarenko;Ivan;;12000",);
    $csv->setCSV($arr);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}
