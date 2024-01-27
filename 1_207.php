<?php

abstract class Person
{
    protected $name;
    protected $age;

    public function __construct($name, $age)
    {
        $this->name=$name;
        $this->age=$age;
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
    abstract public function hello($diff_person);

    public function introduce()
    {
        $type = strtolower(get_class($this));
        return "My name is {$this->name}. I am {$this->age} old. I am {$type}.\n";
    }
}

class Formalist extends  Person
{
    public function hello($diff_person)
    {
        return "Hello, {$diff_person->name}!!";
    }
}

class Informal extends Person {
    public function hello($diff_person)
    {
        return "Hi, {$diff_person->name}!!";
      //  return "Hi, {$diff_person->getName()}!!";

    }
}

class Realist extends Person
{
    public function hello($diff_person)
    {
        if ($this->age<=5)
        {
            return "Hi, {$diff_person->name}!!";
           // return "Hi, {$diff_person->getName()}!!";
        }
        else{
            return "Hello, {$diff_person->name}!!";
        }
    }

}


$names = ["Alex", "Andrey", "Anastasia", "Iren", "Nataly", "Pavel", "Roman", "Sveta", "Sergey", "Tatyanna"];
$people = [];

for ($i = 0; $i <4; $i++)
{
    $name = $names[array_rand($names)];
    $age = rand(20,40);
    $random_class = rand(1,3);
    if ($random_class == 1){
        $people[] = new Formalist($name, $age);
    }
    elseif ($random_class == 2){
        $people[] = new Informal($name, $age);
    }
    else {
        $people[] = new Realist($name, $age);
    }
}
//print_r($people) ;

foreach ($people as $p)
{
    echo $p->introduce();
}

echo "\n====================================================\n";
echo "Chat";
echo "\n====================================================\n";


for ($i = 0; $i < count($people); $i++) {
    for ($j = $i + 1; $j < count($people); $j++) {
        echo "{$people[$i]->getName()}: {$people[$i]->hello($people[$j])}\n";
    }
}

