<?php 
// Абстрактний клас для легкової машини
abstract class Car
{
    abstract public function getInfo();
}

// Абстрактний клас для вантажівки
abstract class Truck
{
    abstract public function getInfo();
}

// Абстрактний клас для автобуса
abstract class Bus
{
    abstract public function getInfo();
}

// Абстрактна фабрика
abstract class AbstractFactory
{
    abstract public function createCar(): Car;
    abstract public function createTruck(): Truck;
    abstract public function createBus(): Bus;
}

// Фабрика для вітчизняних автомобілів
class UkrainianFactory extends AbstractFactory
{
    public function createCar(): Car
    {
        return new UkrainianCar();
    }

    public function createTruck(): Truck
    {
        return new UkrainianTruck();
    }

    public function createBus(): Bus
    {
        return new UkrainianBus();
    }
}

// Фабрика для зарубіжних автомобілів
class ForeignFactory extends AbstractFactory
{
    public function createCar(): Car
    {
        return new ForeignCar();
    }

    public function createTruck(): Truck
    {
        return new ForeignTruck();
    }

    public function createBus(): Bus
    {
        return new ForeignBus();
    }
}

// Конкретні класи для вітчизняних автомобілів
class UkrainianCar extends Car
{
    public function getInfo()
    {
        return "Вітчизняна легкова машина";
    }
}

class UkrainianTruck extends Truck
{
    public function getInfo()
    {
        return "Вітчизняна вантажівка";
    }
}

class UkrainianBus extends Bus
{
    public function getInfo()
    {
        return "Вітчизняний автобус";
    }
}

// Конкретні класи для зарубіжних автомобілів
class ForeignCar extends Car
{
    public function getInfo()
    {
        return "Зарубіжна легкова машина";
    }
}

class ForeignTruck extends Truck
{
    public function getInfo()
    {
        return "Зарубіжна вантажівка";
    }
}

class ForeignBus extends Bus
{
    public function getInfo()
    {
        return "Зарубіжний автобус";
    }
}


// Читання конфігураційних параметрів
$config = [
    'factory' => 'ua',   // або 'foreign'
    'carNum'  => 10,
    'truckNum' => 2,
    'busNum'  => 4,
];

// Визначення типу фабрики
if ($config['factory'] === 'ua') {
    $factory = new UkrainianFactory();
} else {
    $factory = new ForeignFactory();
}

// Створення парку автомобілів
$cars = [];
$trucks = [];
$buses = [];

// Створення легкових машин
for ($i = 0; $i < $config['carNum']; $i++) {
    $cars[] = $factory->createCar();
}

// Створення вантажівок
for ($i = 0; $i < $config['truckNum']; $i++) {
    $trucks[] = $factory->createTruck();
}

// Створення автобусів
for ($i = 0; $i < $config['busNum']; $i++) {
    $buses[] = $factory->createBus();
}

// Демонстрація результатів
foreach ($cars as $car) {
    echo $car->getInfo() . "\n";
}

foreach ($trucks as $truck) {
    echo $truck->getInfo() . "\n";
}

foreach ($buses as $bus) {
    echo $bus->getInfo() . "\n";
}

?>