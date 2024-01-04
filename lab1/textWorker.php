<?php
header("Content-Type: text/html; charset=windows-1251");

class WorkWithFile
{
    public $buff;
    public $filename;

    function __construct($filename)
    {
        $uploaddir = './';
        $this->filename = $uploaddir . $filename;

        if (!file_exists($this->filename)) {
            exit("File does not exist");
        }

        $fd = fopen($filename, "r");
        if (!$fd) {
            exit("File open error");
        }

        $this->buff = fread($fd, filesize($this->filename));
        fclose($fd);
    }

    function getContent()
    {
        return $this->buff;
    }

    function getsize()
    {
        return filesize($this->filename);
    }

    function getCount()
    {
        if (!empty($this->filename)) {
            $arr = file($this->filename);
            return count($arr);
        } else {
            return 0;
        }
    }
}

$first = new WorkWithFile("count.txt");
echo "{$first->getContent()}<br>";
echo "{$first->getsize()}<br>";
echo "{$first->getCount()}<br>";
?>
