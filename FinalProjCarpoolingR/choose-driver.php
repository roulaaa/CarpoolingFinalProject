<?php 
    require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="A website to facilitate carpooling for citizens of the world!" />
        <meta name="author" content="" />
        <title>Carpooling Online!</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon3_ccexpress.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
    </head>

<!-- Core theme CSS (includes Bootstrap)
<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> -->
  
  <style>
    .qr-code {
      max-width: 200px;
      margin: 10px;
    }
  </style>
  
  <title>Request</title>
</head>
  
<body>

<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-lg-5">
        <a class="navbar-brand" target="_blank" href="https://maps.google.com/" >Google Maps <img width="38" height="38" src = "assets/google_maps-removebg-preview.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- <li class="nav-item"><a class="nav-link " aria-current="page" href="http://localhost/FinalProjCarpooling/Login.php">Home</a></li> -->
                <li class="nav-item"><a class="nav-link" href="http://localhost/FinalProjCarpooling/about.html">About</a></li>
            </ul>
        </div>
    </div>
</nav>

  
<div class="container px-lg-5 text-center ">
    <div class="p-4 p-lg-5 bg-light rounded-3">
        <div class="m-4 m-lg-5">
    <h3 class="display-5 fw-bold  ">Request Sent.....</h3> <br>
    <p class="fs-4 text-center">Make Sure To Press The Button Below After Your Ride is Done. </p>
    
    <p class="fs-4 text-center">Please Contact us With Any Information You Would Like To Provide. </p>
        </div>

<?php 
    $p_id = $_GET['p_id'];
    
?>
    <a class="btn btn-primary btn-lg" href="rate.php?p_id=<?php echo $p_id ?>">Rate
    </a>
    </div>

</div>
  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Carpooling Online! 2022</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
  
</html>




