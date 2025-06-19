<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/src/Controller/SessionController.php';
use Src\Service\User\UserLoginService;

final readonly class AdminLoginController extends SessionController {

    private UserLoginService $service;

    public function __construct() {
        $this->service = new UserLoginService();
        // parent::__construct('User/admin/index');
    }
    public function start(): void 
    {

        $email = $_POST['email'];
        $password = $_POST['password'];


        // aca debo buscar por email and password y si es correcto sigo y si falla debo avisar que fallo que intente de nuevo
        $user = $this->service->find($email, $password);
        if (empty($user)) {
            header ('Location: /admin/?e=1');
            die();
        }
        $this->login($user->id());
        // header ('Location: /admin/entertainments');
        //     die();
        
    }
}
