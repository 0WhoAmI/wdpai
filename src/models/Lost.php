<?php

class Lost
{
    private $lostDate;
    private $city;
    private $species;
    private $photo;
    private $description;
    private $microchipNumber;
    private $telephone;


    public function __construct($lostDate, $city, $species, $photo, $description, $microchipNumber, $telephone)
    {
        $this->lostDate = $lostDate;
        $this->city = $city;
        $this->species = $species;
        $this->photo = $photo;
        $this->description = $description;
        $this->microchipNumber = $microchipNumber;
        $this->telephone = $telephone;
    }

    public function getLostDate(): ?string
    {
        return $this->lostDate;
    }

    public function setLostDate(string $lostDate)
    {
        $this->lostDate = $lostDate;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getSpecies(): string
    {
        return $this->species;
    }

    public function setSpecies(string $species)
    {
        $this->species = $species;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo)
    {
        $this->photo = $photo;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }


    public function getMicrochipNumber(): ?string
    {
        return $this->microchipNumber;
    }

    public function setMicrochipNumber(string $microchipNumber)
    {
        $this->microchipNumber = $microchipNumber;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }


    public function setTelephone(string $telephone)
    {
        $this->telephone = $telephone;
    }
}
