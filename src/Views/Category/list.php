<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Categorías</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Helvetica Neue', sans-serif;
    }

    body {
      background-color: #141414;
      color: #fff;
      padding: 40px 20px;
    }

    h1 {
      color: #e50914;
      text-align: center;
      margin-bottom: 40px;
      font-size: 32px;
    }

    .categories-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .category-card {
      background-color: #1f1f1f;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      transition: background-color 0.3s;
      text-decoration: none;
      color: white;
      font-weight: bold;
      font-size: 18px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    }

    .category-card:hover {
      background-color: #e50914;
      color: #fff;
    }
  </style>
</head>
<body>

  <h1>Categorías</h1>

  <div class="categories-grid">
    <?php foreach ($data["categories"] as $category) { ?>
      <a href="/categories/<?php echo $category->id(); ?>" class="category-card">
        <?php echo $category->name(); ?>
      </a>
    <?php } ?>
  </div>

</body>
</html>
