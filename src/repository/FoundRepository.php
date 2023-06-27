<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Found.php';
require_once __DIR__ . '/../models/User.php';

class FoundRepository extends Repository
{
    public function getFound(int $id): ?Found
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM found Where id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $found = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($found == false) {
            return null;
        }

        return new Found(
            $found['foundDate'],
            $found['city'],
            $found['genre'],
            $found['photo'],
            $found['description'],
            $found['microchipNumber'],
            $found['telephone']
        );
    }

    public function reportFinding(Found $found): void
    {
        $date = new DateTime();

        $stmt = $this->database->connect()->prepare('
        INSERT INTO found(
            found_date,
            city,
            genre,
            photo,
            description,
            microchip_number,
            telephone,
            id_user)
            VALUES(?,?,?,?,?,?,?,?)
        ');

        //TODO: Pobieranie id uzytkownika zalogowanego
        $id_user = 26;

        $stmt->execute([
            $found->getFoundDate(),
            $found->getCity(),
            $found->getGenre(),
            $found->getPhoto(),
            $found->getDescription(),
            $found->getMicrochipNumber(),
            $found->getTelephone(),
            $id_user
        ]);
    }

    public function getFounds(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM found;
        ');
        $stmt->execute();
        $founds = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($founds as $found) {
            $result[] = new Found(
                $found['found_date'],
                $found['city'],
                $found['genre'],
                $found['photo'],
                $found['description'],
                $found['microchip_number'],
                $found['telephone']
            );
        }

        return $result;
    }

    public function getFoundByDate(string $searchString)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM found WHERE found_date = :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFoundByCity(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM found WHERE LOWER(city) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFoundByGenre(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM found WHERE LOWER(genre) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFoundByMicrochipNumber(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM found WHERE LOWER(microchip_number) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
