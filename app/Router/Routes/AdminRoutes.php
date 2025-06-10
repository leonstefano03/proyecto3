<?php 

final readonly class AdminRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "admin_login_view",
        "url" => "/admin",
        "controller" => "Admin/AdminLoginViewController.php",
        "method" => "GET"
      ],
      [
        "name" => "admin_login",
        "url" => "/admin/login",
        "controller" => "Admin/AdminLoginController.php",
        "method" => "POST"
      ],
      [
        "name" => "admin_logout",
        "url" => "/admin/logout",
        "controller" => "Admin/AdminLogoutController.php",
        "method" => "GET"
      ]
    ];
  }
}
