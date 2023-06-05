<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Bootstrap-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js"></script>
	
	<!--Font Awesome-->
	<link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
   <!-- Javascript -->
   <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.9.0/dist/tf.min.js"></script>

	<title>Dashboard</title>
  <style>
        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
        }
        
        .nav-link {
            font-weight: bold;
            font-size: 18px;
        }
        
        .nav-link.active {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <!-- Navigasi -->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                WOWRACK
            </a>
        </div>
    </nav>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="false" onclick="location.href='index.php'">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="trash-tab" data-bs-toggle="tab" data-bs-target="#trash" type="button" role="tab" aria-controls="Trash" aria-selected="false" onclick="location.href='trash.php'">Trash</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="person-tab" data-bs-toggle="tab" data-bs-target="#persom" type="button" role="tab" aria-controls="Person" aria-selected="false" onclick="location.href='person.php'">Person</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ram-tab" data-bs-toggle="tab" data-bs-target="#ram" type="button" role="tab" aria-controls="RAM" aria-selected="false" onclick="location.href='ram.php'">RAM</button>
        </li>
    </ul>


<div class="container">
  <form method="POST" action="proses.php">
    <div class="mb-3">
      <label for="formFile" class="form-label">Input Image</label>
      <input class="form-control" type="file" id="formFile">
    </div>
    <div class="col">
    <?php
      if(isset($_GET['ubah'])) {
    ?>
      <button type="submit" name="aksi" value="edit" class="btn btn-primary" ><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan</button>
    <?php
      } else {
    ?>
      <button type="submit" name="aksi" value="add" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i> Tambahkan </button>
    <?php
      } 
    ?>
      <a href="index.php" type="button" class="btn btn-danger"><i class="fa fa-reply" aria-hidden="true"></i> Cancel</a>

  </form>
</div>

<h2><center>or</center></h2>

<a href="person_model.php" type="button" class="btn btn-success"><i class="fa fa-camera" aria-hidden="true"></i>Open Camera</a>

</body>
</html> 
 