<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Found.php';

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

    public function reportFinding(Found $found): void{
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
        $id_user=26;

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
}
