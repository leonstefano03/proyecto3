<?php 
  $title = 'Entretenimientos - Admin';
  include_once('src/Views/Admin/head.php'); 
  include_once('src/Views/Admin/sidebar.php'); 
?>

  <!-- Contenido principal -->
  <div class="main-form">
    <div class="form-container">
      <h2>Editar Categoría</h2>


      <!-- Formulario -->
      <form action="/categories/<?php echo $data['category']->id(); ?>" method="POST">
        <label for="name">Nombre</label>
        <input type="text" name="name" placeholder="Nombre" value="<?php echo $data['category']->name(); ?>">
        <button type="submit" class="submit-button">Guardar</button>
        <button type="button" class="back-button" onclick="window.location.href='/admin/categories'">Cancelar</button>
      </form>
    </div>
  </div>

<?php include_once('src/Views/Admin/footer.php'); ?>
