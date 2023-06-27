<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Lost.php';
require_once __DIR__ . '/../repository/LostRepository.php';

class LostController extends AppController
{
    const MAX_FILES_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '../../public/uploads/';

    private $messages = [];
    private $lostRepository;

    public function __construct(){
        parent:: __construct();
        $this->lostRepository = new LostRepository();
    }

    public function lost()
    {
        $losts = $this->lostRepository->getLosts();
        $this->render('lost', ['losts'=>$losts]);
    }
    
    public function reportLost()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );

            $lost = new Lost($_POST['lostDate'], $_POST['city'], $_POST['genre'], $_FILES['file']['name'], $_POST['description'], $_POST['microchipNumber'], $_POST['telephone']);
            $this->lostRepository->reportLost($lost);

            return $this->render('lost', [
                'losts'=> $this->lostRepository->getLosts(),
                'messages' => $this->messages, 'lost' => $lost
            ]);
        }


        return $this->render('report-lost', ['messages' => $this->messages]);
    }

    public function searchLostDate()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) :  '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->lostRepository->getLostByDate($decoded['search']));
        }
    }

    public function searchLostCity()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) :  '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->lostRepository->getLostByCity($decoded['search']));
        }
    }

    public function searchLostGenre()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) :  '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->lostRepository->getLostByGenre($decoded['search']));
        }
    }

    public function searchMicrochipNumber()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) :  '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->lostRepository->getLostByMicrochipNumber($decoded['search']));
        }
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILES_SIZE) {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported.';
            return false;
        }

        return true;
    }
}
