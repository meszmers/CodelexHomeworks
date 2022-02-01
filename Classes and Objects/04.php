<?php

class Movie {
    private string $title;
    private string $studio;
    private string $rating;


    public function __construct(string $title, string $studio, string $rating) {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getRating(): string {
        return $this->rating;
    }

    public function getAllData() : string {
        return "$this->title | $this->studio | $this->rating \n";
    }



}

class MovieList {
    public array $list;

    public function addMovie(Movie $object) {
        $this->list[] = $object;
    }


}
$list = new MovieList();

$x = new Movie("Casino Royale", "Eon Productions", "PG13");
$y = new Movie("Glass", "Buena Vista International", "PG13");
$z = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");
$c = new Movie("Lost One", "Unknown Productions", "K");

$list->addMovie($x);
$list->addMovie($y);
$list->addMovie($z);
$list->addMovie($c);

echo "Different Ratings\n";
echo "PG\n";
echo "PG13\n";
echo "K\n";

$input = readline("What are you looking for?\n");


    foreach ($list->list as $see) {
        if($see->getRating() == $input) {
            echo $see->getAllData();
        }
    }


