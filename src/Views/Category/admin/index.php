<?php 
  $title = 'Entretenimientos - Admin';
  include_once('src/Views/Admin/head.php'); 
  include_once('src/Views/Admin/sidebar.php'); 
?>

  <!-- Contenido principal -->
  <div class="main-admin">
    <div class="header">
      <h2>Listado de Categorías</h2>
      <a href="/admin/categories/create" class="btn-create">+</a>
    </div>

    <div id="alert-box" style="margin-bottom: 20px; display: none; padding: 10px; border-radius: 5px; font-weight: bold;"></div>

    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['categories'] as $category): ?>
          <tr id="category-row-<?php echo $category->id(); ?>">
            <td><?php echo $category->name(); ?></td>
            <td>
            <a href="/admin/categories/update/<?php echo $category->id(); ?>" class="edit-link" title="Editar">
              <i class="fas fa-pen"></i>
            </a>

            <a href="#" class="delete-link" title="Eliminar" onclick="deleteCategory(<?php echo $category->id(); ?>)">
              <i class="fas fa-trash"></i>
            </a>
          </td>

          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

<?php include_once('src/Views/Admin/footer.php'); ?>


<script>
  function showMessage(text, success = true) {
    const box = document.getElementById('alert-box');
    box.style.display = 'block';
    box.style.backgroundColor = success ? '#28a745' : '#dc3545';
    box.style.color = '#fff';
    box.textContent = text;
    setTimeout(() => { box.style.display = 'none'; }, 3000);
  }

  function deleteCategory(id) {
    if (!confirm('¿Seguro que querés eliminar esta categoría?')) return;
    fetch('/categories/delete/'+ id , {
      method: 'POST',
    })
    .then(response => {
      if (response.ok) {
        const row = document.getElementById('category-row-' + id);
        if (row) row.remove();
        showMessage('Categoría eliminada correctamente.');
      } else {
        showMessage('Error al eliminar la categoría.', false);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      showMessage('Error en la solicitud.', false);
    });
  }
</script>
