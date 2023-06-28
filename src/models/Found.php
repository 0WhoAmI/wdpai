<?php

class Found
{
    private $foundDate;
    private $city;
    private $species;
    private $photo;
    private $description;
    private $microchipNumber;
    private $telephone;


    public function __construct($foundDate, $city, $species, $photo, $description, $microchipNumber, $telephone)
    {
        $this->foundDate = $foundDate;
        $this->city = $city;
        $this->species = $species;
        $this->photo = $photo;
        $this->description = $description;
        $this->microchipNumber = $microchipNumber;
        $this->telephone = $telephone;
    }

    public function getFoundDate(): string
    {
        return $this->foundDate;
    }

    public function setFoundDate(string $foundDate)
    {
        $this->foundDate = $foundDate;
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
