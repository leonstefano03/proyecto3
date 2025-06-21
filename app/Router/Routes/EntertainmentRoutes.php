<?php 

final readonly class EntertainmentRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "entertainment_get",
        "url" => "/entertainments",
        "controller" => "Entertainment/EntertainmentGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "entertainment_get",
        "url" => "/entertainments",
        "controller" => "Entertainment/EntertainmentsGetController.php",
        "method" => "GET"
      ],
      [
        "name" => "entertainment_get_create",
        "url" => "/admin/entertainments/create",
        "controller" => "Entertainment/EntertainmentCreateController.php",
        "method" => "GET"
      ]
      ,
      [
        "name" => "entertainment_create",
        "url" => "/entertainments",
        "controller" => "Entertainment/EntertainmentPostController.php",
        "method" => "POST"
      ]
      ,
      [
        "name" => "entertainment_get_update",
        "url" => "/admin/entertainments/update",
        "controller" => "Entertainment/EntertainmentUpdateController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ]
      ,
      [
        "name" => "entertainment_update",
        "url" => "/entertainments",
        "controller" => "Entertainment/EntertainmentPutController.php",
        "method" => "POST",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "entertainment_delete",
        "url" => "/entertainments/delete",
        "controller" => "Entertainment/EntertainmentDeleteController.php",
        "method" => "POST",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "entertainment_admin_index",
        "url" => "/admin/entertainments",
        "controller" => "Entertainment/EntertainmentsAdminController.php",
        "method" => "GET"
      ]
    ];
  }
}
