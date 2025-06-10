<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detalle de Entretenimiento</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Montserrat', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #141414;
      color: #eee;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .card {
      background-color: #222;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(229, 9, 20, 0.7);
      max-width: 600px;
      width: 100%;
      padding: 30px 40px;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 12px 32px rgba(229, 9, 20, 0.9);
    }

    h1 {
      font-size: 1.8rem;
      font-weight: 900;
      color: #e50914;
      margin-bottom: 24px;
      letter-spacing: 3px;
      text-align: center;
      text-transform: uppercase;
    }

    .field {
      margin-bottom: 10px;
    }

    .label {
      font-size: 0.9rem;
      font-weight: 700;
      color: #aaa;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 5px;
      display: block;
    }

    .value {
      font-size: 0.8rem;
      color: #fff;
      font-weight: 500;
      word-wrap: break-word;
    }

    /* Badge style para tipo y finalizado */
    .badge {
      display: inline-block;
      padding: 4px 12px;
      border-radius: 20px;
      font-weight: 700;
      font-size: 0.8rem;
      color: #141414;
    }

    .badge.movie {
      background-color: #e50914;
    }

    .badge.series {
      background-color: #b81d24;
    }

    .badge.yes {
      background-color: #27ae60;
      color: white;
    }

    .badge.no {
      background-color: #999;
      color: #222;
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
    <h1>Detalle Entretenimiento</h1>

    <div class="field">
      <span class="label">ID</span>
      <span class="value"><?php echo $data["entertainment"]->id(); ?></span>
    </div>

    <div class="field">
      <span class="label">Nombre</span>
      <span class="value"><?php echo $data["entertainment"]->name(); ?></span>
    </div>

    <div class="field">
      <span class="label">Tipo</span>
      <span class="value">
        <?php if ($data["entertainment"]->type() == 1): ?>
          <span class="badge movie">Película</span>
        <?php else: ?>
          <span class="badge series">Serie</span>
        <?php endif; ?>
      </span>
    </div>

    <div class="field">
      <span class="label">Fecha de estreno</span>
      <span class="value"><?php echo $data["entertainment"]->releaseDate()->format('d/m/Y H:i'); ?></span>
    </div>

    <div class="field">
      <span class="label">¿Finalizada?</span>
      <span class="value">
        <?php if ($data["entertainment"]->isFinal() == 1): ?>
          <span class="badge yes">Sí</span>
        <?php else: ?>
          <span class="badge no">No</span>
        <?php endif; ?>
      </span>
    </div>

    <div class="field">
      <span class="label">Descripción</span>
      <span class="value"><?php echo $data["entertainment"]->description(); ?></span>
    </div>

    <div class="field">
      <span class="label">ID de Categoría</span>
      <span class="value"><?php echo $data["entertainment"]->categoryId(); ?></span>
    </div>
		<a href="/entertainments" class="back-link">Volver</a>

  </div>
</body>
</html>
