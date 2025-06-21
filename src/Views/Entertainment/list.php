<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pantalla Principal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      background-color: #141414;
      font-family: 'Helvetica Neue', sans-serif;
      color: #fff;
    }

    header {
      padding: 20px;
      background-color: #000;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    header h1 {
      color: #e50914;
      margin-bottom: 15px;
    }

    #search{
      background-color: #e50914;
      color: #000;
    }
    #categoryFilter{
      background-color: #e50914;
    }
    .search-filter {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }
 .search-filter input[type="text"]::placeholder {
        color: #000;
      }
   
 .search-filter input[type="text"],    
 .search-filter select {
      padding: 10px;
      border-radius: 5px;
      border: none;
      outline: none;

      
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 20px;
      padding: 40px;
    }

    .card {
      background-color: #1f1f1f;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.7);
      transition: transform 0.3s;
      text-align: center;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 0 15px #e50914;
    }

    .card h3 {
      font-size: 18px;
      margin: 10px 0;
    }

    .card p {
      font-size: 14px;
      color: #aaa;
    }

    .card img {
      width: 100%;
      height: 200px; /* o el alto que prefieras */
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 10px;
    }


    @media (max-width: 600px) {
      .search-filter {
        flex-direction: column;
        align-items: stretch;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Catálogo</h1>
    <div class="search-filter">
      <input type="text" id="search" placeholder="Buscar entretenimiento...">
      <select id="categoryFilter">
        <option value="">Todas las categorías</option>
        <?php foreach ($data['categories'] as $category): ?>
          <option value="<?php echo $category->id(); ?>"><?php echo $category->name(); ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </header>

   <div class="grid" id="entertainmentGrid">
    <?php foreach ($data['entertainments'] as $ent): ?>
      <a href="/entertainments/<?php echo $ent->id(); ?>" class="card" data-name="<?php echo strtolower($ent->name()); ?>" data-category="<?php echo $ent->categoryId(); ?>">
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
    const cards = document.querySelectorAll('.card');

    function filterItems() {
      const searchTerm = searchInput.value.toLowerCase();
      const selectedCategory = categoryFilter.value;

      cards.forEach(card => {
        const name = card.dataset.name;
        const category = card.dataset.category;
        const matchSearch = name.includes(searchTerm);
        const matchCategory = selectedCategory === '' || selectedCategory === category;
        card.style.display = (matchSearch && matchCategory) ? 'block' : 'none';
      });
    }

    searchInput.addEventListener('input', filterItems);
    categoryFilter.addEventListener('change', filterItems);
  </script>
</body>
</html>
