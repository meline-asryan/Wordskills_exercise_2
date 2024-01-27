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
    private $friends;

    public function __construct($day, $month, $year, $friends = array())
    {
        $this->friends = $friends;
        parent::__construct($day, $month, $year);
    }

    public function daysUntilBirthday()
    {
        $cur = new DateTime();
        $next = new DateTime($cur->format('Y') . '-' . $this->month . '-' . $this->day);

        if ($cur > $next) {
            $next->modify('+1 year');
        }

        $days = $cur->diff($next)->days;
        return $days;
    }
}

$day = readline("Input day: ");
$month = readline("Input month: ");
$year = readline("Input year: ");
echo "====================================================\n";
echo "Friends INFO";
echo "\n====================================================\n";

$friends = [];
for ($i = 0; $i < 2; $i++){
    $name = readline("Input name: ");
    $phone = readline("Input phone: ");
    $d = readline("Input birthday: ");
    $friends[] = array('name' => $name, 'phone' => $phone, 'date' => $d);
}
echo "====================================================\n";

foreach ($friends as $friend) {
    echo "Name: {$friend['name']}, Phone number: {$friend['phone']}, Birthday: {$friend['date']}\n";
}
echo "====================================================\n";


$ch = new Childd($day, $month, $year, $friends);

echo "\nDays before birthday: " . $ch->daysUntilBirthday() . "\n";

