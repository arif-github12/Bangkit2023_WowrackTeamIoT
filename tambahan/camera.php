
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

	<title>Dashboard</title>

    <style>

    .container {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 20px;
      align-items: center;
    }

    .action-button {
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 4px;
      margin: 10px;
      cursor: pointer;
    }

    #video-element, #captured-image {
      max-width: 100%;
      display: block;
      transform: scaleX(-1); /* Membalikkan tampilan horizontal */
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

<div class="button-container">
    <button class="action-button" onclick="openCamera()">Open Camera</button>
    <button class="action-button" onclick="captureImage()">Capture Image</button>
  </div>

  <video id="video-element" autoplay></video>

  <canvas id="canvas-element"></canvas>
  <img id="captured-image">

  <script>
    const videoElement = document.getElementById('video-element');
    const canvasElement = document.getElementById('canvas-element');
    const capturedImageElement = document.getElementById('captured-image');

    async function openCamera() {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        videoElement.srcObject = stream;
        videoElement.style.display = 'block';
      } catch (error) {
        console.error('Error accessing camera:', error);
      }
    }

    function closeCamera() {
    if (stream) {
        const tracks = stream.getTracks();
        tracks.forEach((track) => {
            track.stop();
        });
        video.srcObject = null;
        stream = null;
        videoPlaying = false; // Setel flag videoPlaying menjadi false setelah menghentikan aliran video
        ctx.clearRect(0, 0, width, height); // Membersihkan canvas setelah menutup kamera
    }
    ctx.clearRect(0, 0, width, height); // Membersihkan canvas setelah menutup kamera
}

    function captureImage() {
      canvasElement.width = videoElement.videoWidth;
      canvasElement.height = videoElement.videoHeight;
      canvasElement.getContext('2d').drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);

      capturedImageElement.src = canvasElement.toDataURL('image/png');
      capturedImageElement.style.display = 'block';
    }



  </script>

</body>
</html>