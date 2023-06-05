<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

  <title>WOWRACK DASHBOARD</title>

  <!-- Navigasi -->
  <style>
    .navbar-brand {
      font-weight: bold;
      font-size: 24px;
    }

    .nav-link {
      font-weight: bold;
      font-size: 18px;
    }
  </style>

  <!-- Judul -->
  <style>
    h1 {
      text-align: center;
      margin-top: 50px;
      font-size: 32px;
      color: #333;
    }

    .button-container {
      text-align: center;
      margin-top: 20px;
    }

    .menu-button {
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 4px;
      margin: 10px;
      cursor: pointer;
      background-color: #007bff;
      color: #fff;
      border: none;
    }

    .menu-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body> 
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      WOWRACK
    </a>
  </div>
</nav>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#trash" type="button" role="tab" aria-controls="Trash" aria-selected="false" onclick="location.href='trash.php'">Trash</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#person" type="button" role="tab" aria-controls="Person" aria-selected="false" onclick="location.href='person.php'">Person</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#ram" type="button" role="tab" aria-controls="RAM" aria-selected="false" onclick="location.href='ram.php'">RAM</button>
    </li>
  </ul>

<h1>Silakan Pilih Salah Satu Menu:</h1>
<div class="button-container">
  <button class="menu-button" onclick="location.href='trash.php'">Trash</button>
  <button class="menu-button" onclick="location.href='person.php'">Person</button>
  <button class="menu-button" onclick="location.href='ram.php'">RAM</button>
</div>

</body>
</html>