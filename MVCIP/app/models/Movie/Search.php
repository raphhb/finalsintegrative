<?php
class Search
{
    private $movieName = "";

    public function getMovieName() {
        return $this->movieName;
    }

    public function setMovieName($movieName) {
        $this->movieName = $movieName;
    }
}
