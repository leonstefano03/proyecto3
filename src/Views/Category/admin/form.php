<?php 
  $title = 'Entretenimientos - Admin';
  include_once('src/Views/Admin/head.php'); 
  include_once('src/Views/Admin/sidebar.php'); 
?>
  
  <!-- Contenido principal -->
  <div class="main-form">
    <div class="form-container">
      <h2>Crear Categoría</h2>
      <form action="/categories" method="POST">
        <label for="name">Nombre de la Categoría:</label>
        <input type="text" name="name" placeholder="Nombre">
        <button type="submit" class="submit-button">Guardar</button>
        <button type="button" class="back-button" onclick="window.location.href='/admin/categories'">Cancelar</button>
      </form>
    </div>
  </div>

<?php include_once('src/Views/Admin/footer.php'); ?>
