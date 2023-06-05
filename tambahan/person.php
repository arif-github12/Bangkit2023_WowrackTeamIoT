<?php
$servername = "163.53.195.134";
$username = "bangkit01";
$password = "5HkCam60wLv02mH";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.9.0/dist/tf.min.js"></script>


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>WOWRACK DASHBOARD</title>
    
    <!-- CSS Styling -->
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
            <button class="nav-link active" id="person-tab" data-bs-toggle="tab" data-bs-target="#person" type="button" role="tab" aria-controls="Person" aria-selected="true" onclick="location.href='person.php'">Person</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="ram-tab" data-bs-toggle="tab" data-bs-target="#ram" type="button" role="tab" aria-controls="RAM" aria-selected="false" onclick="location.href='ram.php'">RAM</button>
        </li>
    </ul>

    <div class="container">
        <h1 class="mt-5">Dashboard</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Image Processing</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                Trash <cite title="Source Title"></cite>
            </figcaption>
        </figure>

        <a href="kelola.php" type="button" class="mb-4 btn btn-primary">
            <i class="fa fa-plus"></i>
            Tambah Data
        </a>

        <!-- Table Content -->
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th><center>No</center></th>
                        <th>Time-Stamp</th>
                        <th>Image</th>
                        <th>Result</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><center>1</center></td>
                        <td></td>
                        <td>
                            <center>
                                <img src="">
                            </center>
                        </td>
                        <td></td>
                        <td>
                            <center>
                                <!-- Icon button Trash dan pencil -->
                                <button type="button" class="mb-4 btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a href="kelola.php?ubah=1" type="button" class="mb-4 btn btn-success">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </center>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td><center>2</center></td>
                        <td></td>
                        <td>
                            <center>
                                <img src="">
                            </center>
                        </td>
                        <td></td>
                        <td>
                            <center>
                                <button type="button" class="mb-4 btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a href="kelola.php?ubah=2" type="button" class="mb-4 btn btn-success">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
