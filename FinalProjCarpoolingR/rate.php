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
            $p_id = $_GET['p_id'];
        ?>

        <!-- Header-->
        <header class="py-5">

           
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3">
                   <div class = "row"> 
                    <div class = "col">
                        <div class="m-4 m-lg-5">
                            <h1 class="fs-2 mb-3">Rate Your Last Driver (/10)</h1>
                            <h3 class="fs-4" style = "color:red;">Warning!</h3><h3 class="fs-4"> We Can Tell If You Make A Fake Driver Rating. </h3> 
                            <h4>Lying Will Result in Severe Consequences.</h4>
                            <form action = "ratingSent.php" method = "post">



                                <p class = "fs-4 mt-3"> How much would you rate your last driver</p>

                                <input type="number" name = "rate" step="0.01" placeholder = "Rate"><br><br>

                                <input type="text" name = "phone" placeholder = "Driver's phone number">
                                <input type="hidden" name = "p_id" value = "<?php echo $p_id?>">

                                <div class = "mt-3">
                                <input type="submit" id = "rate_sub" name="rate_sub" value = "Rate" class="btn btn-primary btn-md " > 
                                </div>

                            </form>
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
    
 




