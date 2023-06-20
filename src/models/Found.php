<?php

class Found
{
    private $city;
    private $genre;
    //TODO:
    //getery,setery,uzupelnic

    public function __construct($city,$genre){
        $this->city = $city;
        $this->genre = $genre;
    }

    public function getCity(): string
    {
        return $this->city;
    }


    public function setCity(string $city)
    {
        $this->city = $city;
    }


    public function getGenre(): string
    {
        return $this->genre;
    }


    public function setGenre(string $genre)
    {
        $this->genre = $genre;
    }
}
