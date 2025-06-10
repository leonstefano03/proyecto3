<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/src/Controller/SessionController.php';
use Src\Service\User\UserLoginService;

final readonly class AdminLoginController extends SessionController {

    private UserLoginService $service;

    public function __construct() {
        $this->service = new UserLoginService();
        parent::__construct('User/admin/index');
    }
    public function start(): void 
    {

        $username = $_POST['username'];
        $password = $_POST['password'];


        // aca debo buscar por email and password y si es correcto sigo y si falla debo avisar que fallo que intente de nuevo
        
        if ($username == 'leon' && $password == '1') {
            $this->login(1);
        } else {
            echo 'Usuario no encontrado';
        }
        
    }
}
