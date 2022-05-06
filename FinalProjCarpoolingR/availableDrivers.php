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
                        <li class="nav-item"><a class="nav-link " aria-current="page" href="http://localhost/FinalProjCarpooling/about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link"  href="http://localhost/FinalProjCarpooling/contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header-->
        
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold  text-center">Drivers Available Near Your Location</h1>
                        <p class="fs-4" >Please call or text them to get furthur inquiries on their trip. If you harrass them, your account will be deleted.<p>
                        <?php

                        

    
                        
        if(isset($_POST['pass_sub'])){  
            //check the values coming from this form
            $user_id                      = $_POST['user_id']; 
            $p_address                    = $_POST['p_address'];
            $preferred_time_to_location   = $_POST['preferred_time_to_location'];
            $p_city                       = $_POST['p_city']; 
        
        }
        else{
            echo "hiiiiiiiiiiiiii";
        }

        
              //this querry is to get all the info of this driver_id
            $query = $mysqli->prepare("Select * from user_type where user_id = ?");
            $query->bind_param("s", $user_id);
            $query->execute();
            $result = $query->get_result();
            $data = $result->fetch_assoc();

            

            
  

            $sql = "INSERT INTO passengers(p_first_name, p_last_name, p_gender, p_address, preferred_time_to_location, p_city) VALUES(?,?,?,?,?,?)";
            $stmtinsert = $mysqli->prepare($sql);
            $result = $stmtinsert->execute([$data['user_first_name'] , $data['user_last_name'] , $data['user_gender'], $p_address , $preferred_time_to_location , $p_city]);

            $query_avail_dr = $mysqli->prepare("Select * from user_type, drivers where user_first_name = d_first_name;");
            $query_avail_dr->execute();
            $array_avail_dr = $query_avail_dr->get_result();
                  
                        ?>
                         <div class="container">
                            <div class = "row justify-content-center pb-sm-5 pb-3">           
                                <?php
                                    while($driver = $array_avail_dr->fetch_assoc()){
                                ?>     

                                <div class="card-body text-center pt-0">
                                    <div class="row d-flex justify-content-center pb-sm-5 pb-3">


                                        <div class="col-sm-8 col px-sm-0 px-4">
                                            <h5 class="card-title mt-sm-2 mt-2 mb-sm-2 mb-2 text-center"><b>Name: 
                                                <?php echo $driver["d_first_name"];?></b></h5>
                                        </div>  

                                        <div class="col-sm-8 col px-sm-0 px-4">
                                            <h5 class="card-title mt-sm-2 mt-2 mb-sm-2 mb-2 text-center"><b>Family: 
                                                <?php echo $driver["d_last_name"];?></b></h5>
                                        </div> 
                                        <div class="col-sm-8 col px-sm-0 px-4">
                                            <h5 class="card-title mt-sm-2 mt-2 mb-sm-2 mb-2 text-center"><b>Rating: 
                                                <?php echo $driver["d_rating"];?></b></h5>
                                        </div> 
                                        <div class="col-sm-8 col px-sm-0 px-4">
                                            <h2 class="card-title mt-sm-2 mt-2 mb-sm-2 mb-2 text-center"><b>Gender:
                                                <?php echo $driver["d_gender"];?></b></h2>
                                        </div> 
                                        <div class="col-sm-8 col px-sm-0 px-4">
                                            <h2 class="card-title mt-sm-2 mt-2 mb-sm-2 mb-2 text-center"><b>Route:
                                                <?php echo $driver["d_route"];?></b></h2>
                                        </div> 

                                        <div class="col-sm-8 col px-sm-0 px-4">
                                            <h2 class="card-title mt-sm-2 mt-2 mb-sm-2 mb-2 text-center"><b>Time to Reach Destination:
                                                <?php echo $driver["time_to_dest"];?></b></h2>
                                        </div> 

                                        

                                        
                                    </div>

                                    <?php 
                                    }
                                    ?>
                                </div>

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
    
 