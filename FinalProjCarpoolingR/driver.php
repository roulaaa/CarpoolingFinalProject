<?php 
    require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="A website to facilitate carpooling for citizens of the world!" />
        <meta name="roula" content="uhh" />
        <title>Carpooling Online!</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon3_ccexpress.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
        <script>
        $(document).on("click", ".action-buttons .dropdown-menu", function(e){
	        e.stopPropagation();
        });
        </script>
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
        <!-- Header-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
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
                        <div class = "col">
                            <img src = "assets/driver3.jpg"  height = "150px" width = "150px" > 
                        </div>
    </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta320/NMZxltwRo8QtmkMRdAu8-" 
            crossorigin="anonymous"></script>

            <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
            </script>

            <script>

            $(function(){
                alert('alert');
            });

           </script>

<form action = "driverActions.php" method="post">
        <div class="container">
            <div class = "row justify-content-center pb-sm-5 pb-3">
                
                    <h1 class = "text-center mt-3">Fill This Form to Continue</h1>
                    
   
                        <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                        
                        <label for="d_route"><b>Route</b></label>
                        <input class = "form-control" id = "d_route" type="text" placeholder = "Route" name="d_route" required>
                        </div>

                        <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                        <label for="d_city"><b>City</b></label>
                        <input class = "form-control" id = "d_city" type="text" placeholder = "City" name="d_city" required>
                        </div>
                

                        <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                            <label for="time_to_dest"><b>Will arrive to location at: </b></label>
                            <input class = "form-control" id = "time_to_dest" type="time" name="time_to_dest" required>
                        </div>  

                        <input type = "hidden" name = "user_id" value = "<?php echo $user_id ?>">


                        <div class = "col-sm-8 col px-sm-0 px-4 mb-4 mt-3 text-center">                  
                        <input type="submit" id = "submit_d_info" name="submit_d_info" value = "Submit" class="btn btn-primary btn-md "  > 

                       <!-- <a class="btn btn-primary btn-lg" href="driverActions.php?user_id=<?php echo $user_id?>">Pick-up Passengers</a>
                        &nbsp;&nbsp;&nbsp; -->


                      
                        <!--<a class="btn btn-primary btn-md" href="http://localhost/FinalProjCarpooling/driverActions.php">Carpool </button></a>
                        </div> -->

                    
            </div>
        </div>
    </form>
  
                    
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
