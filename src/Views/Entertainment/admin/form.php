<?php 
  $title = 'Entretenimientos - Admin';
  include_once('src/Views/Admin/sidebar.php'); 
?>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Helvetica Neue', sans-serif;
    }

    body {
      display: flex;
      height: 100vh;
      background-color: #141414;
      color: #fff;
    }

    .sidebar {
      width: 240px;
      background-color: #000;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
    }

    .sidebar h1 {
      color: #e50914;
      font-size: 28px;
      margin-bottom: 40px;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .sidebar a {
      color: #fff;
      text-decoration: none;
      padding: 12px 15px;
      border-radius: 5px;
      margin-bottom: 10px;
      transition: background-color 0.3s;
    }

    .sidebar a:hover {
      background-color: #e50914;
    }

    .main {
      flex: 1;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background-color: #1f1f1f;
      padding: 30px;
      border-radius: 10px;
      width: 100%;
      max-width: 500px;
      box-shadow: 0 0 10px rgba(0,0,0,0.7);
    }

    .form-container h2 {
      color: #fff;
      margin-bottom: 25px;
      text-align: center;
      font-size: 24px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      margin-bottom: 5px;
      font-size: 14px;
      color: #ccc;
    }
select {
  padding: 10px;
  border: none;
  border-radius: 5px;
  margin-bottom: 15px;
  background-color: #333;
  color: #fff;
  appearance: none;
}

    input[type="text"],
    input[type="number"],
    input[type="datetime-local"],
    select {
      padding: 10px;
      border: none;
      border-radius: 5px;
      margin-bottom: 15px;
      background-color: #333;
      color: #fff;
    }

    input[type="submit"] {
      padding: 12px;
      background-color: #e50914;
      border: none;
      border-radius: 5px;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #f40612;
    }.submit-button {
      background-color: #e50914;
      border: none;
      border-radius: 5px;
      color: #fff;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s;
      margin-bottom: 10px;
      display: inline-block;
      padding: 10px 15px;
      text-decoration: none;
      font-size: 14px;
    }

    .submit-button:hover {
      background-color:rgb(133, 13, 19);
    }

    .back-button {
      cursor: pointer;
      display: inline-block;
      padding: 10px 15px;
      background-color: #333;
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-size: 14px;
      transition: background-color 0.3s;
    }

    .back-button:hover {
      background-color: #f40612;
    }

    .image-upload-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 15px;
}

.preview-img {
  max-width: 200px;
  max-height: 250px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(229, 9, 20, 0.7);
  object-fit: cover;
  margin-bottom: 10px;
  transition: opacity 0.3s ease;
}

.upload-button {
  cursor: pointer;
  background-color: #e50914;
  color: #fff;
  padding: 10px 20px;
  border-radius: 30px;
  font-weight: bold;
  font-size: 14px;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  user-select: none;
  transition: background-color 0.3s ease;
}

.upload-button:hover {
  background-color: #b00712;
}

.file-name {
  margin-top: 8px;
  font-size: 13px;
  color: #ccc;
  font-style: italic;
  min-height: 18px;
}

    body, html {
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden; /* evita scroll en todo el body */
}

.main {
  flex: 1;
  padding: 40px;
  display: flex;
  justify-content: center;
  align-items: flex-start; /* arriba, no centrado verticalmente */
  overflow-y: auto; /* scroll vertical si el contenido es alto */
  max-height: 100vh; /* no pasa del viewport */
}

    @media (max-width: 768px) {
      body {
        flex-direction: column;
      }

      .sidebar {
        flex-direction: row;
        width: 100%;
        height: auto;
        padding: 15px;
        justify-content: space-around;
      }
    }
  </style>
  <!-- Formulario -->
  <div class="main">
  <div class="form-container">
    <h2>Agregar Entretenimiento</h2>
    <form action="/entertainments" method="POST" enctype="multipart/form-data">
      
      <label for="type">Tipo:</label>
      <select name="type" required>
        <option value="" disabled selected>Seleccione tipo</option>
        <option value="1">Película</option>
        <option value="2">Serie</option>
      </select>

      <label for="releaseDate">Fecha de estreno:</label>
      <input type="datetime-local" name="releaseDate" required>

      <label for="isFinal">¿Finalizada?</label>
      <select name="isFinal" required>
        <option value="0">No</option>
        <option value="1">Sí</option>
      </select>

      <label for="name">Nombre:</label>
      <input type="text" name="name" placeholder="Ej: Stranger Things" required>

      <label for="description">Descripción:</label>
      <input type="text" name="description" placeholder="Breve sinopsis..." required>

      <label for="categoryId">Categoría:</label>
      <select name="categoryId">
        <?php foreach ($data['categories'] as $category): ?>
          <option value="<?php echo $category->id(); ?>">
            <?php echo $category->name(); ?>
          </option>
        <?php endforeach; ?>
      </select>

      <label for="image">Imagen:</label>
      <div class="image-upload-container">
        <img id="previewImage" class="preview-img" style="display:none;" alt="Vista previa de la imagen">
        
        <label for="image" class="upload-button">
          <i class="fa fa-upload"></i> Elegir imagen
        </label>
        <input type="file" id="image" name="image" accept="image/*" hidden onchange="previewFile(event)">
        
        <span id="fileName" class="file-name"></span>
      </div>

      <button type="submit" class="submit-button">Enviar</button>
      <button type="button" class="back-button" onclick="window.location.href='/admin/entertainments'">Cancelar</button>

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