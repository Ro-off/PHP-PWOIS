<?php

// Абстрактний клас для автомобілів
abstract class CarPrototype
{
    abstract public function cloneCar(): CarPrototype;
    abstract public function getInfo(): string;
}

// Конкретний клас для вітчизняних автомобілів
class UkrainianCar extends CarPrototype
{
    public function cloneCar(): CarPrototype
    {
        return clone $this;
    }

    public function getInfo(): string
    {
        return "Вітчизняна легкова машина";
    }
}

// Конкретний клас для зарубіжних автомобілів
class ForeignCar extends CarPrototype
{
    public function cloneCar(): CarPrototype
    {
        return clone $this;
    }

    public function getInfo(): string
    {
        return "Зарубіжна легкова машина";
    }
}

// Клас для створення парку автомобілів за допомогою прототипів
class CarPark
{
    private $carPrototypes = [];

    public function addPrototype(string $type, CarPrototype $prototype)
    {
        $this->carPrototypes[$type] = $prototype;
    }

    public function createCar(string $type): CarPrototype
    {
        if (isset($this->carPrototypes[$type])) {
            return $this->carPrototypes[$type]->cloneCar();
        }

        throw new InvalidArgumentException("Invalid car type: $type");
    }
}

// Приклад використання
$carPark = new CarPark();

// Додавання прототипів для вітчизняних та зарубіжних автомобілів
$carPark->addPrototype('ua', new UkrainianCar());
$carPark->addPrototype('foreign', new ForeignCar());

// Створення парку автомобілів за допомогою прототипів
$cars = [];

for ($i = 0; $i < 10; $i++) {
    $cars[] = $carPark->createCar('ua');
}

for ($i = 0; $i < 5; $i++) {
    $cars[] = $carPark->createCar('foreign');
}

// Демонстрація результатів
foreach ($cars as $car) {
    echo $car->getInfo() . "\n";
}
