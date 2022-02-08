<?php

class Application
{

    private VideoStore $videoStore;


    public function __construct(VideoStore $videoStore)
    {
        $this->videoStore = $videoStore;
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->add_movies(readline("Title: \n"));
                    break;
                case 2:
                    $this->rent_video(readline("Title: \n"));
                    break;
                case 3:
                    $this->return_video();
                    break;
                case 4:
                    $this->list_inventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function add_movies($title)
    {
        $this->videoStore->addFilm($title, 0);
    }

    private function rent_video($title)
    {

        $this->videoStore->rent($title);
    }

    private function return_video()
    {
        foreach($this->videoStore->getRented() as $rented) {
         echo $rented->getTitle() ." ".  $rented->getRating() . "\n";
        }
        $x = readline("Title: \n");
        $this->videoStore->return($x);

        foreach ($this->videoStore as$i=>$check) {
            if($check->getTitle() === $x) {
                $check->addRating(readline("Please Rate this Film: \n"));
            }
        }
    }

    private function list_inventory()
    {
        foreach ($this->videoStore->getInventory() as$see) {
            echo $see->getTitle() . "   Rating: " .$see->getRating() . "\n";
        }
        readline();
    }
}

class VideoStore {

private array $inventory;
private array $rented;


    public function __construct(array $films) {
        foreach ($films as $add) {
            $this->inventory[] = $add;
        }
    }

    public function addFilm($title, $rating) {
        $this->inventory[] = new Video($title, $rating);
    }

    public function getInventory(): array {

        return $this->inventory;
    }

    public function rent(string $title): void {

        foreach ($this->inventory as $video) {
            if ($video->getTitle() === $title) {
                $this->rented[] = $video;
                break;
            }
        }
    }

    public function return(string $title)
    {
        foreach ($this->rented as $video) {
            if ($video->getTitle() === $title) {
                unset($this->rented[array_search($title, $this->rented)]);
                break;
            }
        }
    }

    public function getRented(): array
    {
        return $this->rented;
    }



}

class Video
{

    private string $title;
    private array $ratings = [];
    private bool $watched;

    public function __construct($title, $ratings)
    {
        $this->watched = false;
        $this->title = $title;
        foreach ($ratings as $add) {
            $this->ratings[] = $add;
        }

    }

    public function getRating()
    {
        if(empty($this->ratings)) {
            return 0.0;
        } else {
            return round(array_sum($this->ratings) / count($this->ratings), 1);
        }


    }
    public function addRating($rating) {
        $this->ratings[] = (int) $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getWatched() {
        return $this->watched;
    }



}
$someFilms = [["Lion King", [3,4,2,4,3,3]], ["Black Hood", [5,5,5,4,2,5]], ["Spider Man", [1,4,3,4,5,3]]];
$films = [];

foreach ($someFilms as $construct) {
    $films[] = new Video($construct[0], $construct[1]);
}

$app = new Application(new VideoStore($films));
$app->run();
