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
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .header h2 {
      font-size: 28px;
    }

    .btn-create {
      padding: 10px 20px;
      background-color: #e50914;
      border: none;
      border-radius: 5px;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .btn-create:hover {
      background-color: #f40612;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #1f1f1f;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.7);
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #333;
    }

    th {
      background-color: #e50914;
      color: #fff;
      text-transform: uppercase;
      font-size: 14px;
    }

    td {
      color: #ccc;
    }

    th:last-child {
      text-align: right;
    }

    td:last-child {
      text-align: right;
    }


    a.edit-link {
      color: #e50914;
      text-decoration: none;
      font-size: 16px;
    }

    a.edit-link:hover {
      color: #f40612;
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

      .header {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }
    }
  </style>

  <!-- Contenido principal -->
  <div class="main">
    <div class="header">
      <h2>Listado de Categorías</h2>
      <a href="/admin/categories/create" class="btn-create">+</a>
    </div>

    <div id="alert-box" style="margin-bottom: 20px; display: none; padding: 10px; border-radius: 5px; font-weight: bold;"></div>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['categories'] as $category): ?>
          <tr id="category-row-<?php echo $category->id(); ?>">
            <td><?php echo $category->id(); ?></td>
            <td><?php echo $category->name(); ?></td>
            <td>
              <a href="/admin/categories/update/<?php echo $category->id(); ?>" class="edit-link" title="Editar">
                <i class="fas fa-pen"></i>
              </a>

              <a href="#" class="edit-link" title="Eliminar" onclick="deleteCategory(<?php echo $category->id(); ?>)" style="margin-left: 10px;">
                <i class="fas fa-trash" style="color:#e50914;"></i>
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
