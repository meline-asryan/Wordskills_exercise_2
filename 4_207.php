<?php

abstract class SteelSheet
{
    protected $thickness; // mm
    protected $density; // kg/m^3

    public function __construct($thickness, $density)
    {
        $this->thickness = $thickness;
        $this->density = $density;
    }

    abstract public function area();

    public function weight()
    {
        return $this->area() * $this->thickness * $this->density;
    }

    abstract public function info();
}

class Square extends SteelSheet
{
    protected $side; // mm

    public function __construct($thickness, $density, $side)
    {
        parent::__construct($thickness, $density);
        $this->side = $side;
    }

    public function area()
    {
        return pow($this->side, 2);
    }

    public function info()
    {
        return "Square SS: Side - {$this->side}mm, Thickness - {$this->thickness}mm, Density - {$this->density}kg/m^3";
    }
}

class Rectangle extends SteelSheet
{
    protected $w; //  mm
    protected $l; //  mm

    public function __construct($thickness, $density, $w, $l)
    {
        parent::__construct($thickness, $density);
        $this->w = $w;
        $this->l = $l;
    }

    public function area()
    {
        return $this->w * $this->l;
    }

    public function info()
    {
        return "Rectangle Steel Sheet: Width - {$this->w}mm, Length - {$this->l}mm, Thickness - {$this->thickness}mm, Density - {$this->density}kg/m^3";
    }
}


class Triangle extends SteelSheet
{
    protected $base; //  mm
    protected $h; //  mm

    public function __construct($thickness, $density, $base, $h)
    {
        parent::__construct($thickness, $density);
        $this->base = $base;
        $this->h = $h;
    }

    public function area()
    {
        return 0.5 * $this->base * $this->h;
    }

    public function info()
    {
        return "Triangle SS: Base - {$this->base}mm, Height - {$this->h}mm, Thickness - {$this->thickness}mm, Density - {$this->density}kg/m^3";
    }
}

$steelSheets = [];
for ($i = 0; $i < 5; $i++) {
    $side = rand(100, 200);
    $thickness = rand(1, 10);
    $density = rand(7000, 8000) / 1000;
    $steelSheets[] = new Square($side, $thickness, $density);
}

for ($i = 0; $i < 7; $i++) {
    $w = rand(100, 200);
    $l = rand(150, 300);
    $thickness = rand(1, 10);
    $density = rand(7000, 8000) / 1000;
    $steelSheets[] = new Rectangle($w, $l, $thickness, $density);
}

for ($i = 0; $i < 3; $i++) {
    $base = rand(100, 200);
    $h = rand(50, 150);
    $thickness = rand(1, 10);
    $density = rand(7000, 8000) / 1000;
    $steelSheets[] = new Triangle($base, $h, $thickness, $density);
}

$totalArea = 0;
$totalWeight = 0;

foreach ($steelSheets as $s)
{
    echo $s->info() . "\n";
    $totalArea += $s->area();
    $totalWeight += $s->weight();
}

echo "\n====================================================\n";
echo "\nTotal Area all: {$totalArea} mm^2\n";
echo "Total Weight all: {$totalWeight} kg\n";