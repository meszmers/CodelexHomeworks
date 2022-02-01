<?php

class Date {

    private string $month;
    private string $day;
    private string $year;
    private string $format;

    public function __construct(int $day, int $month, int $year)
    {
        if(strlen($month) < 2) {
            $this->month = "0$month";
        }else $this->month = $month;
        if(strlen($day) < 2) {
            $this->day = "0$day";
        } else $this->day = $day;

        $this->year = $year;
    }
    public function makeFormat() {
        $this->format = implode("/", [$this->day, $this->month, $this->year]);
    }

    public function getTime(): string {
        return $this->format;
    }

}

$time = new Date(2, 4, 2005);
$time->makeFormat();

echo $time->getTime();
