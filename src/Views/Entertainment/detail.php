<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $data["entertainment"]->name(); ?> - Detalle</title>
  <link rel="stylesheet" href="/src/assets/css/app.css">

</head>
<body>
  <div class="main-detail">
  <div class="container-detail">
    <div class="image-detail">
      <img src="<?php echo $data["entertainment"]->imageUrl(); ?>" alt="Imagen de <?php echo htmlspecialchars($data["entertainment"]->name()); ?>">
    </div>
    <div class="details">
      <h1><?php echo $data["entertainment"]->name(); ?></h1>
      <p><span class="label-detail">Tipo:</span> <?php echo $data["entertainment"]->type() == 1 ? 'Película' : 'Serie'; ?></p>
      <p><span class="label-detail">Fecha de estreno:</span> <?php echo $data["entertainment"]->releaseDate()->format('d/m/Y'); ?></p>
      <p><span class="label-detail">¿Finalizada?:</span> <?php echo $data["entertainment"]->isFinal() ? 'Sí' : 'No'; ?></p>
      <p><span class="label-detail">Descripción:</span><br><?php echo nl2br(htmlspecialchars($data["entertainment"]->description())); ?></p>
      <a class="submit-button" href="/entertainments">← Volver al catálogo</a>
    </div>
  </div>
  <div class="container-detail comments">
  <h2 style="color: #e50914;">Comentarios</h2>

  <!-- Lista de comentarios existentes -->
  <div id="commentList">
    <?php if (!empty($data['comments'])): ?>
      <?php foreach ($data['comments'] as $comment): ?>
        <div  class="comment-item">
          <p><strong><?php echo htmlspecialchars($comment->author() ?? 'Anónimo'); ?>:</strong></p>
          <p><?php echo nl2br(htmlspecialchars($comment->content())); ?></p>
          <p><?php echo $comment->date()->format('d/m/Y H:i'); ?></p>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p style="color: #888;">Aún no hay comentarios. ¡Sé el primero!</p>
    <?php endif; ?>
  </div>
  <!-- Botón para mostrar el formulario -->
<button id="showCommentForm">
  Agregar comentario
</button>

<!-- Formulario oculto inicialmente -->
<form id="commentForm" action="/comments" method="POST">
  <input type="hidden" name="entertainmentId" value="<?php echo $data['entertainment']->id(); ?>">
  
  <label for="author">Tu nombre (opcional):</label>
  <input type="text" name="author" id="author" placeholder="Ej: Juan o dejar vacío para Anónimo">

  <label for="content">Comentario:</label>
  <textarea name="content" id="content" rows="4" required placeholder="Escribí tu comentario..."></textarea>

  <button type="submit">Enviar comentario</button>
</form>
</div>
</div>
</body>
</html>
<script>
  const showBtn = document.getElementById('showCommentForm');
  const form = document.getElementById('commentForm');

  showBtn.addEventListener('click', () => {
    form.style.display = 'block';
    showBtn.style.display = 'none';
    form.scrollIntoView({ behavior: 'smooth' });
  });
</script>
