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
  
    <body>

    <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" target="_blank" href="https://maps.google.com/" >Google Maps <img width="38" height="38" src = "assets/google_maps-removebg-preview.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php $user_id = $_GET['user_id']; ?>

        <div>
    <form action = "vehicleAdded.php" method="post">
        <div class="container">
            <div class = "row justify-content-center pb-sm-5 pb-3">
                
                    <h1 class = "text-center mt-3">Enter a new Vehicle</h1>
                    
   
                        <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                        <hr class = "mb-3">
                        <label for="license"><b>License</b></label>
                        <input class = "form-control" id = "license" type="text" placeholder = "License" name="license" required>
                        </div>

                        <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                        <label for="plate"><b>Plate</b></label>
                        <input class = "form-control" id = "plate" type="text" placeholder = "Plate" name="plate" required>
                        </div>
                

                        <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                        <label for="v_type"><b>Type</b></label>
                        <input class = "form-control" id = "v_type" type="text" placeholder = "Vehicle Type"  name="v_type" required>
                        </div>

                        <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                        <label for="model"><b>Model</b></label>
                        <input class = "form-control" id = "model" type="text" placeholder = "Model" name="model" required>
                        </div>


                        <input type = "hidden" name = "user_id" value = "<?php echo $user_id ?>">

                        <div class = "col-sm-8 col px-sm-0 px-4  mb-2">
                        <label for="year"><b>Year</b></label>
                        <input class = "form-control" id = "year" type="text" placeholder = "Year" name="year" required>
                    
                        </div>

                        
                        <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                        <label for="seats_available"><b>Seats Available</b></label>
                        <input class = "form-control" id = "seats_available" type="number" placeholder = "Seats Available" name="seats_available" required>
                        </div> 
                        


                        <div class = "col-sm-8 col px-sm-0 px-4 mb-4 mt-3 text-center">                  
                        <input type="submit" id = "register_vehicle" name="register_vehicle" value = "Register" class="btn btn-primary btn-md "> 
                       
                        &nbsp;&nbsp;&nbsp;

                      
                        </div>

                    
            </div>
        </div>
    </form>

        
 

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