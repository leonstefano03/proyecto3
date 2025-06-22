<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pantalla Principal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="/src/assets/css/app.css">

 
</head>
<body>
  <header class="header-catalogo">
    <h1>Catálogo</h1>
    <div class="search-filter">
      <input type="text" id="search" class="filter" placeholder="Buscar entretenimiento...">

      <select id="categoryFilter">
        <option value="">Todas las categorías</option>
        <?php foreach ($data['categories'] as $category): ?>
          <option value="<?php echo $category->id(); ?>"><?php echo $category->name(); ?></option>
        <?php endforeach; ?>
      </select>

      <select id="typeFilter" class="filter">
        <option value="">Todos los tipos</option>
        <option value="1">Película</option>
        <option value="2">Serie</option>
      </select>

      <select id="dateOrderFilter" class="filter">
        <option value="desc">Más recientes primero</option>
        <option value="asc">Más antiguos primero</option>
      </select>
    </div>

  </header>

   <div class="grid-catalogo" id="entertainmentGrid">
    <?php foreach ($data['entertainments'] as $ent): ?>
      <a href="/entertainments/<?php echo $ent->id(); ?>" class="card-catalogo" data-name="<?php echo strtolower($ent->name()); ?>" data-category="<?php echo $ent->categoryId(); ?>">
        <img src="<?php echo $ent->imageUrl(); ?>" alt="<?php echo htmlspecialchars($ent->name()); ?>">
        <h3><?php echo $ent->name(); ?></h3>
        <p><?php echo $ent->type() == 1 ? 'Película' : 'Serie'; ?></p>
        <p><?php echo $ent->releaseDate()->format('d/m/Y'); ?></p>
      </a>
    <?php endforeach; ?>
    </div>
<script>
  const searchInput = document.getElementById('search');
  const categoryFilter = document.getElementById('categoryFilter');
  const typeFilter = document.getElementById('typeFilter');
  const dateOrderFilter = document.getElementById('dateOrderFilter');
  const cards = document.querySelectorAll('.card-catalogo');

  function filterItems() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedCategory = categoryFilter.value;
    const selectedType = typeFilter.value;
    const selectedOrder = dateOrderFilter.value;

    const cardArray = Array.from(cards);

    // Filtrar tarjetas
    cardArray.forEach(card => {
      const name = card.dataset.name;
      const category = card.dataset.category;
      const type = card.querySelector('p').textContent.includes('Película') ? '1' : '2';

      const matchSearch = name.includes(searchTerm);
      const matchCategory = selectedCategory === '' || selectedCategory === category;
      const matchType = selectedType === '' || selectedType === type;

      card.style.display = (matchSearch && matchCategory && matchType) ? 'block' : 'none';
    });

    // Ordenar las visibles
    const grid = document.getElementById('entertainmentGrid');
    const visibleCards = cardArray.filter(c => c.style.display === 'block');

    visibleCards.sort((a, b) => {
      const dateA = new Date(a.querySelectorAll('p')[1].textContent.split('/').reverse().join('-'));
      const dateB = new Date(b.querySelectorAll('p')[1].textContent.split('/').reverse().join('-'));
      return selectedOrder === 'asc' ? dateA - dateB : dateB - dateA;
    });

    visibleCards.forEach(card => grid.appendChild(card));
  }

  // Eventos
  window.addEventListener('DOMContentLoaded', filterItems);
  searchInput.addEventListener('input', filterItems);
  categoryFilter.addEventListener('change', filterItems);
  typeFilter.addEventListener('change', filterItems);
  dateOrderFilter.addEventListener('change', filterItems);
</script>

</body>
</html>
