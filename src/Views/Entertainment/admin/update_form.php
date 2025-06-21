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

    input[type="text"],
    input[type="int"],
    input[type="datetime-local"] {
      padding: 10px;
      border: none;
      border-radius: 5px;
      margin-bottom: 15px;
      background-color: #333;
      color: #fff;
    }

    .submit-button {
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

    select {
  padding: 10px;
  border: none;
  border-radius: 5px;
  margin-bottom: 15px;
  background-color: #333;
  color: #fff;
  appearance: none;
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
  border-radius: 5px;
  padding: 10px 20px; 
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
img {
      width: 100%;
      height: 200px; /* o el alto que prefieras */
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 10px;
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
  <!-- Contenido principal -->
  <div class="main">
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