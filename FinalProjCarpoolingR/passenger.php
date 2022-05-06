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
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" target="_blank" href="https://maps.google.com/" >Google Maps <img width="38" height="38" src = "assets/google_maps-removebg-preview.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link " aria-current="page" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link"  href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header-->
        
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3">
                    <div class="m-4 m-lg-5">
                    <?php 
                    $user_id = $_GET['user_id'];
                    $query = $mysqli->prepare("Select * from user_type where user_id = '$user_id';");
                    $query->execute();
                    $result = $query->get_result();
                    $data = $result->fetch_assoc();
                    
                    ?>
        
                        <div class = "row">
                            <div class = "col">
                                <h1 class="display-5 fw-bold mt-5">Hello, <?php echo $data['user_first_name'] ?>! </h1>
                            </div>    
                        
                         </div>
                      <form action = "passActions.php" method = "post">  
                       <div class = "row">
                        <div class = "col">
                            <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                            <label for="phone_number"><b>Address</b></label>
                            <input class = "form-control" id = "p_address" type="text" name="p_address" required>
                            </div>

                            <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                            <label for="preferred_time_to_location"><b>Preferred Time</b></label>
                            <input class = "form-control" id = "preferred_time_to_location" type="time" name="preferred_time_to_location" required>
                            </div>

                            <div class = "col-sm-8 col px-sm-0 px-4 mb-4">
                            <label for="destination"><b>Destination</b></label>
                            <input class = "form-control" id = "p_city" type="text" name="p_city" required>
                            </div>

                            <input type ="hidden" name = "user_id" value = "<?php echo $user_id ?>">
                        
                            
                            <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                            <input type="submit" id = "pass_sub" name="pass_sub" value = "Submit" class="btn btn-primary btn-md " > 
                            </div>

                            <!-- <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                            <a class="btn btn-primary btn-lg" href="rate.php" > Rate your Driver</a>
                            </div> -->

                        </div>

                        <div class = "col">

                            <img src = "assets/passenger.png"  height = "200px" width = "200px" >

                        </div></div>
                    </form>




                    </div>
                </div>
            </div>
                        
        </header>

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
    
 