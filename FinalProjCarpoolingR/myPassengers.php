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

        <?php
        $user_id = $_GET['user_id'];

        $query = $mysqli->prepare("SELECT * from drivers where user_id = ?");
        $query->bind_param("s", $user_id);
        $query->execute();
        $result = $query->get_result();
        $id = $result->fetch_assoc();

?>
       
       

        <!-- Header-->
        
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold  text-center">Passengers</h1>

                        <a class="btn btn-primary btn-lg" style = "text-align: center"  href="reward.php?d_id=<?php echo $id['d_id'] ?>">Ride is Done</a>
                           
                    

                    </div>
                </div>
            </div>
                        
        </header>

        <?php
        $query = $mysqli->prepare("SELECT * from passengers where driver_id = ?");
        $query->bind_param("s", $id['d_id']);
        $query->execute();
        $result = $query->get_result();

        if($result->num_rows > 0){
            while($data = $result->fetch_assoc()){
                echo $data["p_first_name"];?> &nbsp; <?php
                echo $data["p_last_name"];?> &nbsp; <?php
                echo $data["p_gender"];?> &nbsp; <?php
                echo $data["p_address"];?> &nbsp; <?php

            }
           
        }else{?><h4 style = "text-align:center"><?php
            echo "you don't have any passengers at this time";
        }
        ?><br><br>

       

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
    
 