<?php


class Computer
{
    protected $proc;
    protected $cores_number;
    protected $memory;
    protected $harddisk;

    public function __construct($proc, $cores_number, $memory, $harddisk) {
        $this->proc = $proc;
        $this->cores_number = $cores_number;
        $this->memory = $memory;
        $this->harddisk = $harddisk;
    }

    public function price()
    {
        return ($this->proc*$this->cores_number)/100 + $this->memory/80 + $this->harddisk/20;
    }

    public function isRight() {
        return (
            $this->proc >= 2000 && $this->cores_number >= 2 && $this->memory >= 2048 && $this->harddisk >= 320
        );
    }

    public function info() {
        return "Computer Info: Processor - {$this->proc} MHz, Cores - {$this->cores_number}, Memory - {$this->memory} MB, Hard Disk - {$this->harddisk} GB, Price - {$this->price()}, Right - " . ($this->isRight() ? 'Yes' : 'No');
    }

}


class Laptop extends Computer
{
    protected $battery;
    public function __construct($proc, $cores_number, $memory, $harddisk, $battery) {
        parent::__construct($proc, $cores_number, $memory, $harddisk);
        $this->battery = $battery;
    }

    public function price()
    {
        return parent::price()+ $this->battery /10;
    }

    public function isRight()
    {
        return parent::isRight() && $this->battery>=60;
    }
}

$comp = new Computer(2000,12,5000,520);
$l = new Laptop(2000,12,5000,520,60);

echo "====================================================\n";
echo "Computer INFO\n";
echo $comp->info();
echo "\n====================================================\n";
echo "Laptop INFO\n";
echo $l->info();