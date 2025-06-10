<?php 

final readonly class PersonRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "person_get",
        "url" => "/person",
        "controller" => "Person/PersonGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "person_get",
        "url" => "/person",
        "controller" => "Person/PersonsGetController.php",
        "method" => "GET"
      ]
    ];
  }
}
