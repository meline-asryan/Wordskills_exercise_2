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
    private $initials;
    private $eYears;

    public function __construct($day, $month, $year, $initials, $eYears)
    {
        parent::__construct($day, $month, $year);
        $this->initials = $initials;
        $this->eYears = $eYears;
    }

    public function workYears() {
        $cur = new DateTime();
        $eDate = new DateTime($this->eYears); //day month year
        $work_years = $cur->diff($eDate)->y;
        return $work_years;
    }
}
$day = readline("Input day: ");
$month = readline("Input month: ");
$year = readline("Input year: ");
echo "====================================================\n";
echo "Worker INFO";
echo "\n====================================================\n";
$initials = readline("Worker initials: ");
$d = readline("Date(dd-mm-yy): ");
$e = new Childd($day, $month, $year, $initials, $d);
echo "\n====================================================\n";
echo "Initials: {$initials}, Work start date(dd-mm-yy): {$d}\n";

echo "Work years in company: " . $e->workYears();