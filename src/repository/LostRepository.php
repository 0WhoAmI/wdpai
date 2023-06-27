<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Lost.php';
require_once __DIR__ . '/../models/User.php';

class LostRepository extends Repository
{

    public function getLost(int $id): ?Lost
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM lost Where id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $lost = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($lost == false) {
            return null;
        }

        return new Lost(
            $lost['lostDate'],
            $lost['city'],
            $lost['genre'],
            $lost['photo'],
            $lost['description'],
            $lost['microchipNumber'],
            $lost['telephone']
        );
    }

    public function reportLost(Lost $lost): void{
        $date = new DateTime();

        $stmt = $this->database->connect()->prepare('
        INSERT INTO lost(
            lost_date,
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
        $id_user=26;

        $stmt->execute([
            $lost->getLostDate(),
            $lost->getCity(),
            $lost->getGenre(),
            $lost->getPhoto(),
            $lost->getDescription(),
            $lost->getMicrochipNumber(),
            $lost->getTelephone(),
            $id_user
        ]);
    }

    public function getLosts(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM lost;
        ');
        $stmt->execute();
        $losts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($losts as $lost) {
            $result[] = new Lost(
                $lost['lost_date'],
                $lost['city'],
                $lost['genre'],
                $lost['photo'],
                $lost['description'],
                $lost['microchip_number'],
                $lost['telephone']
            );
        }

        return $result;
    }

    public function getLostByDate(string $searchString)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM lost WHERE lost_date = :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLostByCity(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM lost WHERE LOWER(city) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLostByGenre(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM lost WHERE LOWER(genre) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLostByMicrochipNumber(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM lost WHERE LOWER(microchip_number) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
