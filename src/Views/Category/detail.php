<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detalle de Categoría</title>
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
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .card {
      background-color: #1f1f1f;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.7);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    h1 {
      color: #e50914;
      margin-bottom: 20px;
      font-size: 28px;
    }

    .info {
      font-size: 18px;
      margin-bottom: 10px;
    }

    .back-link {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #e50914;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .back-link:hover {
      background-color: #b0060e;
    }
  </style>
</head>
<body>

  <div class="card">
    <h1>Detalle de Categoría</h1>
    <div class="info">ID: <?php echo $data["category"]->id(); ?></div>
    <div class="info">Nombre: <?php echo $data["category"]->name(); ?></div>

    <a href="/categories" class="back-link">Volver</a>
  </div>

</body>
</html>
