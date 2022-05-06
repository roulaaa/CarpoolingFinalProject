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
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="http://localhost/FinalProjCarpooling/contact.html">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="http://localhost/FinalProjCarpooling/about.html">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Header-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold  ">Write a Complaint</h1>
                        <p class="fs-4 text-center">We would love to hear your complaints. Feedback might take 3-5 days. </p>

                        
                        <?php $user_id = $_GET['user_id'];?>
                        
                        <form method="post">

                        
                            <div class="container">
                                <div class = "row justify-content-center pb-sm-5 pb-3">
                                    <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                                        <hr class = "mb-3">
                                        <label for="u_message"><b>Write a complaint here. We apologize for any trouble. Please use appropriate Language. </b></label>
                                        <input class = "form-control mt-3" id = "u_message" type="text" name="u_message" required>
                                    </div> 
                                    
                                    <input type = "hidden" name= "user_id" value = "<?php $user_id ?>">

                                <div class = "col-sm-8 col px-sm-0 px-4 mb-4 mt-3 text-center">                  
                                    <input type="submit" id = "message_send" name="message_send" value = "Submit" class="btn btn-primary btn-md " href = "thanks.html">    
                                </div>  

                                


                            </div>
                        </form> 
                        <?php
                                //check the values coming from this form
                                //$complaint_id     = $_POST['complaint_id'];
                                //$person_id        = $_POST['person_id'];
                                if (isset($_POST['message_send'])){
                                    $u_message    = $_POST['u_message'];
                                


                                    $sql_m = $mysqli->prepare("INSERT INTO complaint(person_id, u_message) VALUES(?,?)");
    
                                    $sql_m->bind_param("ss", $user_id, $u_message); //here we made user_id = person_id
                                        
                                    $sql_m->execute();
                                }
                               


                        ?>
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
    
 