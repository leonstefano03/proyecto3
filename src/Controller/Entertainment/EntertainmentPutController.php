<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/SessionController.php';

use Src\Service\Entertainment\EntertainmentUpdaterService;

final readonly class EntertainmentPutController extends SessionController {
    private EntertainmentUpdaterService $service;

    public function __construct() {
        $this->service = new EntertainmentUpdaterService();
    }

    public function start($id): void 
    {
        $this->validateUser();

        // Primero obtén la URL actual de la imagen para mantenerla si no se sube nueva
        // Asumo que tienes un método para obtener la entidad actual:
        $entertainment = $this->service->find($id);
        $existingImageUrl = $entertainment ? $entertainment->imageUrl() : '';

        $type = $_POST['type'];
        $releaseDate = new DateTime($_POST['releaseDate']);
        $isFinal = $_POST['isFinal'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $categoryId = $_POST['categoryId'];

        // Manejo de la imagen subida
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/src/uploads/';
            $tmpName = $_FILES['image']['tmp_name'];
            $fileName = basename($_FILES['image']['name']);
            
            // Generar un nombre único para evitar sobreescritura
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid('ent_') . '.' . $ext;
            
            $destination = $uploadDir . $newFileName;

            if (move_uploaded_file($tmpName, $destination)) {
                // Ruta para guardar en DB, relativa al root web
                $imageUrl = '/src/uploads/' . $newFileName;
            } else {
                // Si falla la subida, conservar la imagen existente o manejar error
                $imageUrl = $existingImageUrl;
            }
        } else {
            // No se subió nueva imagen, conservar la existente
            $imageUrl = $existingImageUrl;
        }

        // Ahora actualiza pasando la URL de la imagen también
        $this->service->update($id, $type, $releaseDate, $isFinal, $name, $description, $categoryId, $imageUrl);

        header("Location: /admin/entertainments");
    }
}
