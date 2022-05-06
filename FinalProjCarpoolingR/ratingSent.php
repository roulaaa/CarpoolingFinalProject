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
                        <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="Login.php">Home</a></li> -->
                        <li class="nav-item"><a class="nav-link " aria-current="page" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link"  href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        if (isset($_POST['rate_sub'])){
            $rate = $_POST['rate'];
            $phone = $_POST['phone'];
            $p_id = $_POST['p_id'];

        }
        echo $p_id;
        $query = $mysqli->prepare("UPDATE drivers SET d_rating = ? WHERE d_phone = ?");
        $query->bind_param("ss", $rate, $phone);
        $query->execute();

        $query = $mysqli->prepare("Select * from drivers where d_phone = ?");
        $query->bind_param("s", $phone);
        $query->execute();
        $result = $query->get_result();
        $data = $result->fetch_assoc();

        $query = $mysqli->prepare("UPDATE passengers SET driver_id = ? WHERE p_id = ?");
        $query->bind_param("ss", $data['d_id'], $p_id);
        $query->execute();

        $query = $mysqli->prepare("UPDATE rides SET d_id = ? WHERE p_id = ?");
        $query->bind_param("ss", $data['d_id'], $p_id);
        $query->execute();



        ?>

        <!-- Header-->
        <header class="py-5">

           
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3">
                   <div class = "row"> 
                    <div class = "col">
                        <div class="m-4 m-lg-5">
                        <p class = "fs-2 mt-3"> Your Rating Has Been Sent! Thank You For Using Our Services </p>
                            


                                <div class = "mt-3">
                                <a class="btn btn-primary btn-lg" style = "text-align: center" href="index.php">Return to Menu</a>
                                </div>

                            
                            </div>
                    </div>    

                    <div class = "col">
                        <div class="m-4 m-lg-5">
                            <img src = "assets/driver5.png"  height = "200px" width = "200px" > </div>
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
    
 




