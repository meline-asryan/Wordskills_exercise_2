<?php

abstract class Person
{
    protected $name;
    protected $age;
    protected $experience;

    public function __construct($name, $age, $experience)
    {
        $this->name=$name;
        $this->age=$age;
        $this->experience=$experience;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age): void
    {
        $this->age = $age;
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function setExperience($experience): void
    {
        $this->experience = $experience;
    }
    abstract public function shoot();

}

class Beginner extends Person
{
    public function shoot()
    {
        $r = 0.01*$this->experience;
        return (mt_rand(0,100)<=$r);
    }
}

class Experienced extends Person
{
    public function shoot()
    {
        $r = 0.05*$this->experience;
        return (mt_rand(0,100)<=$r);
    }
}

class Veteran extends Person
{
    public function shoot()
    {
        $r = 0.9 - 0.01*$this->age;
        return (mt_rand(0,100)<=$r);
    }
}

$shotSuccess = false;
$people = [
    new Beginner("Beginner", 19, 1),
    new Experienced("Experienced", 32, 7),
    new Veteran("Veteran", 35, 15),
    new Experienced("Experienced", 25, 6),
    new Beginner("Beginner", 20, 2),
];



foreach ($people as $p){
    $res = $p->shoot();
    echo "\nName: {$p->getName()}, Age: {$p->getAge()}, Experience: {$p->getExperience()} year.\n";
    echo "Shot result: " . ($res ? "Hit!" : "Miss") . "\n";

    if ($res) {
        $shotSuccess=true;
        break;
    }
}

if (!$shotSuccess){
    echo  "\nEveryone has shot, but no one hit the target.\n";
}