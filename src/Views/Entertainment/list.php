<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Listado de Entretenimientos</title>
  <style>
    body {
      background-color: #141414;
      color: #fff;
      font-family: 'Helvetica Neue', sans-serif;
      padding: 30px;
      margin: 0;
    }

    h1 {
      color: #e50914;
      text-align: center;
      margin-bottom: 40px;
      font-size: 32px;
      letter-spacing: 2px;
    }

    .entertainment-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 25px;
      max-width: 1000px;
      margin: 0 auto;
    }

    .entertainment-card {
      background-color: #1f1f1f;
      border-radius: 8px;
      padding: 15px 20px;
      box-shadow: 0 0 8px rgba(0,0,0,0.8);
      transition: transform 0.3s ease;
      cursor: pointer;
      text-align: center;
    }

    .entertainment-card:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px #e50914;
    }

    .entertainment-name {
      font-weight: bold;
      font-size: 18px;
      color: #fff;
      text-decoration: none;
      display: block;
      margin-bottom: 8px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .entertainment-type {
      font-size: 14px;
      color: #bbb;
      margin-bottom: 5px;
    }

    .entertainment-release {
      font-size: 13px;
      color: #777;
    }

  </style>
</head>
<body>

  <h1>Entretenimientos</h1>

  <div class="entertainment-list">
    <?php foreach ($data["entertainments"] as $entertainment) { ?>
      <a href="/entertainments/<?php echo $entertainment->id(); ?>" class="entertainment-card" title="<?php echo htmlspecialchars($entertainment->description()); ?>">
        <span class="entertainment-name"><?php echo htmlspecialchars($entertainment->name()); ?></span>
        <span class="entertainment-type">
          <?php echo $entertainment->type() == 1 ? 'Película' : 'Serie'; ?>
        </span>
        <span class="entertainment-release">
          Estreno: <?php echo $entertainment->releaseDate()->format('d/m/Y'); ?>
        </span>
      </a>
    <?php } ?>
  </div>

</body>
</html>
