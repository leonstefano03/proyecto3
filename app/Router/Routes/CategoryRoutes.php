<?php 

final readonly class CategoryRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "category_get",
        "url" => "/categories",
        "controller" => "Category/CategoryGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "category_get",
        "url" => "/categories",
        "controller" => "Category/CategoriesGetController.php",
        "method" => "GET"
      ],
      [
        "name" => "category_get_create",
        "url" => "/admin/categories/create",
        "controller" => "Category/CategoryCreateController.php",
        "method" => "GET"
      ]
      ,
      [
        "name" => "category_create",
        "url" => "/categories",
        "controller" => "Category/CategoryPostController.php",
        "method" => "POST"
      ]
      ,
      [
        "name" => "category_get_update",
        "url" => "/admin/categories/update",
        "controller" => "Category/CategoryUpdateController.php",
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
        "name" => "category_update",
        "url" => "/categories",
        "controller" => "Category/CategoryPutController.php",
        "method" => "POST",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      
      [
        "name" => "category_delete",
        "url" => "/categories/delete",
        "controller" => "Category/CategoryDeleteController.php",
        "method" => "POST",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "categories_admin_index",
        "url" => "/admin/categories",
        "controller" => "Category/CategoriesAdminController.php",
        "method" => "GET"
      ]

    ];
  }
}
