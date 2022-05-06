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

        <script src="https://randojs.com/1.0.0.js"></script>
        <script>
            function showRandomNumber(){
                document.getElementById("myNumber").innerHTML = rando(100000, 9999999);
            }
        </script>

    <style>
      .qr-code {
        max-width: 200px;
        margin: 10px;
      }

      #myNumber{
                  font-size:100px;
                  text-align:center;
                  margin:50px auto;
                  font-family:Arial, sans-serif;
      }
    </style>
  
  <title>QR Code Generator</title>
</head>
  
<body onload="showRandomNumber();">
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" target="_blank" href="https://maps.google.com/" >Google Maps <img width="38" height="38" src = "assets/google_maps-removebg-preview.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        $d_id = $_GET['d_id'];
        echo $d_id;
        $query= $mysqli->prepare("INSERT INTO driver_rewards(driver_id) VALUES (?)");
        $query->bind_param("s",$d_id);
        $query->execute();
        ?>

  <div class="container-fluid">
    <div class="text-center">
    <header class="py-5">
                <div class="container px-lg-5">
                    <div class="p-4 p-md-3 bg-light rounded-3">
                        <div class="m-4 m-lg-5">
                            <h1 class="display-5 fw-bold text-center" style="color: #24a0ed;">CODE: </h1>
                            <p class="fs-5">The code generated will only work once. It will be sent to our affiliated gas stations along with your ID, so submitting any other code will not work. If you face any issues, please feel free to contact us.</p>
                            <p class="fs-4 mb-4 text-center" id = "myNumber"></p>
                            
                            
                        </div>
                    </div>
                </div>
            </header>  

      <!-- Get a Placeholder image initially,
       this will change according to the
       data entered later -->
      <img src=
"https://chart.googleapis.com/chart?cht=qr&chl=Hello+World&chs=160x160&chld=L|0"
        class="qr-code img-thumbnail img-responsive" />
    </div>
  
    <div class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2"
          for="content">
          
        </label>
        <div class="col-sm-10">
  
          <!-- Input box to enter the 
              required data -->
          <input type="text" size="60" 
            maxlength="60" class="form-control"
            id="content" placeholder="Enter code" />
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
  
          <!-- Button to generate QR Code for
           the entered data -->
          <button type="button" class=
            "btn btn-primary mt-3" id="generate">
            Generate
          </button>
          
          <br><br>
          <a class="btn btn-primary btn-lg" style = "text-align: center" href="index.php"> Home</a>
        </div>
      </div>
    </div>
  </div>
  <script src=
    "https://code.jquery.com/jquery-3.5.1.js">
  </script>
  
  <script>
    // Function to HTML encode the text
    // This creates a new hidden element,
    // inserts the given text into it 
    // and outputs it out as HTML
    function htmlEncode(value) {
      return $('<div/>').text(value)
        .html();
    }
  
    $(function () {
  
      // Specify an onclick function
      // for the generate button
      $('#generate').click(function () {
  
        // Generate the link that would be
        // used to generate the QR Code
        // with the given data 
        let finalURL =
'https://chart.googleapis.com/chart?cht=qr&chl=' +
          htmlEncode($('#content').val()) +
          '&chs=160x160&chld=L|0'
  
        // Replace the src of the image with
        // the QR code image
        $('.qr-code').attr('src', finalURL);
      });
    });
  </script>

     <!-- Page Features-->
     <div class="row gx-lg-5 mx-auto">
        <div class="col-lg-6 col-xxl-4 mb-5 mx-auto">
          <div class="card bg-light border-0 h-100">
            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0 ">
              <!--<div class="card-img-top text-center">-->
                <img height = "400px" width = "300px" src = "assets/coupon.png"/> </div></div></div></div>
                 
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



