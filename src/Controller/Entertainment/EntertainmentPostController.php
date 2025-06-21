<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/SessionController.php';
use Src\Service\Entertainment\EntertainmentCreatorService;

final readonly class EntertainmentPostController extends SessionController {
    private EntertainmentCreatorService $service;

    public function __construct() {
        $this->service = new EntertainmentCreatorService();
    }

    public function start(): void 
    {
        $this->validateUser();

        $type = $_POST['type'];
        $releaseDate = new DateTime($_POST['releaseDate']);
        $isFinal = isset($_POST['isFinal']) && $_POST['isFinal'] !== '' ? (int)$_POST['isFinal'] : 1;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $categoryId = $_POST['categoryId'];

        $imageUrl = null;

        // Manejo de la imagen
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = uniqid() . '_' . basename($_FILES['image']['name']);
            $uploadDir = $_SERVER["DOCUMENT_ROOT"] . '/src/uploads/';
            $imagePath = $uploadDir . $imageName;

            // Creamos el directorio si no existe
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (move_uploaded_file($imageTmpPath, $imagePath)) {
                $imageUrl = '/src/uploads/' . $imageName;
            }
        }

        // Pasamos imageUrl como nuevo parámetro
        $this->service->create($type, $releaseDate, $isFinal, $name, $description, $categoryId, $imageUrl);

        header("Location: /admin/entertainments");
    }
}
