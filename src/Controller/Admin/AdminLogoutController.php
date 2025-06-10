<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/src/Controller/SessionController.php';
final readonly class AdminLogoutController extends SessionController {

    public function start(): void 
    {
        $this->logout();
        
    }
}
