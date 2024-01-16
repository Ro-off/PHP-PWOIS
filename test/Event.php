<?php

interface Event{

    public function getDate();
    public function setDate($date);

    public function getCity();
    public function setCity($city);
}

class Olympiad implements Event{

    private $date;
    private $city;

    private $place;

    public function  __construct($date, $city, $place){
        $this->date = $date;
        $this->city = $city;
        $this->place = $place;

    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }
    
    public function getCity(){
        return $this->city;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function getPlace(){
        return $this->place;
    }

    public function setPlace($place){
        $this->place = $place;
    }
}

    class Conference implements Event{
        private $date;
        private $city;

        private $report;

        public function __construct($date, $city, $report){
            $this->date = $date;
            $this->city = $city;
            $this->report = $report;
        }

        public function getDate(){
            return $this->date;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function getCity(){
            return $this->city;
        }

        public function setCity($city){
            $this->city = $city;
        }


        public function getReport(){
            return $this->report;
        }
        public function setReport($report){
            $this->report = $report;
        }
    }

    //Створення об'єкта класу Olympiad
    $olympiad = new Olympiad("16.01.2023", "Sumy", "3");

    //Виведення даних про олімпіаду
    echo "Дата олімпіади: " . $olympiad->getDate() . "\n";
    echo "Місто проведення олімпіади: " . $olympiad->getCity() . "\n";
    echo "Місце студента на олімпіаді: " . $olympiad->getPlace() . "\n";


    //Виведення змінених даних про олімпіаду
    echo "Дата олімпіади: " . $olympiad->getDate() . "\n";
    echo "Місто проведення олімпіади: " . $olympiad->getCity() . "\n";
    echo "Місце студента на олімпіаді: " . $olympiad->getPlace() . "\n";

    //Створення конференції
    $conference = new Conference("16.01.2023", "Sumy", "Lorem");

    echo "Дата конференції: ". $conference->getDate() . "\n";
    echo "Місто: ". $conference->getCity() . "\n";
    echo "Тема: ". $conference->getReport() . "\n";

