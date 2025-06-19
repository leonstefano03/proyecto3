<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Crear Categoría - Admin</title>
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

    input[type="text"] {
      padding: 10px;
      border: none;
      border-radius: 5px;
      margin-bottom: 15px;
      background-color: #333;
      color: #fff;
    }

    input[type="password"] {
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
</head>
<body>

  <!-- Sidebar de Admin
    <div class="sidebar">
    <h1>Admin</h1>
    <a href="/admin/categories">Categorias</a>
    <a href="/admin/entertainments">Entretenimientos</a>
  </div> -->

  <!-- Contenido principal -->
  <div class="main">
    <div class="form-container">
      <h2>Iniciar Sesion</h2>
      <form action="/admin/login" method="POST">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="email">
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="password">
        <button type="submit" class="submit-button">Login</button>
      </form>
    </div>
  </div>

</body>
</html>
