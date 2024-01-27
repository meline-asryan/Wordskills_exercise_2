<?php

abstract class Student
{
    protected $initials;
    protected $attendedClasses;
    protected $totalClasses = 20;

    public function __construct($initials, $attendedClasses)
    {
        $this->initials = $initials;
        $this->attendedClasses = $attendedClasses;
    }
    public function getInitials()
    {
        return $this->initials;
    }
    public function setInitials($initials): void
    {
        $this->initials = $initials;
    }

    public function getAttendedClasses()
    {
        return $this->attendedClasses;
    }

    public function setAttendedClasses($attendedClasses): void
    {
        $this->attendedClasses = $attendedClasses;
    }

    public function getTotalClasses(): int
    {
        return $this->totalClasses;
    }

    public function setTotalClasses(int $totalClasses): void
    {
        $this->totalClasses = $totalClasses;
    }


    abstract public function passExam();

}

class Regular extends Student
{
    public function passExam()
    {
        if ($this->attendedClasses == $this->totalClasses) {
            return true;
        } elseif ($this->attendedClasses > $this->totalClasses / 2) {
            return (rand(0, 1) == 1);
        } else {
            return false;
        }
    }
}

class Smart extends Student
{
    public function passExam()
    {
        if ($this->attendedClasses == $this->totalClasses) {
            return true;
        } elseif ($this->attendedClasses > $this->totalClasses / 2) {
            return (rand(0, 9) < 7);
        } else {
            return false;
        }
    }
}

class Genius extends Student
{
    public function passExam()
    {
        return ($this->attendedClasses > 0);
    }
}

$students = [
    new Regular('Nancy', 10),
    new Regular('Aram', 20),
    new Regular('Robert', 11),
    new Regular('Erik', 1),
    new Regular('Sveta', 0),
    new Smart('Sofi', 0),
    new Smart('Minas', 5),
    new Smart('Emma', 10),
    new Smart('Vardan', 12),
    new Genius('Oleg', 0),
];

foreach ($students as $s){
    echo "\n{$s->getInitials()} attended {$s->getAttendedClasses()}/{$s->getTotalClasses()} classes.\n";
    echo $s->passExam() ? "Passed the exam!\n" : "Failed the exam.\n";
    echo "\n====================================================\n";

}