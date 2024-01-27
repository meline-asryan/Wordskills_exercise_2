<?php

class Triangle{
    protected $a;
    protected $b;
    protected $c;

    public function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function perimeter() {
        return $this->a + $this->b + $this->c;
    }

    public function area() {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    public function info()
    {
        return "Triangle a={$this->a}, b={$this->b}, c={$this->c}, Perimeter: {$this->perimeter()}, Area: {$this->area()}";
    }
}

class Quadrilateral extends Triangle {
    protected $d;
    protected $e;
    protected $f;

    public function __construct($a, $b, $c, $d, $e, $f) {
        parent::__construct($a, $b, $c);
        $this->d = $d;
        $this->e = $e;
        $this->f = $f;
    }

    public function perimeter() {
        return $this->a + $this->b + $this->c + $this->d;
    }

    public function area() {
        return sqrt((4*pow($this->e,2)*pow($this->f,2)-  pow(  ( pow($this->b,2)+pow($this->d,2)-pow($this->a,2)-pow($this->c,2) ) ,2 ) )/16);
    }
}

$t = new Triangle(2,3,4);
$q = new Quadrilateral(5, 5, 5, 5, 5, 5*sqrt(2));
echo "Info triangle: ". $t->info();
echo "\nInfo quadrilateral: ". $q->info();
