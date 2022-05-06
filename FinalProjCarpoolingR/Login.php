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

        <?php

        ?>

        <?php 
        
        if (isset($_POST['login'])){
            $user_email     = $_POST['user_email'];
            $user_password  = sha1($_POST['user_password']);
            

            $stmt = $mysqli->prepare("Select * from user_type where user_email = ?");                      
            $stmt->bind_param("s", $user_email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            if($stmt_result->num_rows > 0){
            //fetch data from result
                $data = $stmt_result->fetch_assoc();
                
                if($data['user_password'] === $user_password){
                    
                    
                    ?>
                <!-- Header-->
                    <header class="py-5">
                        <div class="container px-lg-5">
                            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                                <div class="m-4 m-lg-5">
                                    <h1 class="display-5 fw-bold">Hello! Enjoy Your Ride and Stay Safe!</h1>
                                    <p class="fs-4">Book rides or pick-up passengers. </p>
                                    <p class="fs-4">Rate your driver or passenger. </p>
                                    <p class="fs-4">Collect rewards. </p>

                                    
                                    <!-- moving user_id to person_id -->
                                    <a class="btn btn-primary btn-lg" href="complaint.php?user_id=<?php echo $data['user_id']?>">File a Complaint</a>
                                    <a class="btn btn-secondary btn-lg" style = "text-align: center" href="deleteAccount.php?user_id=<?php echo $data['user_id']?>">Delete Account</a>
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
                                                <h2 class="fs-4 fw-bold text-center">Driver</h2>
                                                <!--<p class="mb-0 text-center ">Pick-up passengers</p>-->
                                                <a class="btn btn-primary btn-lg" href="driver.php?user_id=<?php echo $data['user_id']?>">Pick-up Passengers</a>
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
                                            <h2 class="fs-4 fw-bold text-center">Passenger</h2>
                                            <!-- <p class="mb-0 text-center">Book a ride</p> -->
                                            <a class="btn btn-primary btn-lg" href="passenger.php?user_id=<?php echo $data['user_id']?>">Book a Ride</a>
            
                                        </div>
                                    </div>
                                </div>
                                
                    </section>
                <?php
                }else{
                    echo "Incorrect Email or Password."; 
                }
            }
        }
        ?>


        <?php
        if (isset($_POST['create'])){

            $user_first_name    = $_POST['user_first_name'];
            $user_last_name     = $_POST['user_last_name'];
            $user_gender        = $_POST['user_gender'];
            $user_email         = $_POST['user_email'];
            $phone_number       = $_POST['phone_number'];
            $user_password      = sha1($_POST['user_password']); 

            $sql = "INSERT INTO user_type(user_first_name, user_last_name, user_gender, user_email, phone_number, user_password) VALUES(?,?,?,?,?,?)";
            $stmtinsert = $mysqli->prepare($sql);
            //echo $_ . " " . $_ . " " . $user_email . " " . $_ . " " . $user_password;
            $result = $stmtinsert->execute([$user_first_name , $user_last_name , $user_gender, $user_email , $phone_number , $user_password]);

            $stmt = $mysqli->prepare("Select * from user_type where user_email = ?");                      
            $stmt->bind_param("s", $user_email);
            $stmt->execute();
            $stmt_result = $stmt->get_result();

            $data = $stmt_result->fetch_assoc();
                
               ?>
                <!-- Header-->
                    <header class="py-5">
                        <div class="container px-lg-6">
                            <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                                <div class="m-4 m-lg-5">
                                    <h1 class="display-5 fw-bold">Hello! Enjoy Your Ride and Stay Safe!</h1>
                                    <p class="fs-4">Book rides or pick-up passengers. </p>
                                    <p class="fs-4">Rate your driver or passenger. </p>
                                    <p class="fs-4">Collect rewards. </p>

                                    
                                    <!-- moving user_id to person_id -->
                                    <a class="btn btn-primary btn-lg" href="complaint.php?user_id=<?php echo $data['user_id']?>">File a Complaint</a>
                                    
                                   
                                  



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
                                                <h2 class="fs-4 fw-bold text-center">Driver</h2>
                                                <!--<p class="mb-0 text-center ">Pick-up passengers</p>-->

                                                <a class="btn btn-primary btn-lg" href="driver.php?user_id=<?php echo $data['user_id']?>">Pick-up Passengers</a>
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
                                            <h2 class="fs-4 fw-bold text-center">Passenger</h2>
                                            <!-- <p class="mb-0 text-center">Book a ride</p> -->

                                            <a class="btn btn-primary btn-lg" href="passenger.php?user_id=<?php echo $data['user_id']?>">Book a Ride</a>
                                        </div>
                                    </div>
                                </div>
                                
                    </section>
                <?php
        }    
        ?>

       

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
