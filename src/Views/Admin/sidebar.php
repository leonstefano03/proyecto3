<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title><?php echo $title ?? 'Admin' ?></title>
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
</head>
<body>

  <!-- Sidebar de Admin -->
  <div class="sidebar">
    <h1>Admin</h1>
    <a href="/admin/categories">Categorias</a>
    <a href="/admin/entertainments">Entretenimientos</a>
  </div>