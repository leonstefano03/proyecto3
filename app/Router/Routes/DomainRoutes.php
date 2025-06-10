<?php 

final readonly class DomainRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "domain_get",
        "url" => "/domains",
        "controller" => "Domain/DomainGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "domains_get",
        "url" => "/domains",
        "controller" => "Domain/DomainsGetController.php",
        "method" => "GET"
      ],
      [
        "name" => "domain_get_create",
        "url" => "/admin/domains/create",
        "controller" => "Domain/DomainCreateController.php",
        "method" => "GET"
      ]
      ,
      [
        "name" => "domain_create",
        "url" => "/domains",
        "controller" => "Domain/DomainPostController.php",
        "method" => "POST"
      ]
      ,
      [
        "name" => "domain_get_update",
        "url" => "/admin/domains/update",
        "controller" => "Domain/DomainUpdateController.php",
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
        "name" => "domain_update",
        "url" => "/domains",
        "controller" => "Domain/DomainPutController.php",
        "method" => "POST",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ]
    ];
  }
}
