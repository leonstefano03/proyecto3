<?php 
  $title = 'Entretenimientos - Admin';  
  include_once('src/Views/Admin/head.php'); 
  include_once('src/Views/Admin/sidebar.php'); 
?>

  <!-- Formulario -->
<div class="main-form">
  <div class="form-container">
    <h2>Agregar Entretenimiento</h2>
    <form action="/entertainments" method="POST" enctype="multipart/form-data" class="row">
      
      <div class="col-md-6">
        <label for="type">Tipo:</label>
        <select name="type" required class="form-control">
          <option value="" disabled selected>Seleccione tipo</option>
          <option value="1">Película</option>
          <option value="2">Serie</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="releaseDate">Fecha de estreno:</label>
        <input type="datetime-local" name="releaseDate" required class="form-control">
      </div>

      <div class="col-md-6">
        <label for="isFinal">¿Finalizada?</label>
        <select name="isFinal" required>
          <option value="0">No</option>
          <option value="1">Sí</option>
        </select>
      </div>

      <div class="col-md-6">
        <label for="name">Nombre:</label>
        <input type="text" name="name" placeholder="Ej: Stranger Things" required>
      </div>

      <div class="col-12">
        <label for="description">Descripción:</label>
        <input type="text" name="description" placeholder="Breve sinopsis..." required>
      </div>

      <div class="col-md-6">
        <label for="categoryId">Categoría:</label>
        <select name="categoryId">
          <?php foreach ($data['categories'] as $category): ?>
            <option value="<?php echo $category->id(); ?>">
              <?php echo $category->name(); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6">
        <label for="image">Imagen:</label>
        <div class="image-upload-container">
          <img id="previewImage" class="preview-img" style="display:none;" alt="Vista previa de la imagen">
          
          <label for="image" class="upload-button">
            <i class="fa fa-upload"></i> Elegir imagen
          </label>
          <input type="file" id="image" name="image" accept="image/*" hidden onchange="previewFile(event)">
          
          <span id="fileName" class="file-name"></span>
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="submit-button">Enviar</button>
        <button type="button" class="back-button" onclick="window.location.href='/admin/entertainments'">Cancelar</button>
      </div>

    </form>
  </div>
</div>


<?php include_once('src/Views/Admin/footer.php'); ?>
<script>function previewFile(event) {
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