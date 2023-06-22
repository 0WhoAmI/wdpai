<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Found.php';

class ReportFindingController extends AppController
{
    const MAX_FILES_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '../../public/uploads/';

    private $messages = [];

    public function reportFinding()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
            );

            $found = new Found($_POST['foundDate'], $_POST['city'], $_POST['genre'], $_FILES['file']['name'], $_POST['description'], $_POST['microchipNumber'], $_POST['telephone']);

            return $this->render('found', ['messages' => $this->messages, 'found' => $found]);
        }


        return $this->render('report-finding', ['messages' => $this->messages]);
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
