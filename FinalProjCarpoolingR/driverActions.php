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
        

        <?php
        if(isset($_POST['submit_d_info'])){  
            //check the values coming from this form
            $user_id          = $_POST['user_id']; 
            $d_route          = $_POST['d_route'];
            $d_city           = $_POST['d_city'];
            $time_to_dest     = $_POST['time_to_dest']; ?>


            <?php  //this querry is to get all the info of this driver_id
            $query = $mysqli->prepare("Select * from user_type where user_id = '$user_id';");
            $query->execute();
            $result = $query->get_result();
            $data = $result->fetch_assoc(); 
            
            $query = $mysqli->prepare("Select * from drivers where user_id = ?");
            $query->bind_param("s", $user_id);
            $query->execute();
            $result = $query->get_result();

            if ($result->num_rows < 1){
                //add d_rating after user last name
                $sql = "INSERT INTO drivers(d_first_name, d_last_name, d_gender, d_route, d_city, d_phone, user_id, time_to_dest) VALUES(?,?,?,?,?,?,?,?)";
                $stmtinsert = $mysqli->prepare($sql);
                //echo $_ . " " . $_ . " " . $user_email . " " . $_ . " " . $user_password;
                $result = $stmtinsert->execute([$data['user_first_name'] , $data['user_last_name'] , $data['user_gender'], $d_route , $d_city, $data['phone_number'], $user_id, $time_to_dest]);

            }else{
                $query = $mysqli->prepare("UPDATE drivers SET d_route = ?, d_city = ?, time_to_dest = ? WHERE user_id = '$user_id';");
                $query->bind_param("sss", $d_route, $d_city, $time_to_dest);
                $query->execute();
            }
        }
                   
            ?>

        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">

                    
                        <div class = "row">
                            <div class = "col">
                                <h1 class="display-5 fw-bold mt-5">Choose an Option! </h1>
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

        <!-- Page Content-->
        <section class="pt-4">
            <div class="container px-lg-5">
                
                <!-- Page Features-->
                <div class="row gx-lg-5 mx-auto">
                       
                        <div class="col-lg-6 col-xxl-4 mb-5 mx-auto">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0 ">
                                    <!--<div class="card-img-top text-center">-->
                                    <div class="embed-responsive embed-responsive-16by9 text-center ">
                                        <div class="feature bg-primary bg-gradient img-top rounded-3 mb-4 mt-n4">
                                            <img alt="Card image cap" class="card-img-top embed-responsive-item" src="assets/driver.png" class="rounded-circle " />
                                        </div>
                                    </div> 
                                        <!-- <h2 class="fs-4 fw-bold text-center">Driver</h2> -->
                                        <!--<p class="mb-0 text-center ">Pick-up passengers</p>-->
                                        <a class="btn btn-primary btn-lg" href="myPassengers.php?user_id=<?php echo $data['user_id'] ?>">My Passengers</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xxl-4 mb-5 mx-auto">
                            <div class="card bg-light border-0 h-100">
                                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                    <div class="embed-responsive embed-responsive-16by9 text-center "></div>
                                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4">
                                            <img alt="Card image cap" class="card-img-top embed-responsive-item" src="assets/passenger_icon.png" class="rounded-circle" />
                                    </div>
                                    
                                    <br>
                                    <a class="btn btn-primary btn-lg" href="vehicles.php?user_id=<?php echo $data['user_id'] ?> ">Register a Vehicle</a>

                        </div>
                            
                        
                    </div>
                    
        </section>

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
