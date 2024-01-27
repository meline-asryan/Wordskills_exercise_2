<?php

class Car{
    protected $name;
    protected $speed_max;

    public function __construct($name, $speed_max)
    {
        $this->name = $name;
        $this->speed_max = $speed_max;
    }

    public function carPrice()
    {
        $p = $this->speed_max*100;
        return $p;
    }

    public function updModel()
    {
        $this->speed_max+=10;
        return $this->speed_max;
    }

    public function info()
    {
        return "Name: {$this->name}, Max speed: {$this->speed_max}, Price: {$this->carPrice()}";
    }

}

class AnotherCar extends Car{
    public function carPrice()
    {
        $p = $this->speed_max*250;
        return $p;
    }
    public function updModel()
    {
        $this->speed_max+=5;
        return $this->speed_max;
    }
}

$car = new Car("Car",140);
$another_car = new AnotherCar("Another Car",160);

echo "Info: ". $car->info();
$car->updModel();
echo "\nUpdate info: ". $car->info();

echo "\n====================================================\n";
echo "Info: ". $another_car->info();
$another_car->updModel();
echo "\nUpdate info: ". $another_car->info();