<?php 
  $title = 'Entretenimientos - Admin';
  include_once('src/Views/Admin/head.php'); 
  include_once('src/Views/Admin/sidebar.php'); 
?>

<!-- Contenido principal -->
<div class="main-admin">
  <div class="header">
    <h2>Listado de Entretenimiento</h2>
    <a href="/admin/entertainments/create" class="btn-create">+</a>
  </div>

<div id="alert-box" style="margin-bottom: 20px; display: none; padding: 10px; border-radius: 5px; font-weight: bold;"></div>

  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>¿Finalizado?</th>
        <th>Categoría</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($data['entertainments'] as $entertainment): ?>
        <tr id="entertainment-row-<?php echo $entertainment->id(); ?>">
          <td><?php echo $entertainment->name(); ?></td>
          <td><?php echo $entertainment->type() == 1 ? 'Película' : 'Serie'; ?></td>
          <td><?php echo $entertainment->isFinal() ? 'Sí' : 'No'; ?></td>
          <td>
            <?php 
              foreach ($data['categories'] as $category) {
                if ($category->id() == $entertainment->categoryId()) {
                  echo $category->name();
                  break;
                }
              }
            ?>
          </td>
          <td>
            <a href="/admin/entertainments/update/<?php echo $entertainment->id(); ?>" class="edit-link">
              <i class="fas fa-pen"></i>
            </a>

            <a href="#" class="delete-link" title="Eliminar" onclick="deleteItem(<?php echo $entertainment->id(); ?>)" style="margin-left: 10px;">
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

  function deleteItem(id) {
    if (!confirm('¿Seguro que querés eliminar este entretenimiento?')) return;
    fetch('/entertainments/delete/'+ id , {
      method: 'POST',
    })
    .then(response => {
      if (response.ok) {
        const row = document.getElementById('entertainment-row-' + id);
        if (row) row.remove();
        showMessage('Entretenimiento eliminado correctamente.');
      } else {
        showMessage('Error al eliminar el Entretenimiento.', false);
      }
    })
    .catch(error => {
      console.error('Error:', error);
      showMessage('Error en la solicitud.', false);
    });
  }
</script>
