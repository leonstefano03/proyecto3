<?php 
  $title = 'Entretenimientos - Admin';
  include_once('src/Views/Admin/head.php'); 
  include_once('src/Views/Admin/sidebar.php'); 
?>
 
  <!-- Contenido principal -->
  <div class="main-form">
    <div class="form-container">
      <h2>Editar Entretenimiento</h2>
      <form action="/entertainments/<?php echo $data['entertainment']->id(); ?>" method="POST" enctype="multipart/form-data">

        <label for="type">Tipo:</label>
      <select name="type">
        <option value="1" <?php echo $data['entertainment']->type() == 1 ? 'selected' : ''; ?>>Película</option>
        <option value="2" <?php echo $data['entertainment']->type() == 2 ? 'selected' : ''; ?>>Serie</option>
      </select>

      <label for="releaseDate">Fecha de estreno:</label>
      <input type="datetime-local" name="releaseDate" value="<?php echo $data['entertainment']->releaseDate()->format('Y-m-d\TH:i'); ?>">

      <label for="isFinal">¿Finalizada?</label>
      <select name="isFinal">
        <option value="0" <?php echo $data['entertainment']->isFinal() == 0 ? 'selected' : ''; ?>>No</option>
        <option value="1" <?php echo $data['entertainment']->isFinal() == 1 ? 'selected' : ''; ?>>Sí</option>
      </select>

        <label for="name">Nombre:</label>
        <input type="text" name="name" placeholder="Nombre" value="<?php echo $data['entertainment']->name(); ?>">

        <label for="description">Descripción:</label>
        <input type="text" name="description" placeholder="Descripción" value="<?php echo $data['entertainment']->description(); ?>">

        <label for="categoryId">Categoría:</label>
        <select name="categoryId">
          <?php foreach ($data['categories'] as $category): ?>
            <option value="<?php echo $category->id(); ?>"
              <?php echo $category->id() == $data['entertainment']->categoryId() ? 'selected' : ''; ?>>
              <?php echo $category->name(); ?>
            </option>
          <?php endforeach; ?>
        </select>

        <label for="image">Imagen:</label>
          <div class="image-upload-container">
            <img 
              id="previewImage" 
              src="<?php echo htmlspecialchars($data['entertainment']->imageUrl()); ?>" 
              alt="Imagen actual" 
              class="preview-img"
              onerror="this.style.display='none'"
            >
            
            <label for="image" class="upload-button">
              <i class="fa fa-upload"></i> Elegir imagen
            </label>
            <input type="file" id="image" name="image" accept="image/*" hidden onchange="previewFile(event)">
            
            <span id="fileName" class="file-name"></span>
          </div>

        <button type="submit" class="submit-button">Editar</button>
        <button type="button" class="back-button" onclick="window.location.href='/admin/entertainments'">Cancelar</button>

      </form>
    </div>
      <?php if (!empty($data['comments'])): ?>
    <div class="admin-comments-list">
      <h3 style="margin-top: 40px;margin-bottom: 10px;">Comentarios</h3>

      <?php foreach ($data['comments'] as $comment): ?>
        <div class="admin-comment-item">
          <div class="admin-comment-content">
            <strong><?php echo htmlspecialchars($comment->author() ?? 'Anónimo'); ?>:</strong>
            <p><?php echo nl2br(htmlspecialchars($comment->content())); ?></p>
            <span class="admin-comment-date"><?php echo $comment->date()->format('d/m/Y H:i'); ?></span>
          </div>

          <form action="/comments/delete/<?php echo $comment->id(); ?>" method="POST" class="delete-comment-form" onsubmit="return confirm('¿Eliminar este comentario?')">
            <button type="submit" class="delete-comment-button" title="Eliminar">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p style="margin-top: 40px; color: #aaa;">No hay comentarios para este entretenimiento.</p>
  <?php endif; ?>

  </div>

<?php include_once('src/Views/Admin/footer.php'); ?>
<script>
  function previewFile(event) {
  const input = event.target;
  const file = input.files[0];
  const preview = document.getElementById('previewImage');
  const fileNameDisplay = document.getElementById('fileName');

  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    }
    reader.readAsDataURL(file);

    fileNameDisplay.textContent = file.name;
  } else {
    fileNameDisplay.textContent = '';
    preview.style.display = 'none';
  }
}

</script>