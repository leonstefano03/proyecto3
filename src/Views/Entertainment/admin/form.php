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
      <form action="/entertainments" method="POST">

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

        <button type="submit" class="submit-button">Enviar</button>
        <button type="button" class="back-button" onclick="window.location.href='/admin/entertainments'">Cancelar</button>

      </form>
    </div>
  </div>

<?php include_once('src/Views/Admin/footer.php'); ?>
