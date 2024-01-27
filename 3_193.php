<?php

class Parentt
{
    protected $day;
    protected $month;
    protected $year;

    public function __construct($day, $month, $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }
}

class Childd extends Parentt
{
    private $name;
    private $start_d;
    private $firm;

    public function __construct($day, $month, $year, $name, $start_d, $firm)
    {
        parent::__construct($day, $month, $year);
        $this->name = $name;
        $this->start_d = $start_d;
        $this->firm = $firm;
    }

    public function daySinceStartYear() {
        $cur = new DateTime();
        $sDate = new DateTime($this->start_d); //day month year
        $d_diff = $cur->diff($sDate)->days;
        return $d_diff;
    }
}
$day = readline("Input day: ");
$month = readline("Input month: ");
$year = readline("Input year: ");
$name = readline("Input name: ");
$d = readline("Input date(dd-mm-yy): ");
$firm = readline("Input firm: ");
$m = new Childd($day, $month, $year, $name, $d, $firm);
echo "Days have passed since the medicine was prepared: " . $m->daySinceStartYear();