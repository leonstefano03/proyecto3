<?php 

final readonly class CommentRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "comment_get",
        "url" => "/comments",
        "controller" => "Comment/CommentGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "comments_get",
        "url" => "/comments",
        "controller" => "Comment/CommentsGetController.php",
        "method" => "GET"
      ],
      [
        "name" => "comment_get_create",
        "url" => "/admin/comments/create",
        "controller" => "Comment/CommentCreateController.php",
        "method" => "GET"
      ],
      [
        "name" => "comment_create",
        "url" => "/comments",
        "controller" => "Comment/CommentPostController.php",
        "method" => "POST"
      ],
      [
        "name" => "comment_get_update",
        "url" => "/admin/comments/update",
        "controller" => "Comment/CommentUpdateController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "comment_update",
        "url" => "/comments",
        "controller" => "Comment/CommentPutController.php",
        "method" => "POST",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "comment_delete",
        "url" => "/comments/delete",
        "controller" => "Comment/CommentDeleteController.php",
        "method" => "POST",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "comments_admin_index",
        "url" => "/admin/comments",
        "controller" => "Comment/CommentsAdminController.php",
        "method" => "GET"
      ]
    ];
  }
}
