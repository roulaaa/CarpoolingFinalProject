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
                        
                        <li class="nav-item"><a class="nav-link" href="about2.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact2.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">Hello! Enjoy Your Ride and Stay Safe!</h1>
                        <p class="fs-4">Book rides or pick-up passengers. </p>
                        <p class="fs-4">Rate your driver or passenger. </p>
                        <p class="fs-4">Collect rewards. </p>
                        

                        <div class="container d-flex justify-content-center"> <button class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#my-modal">Sign in</button>
                            <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered d-flex justify-content-center" role="document">
                                    <div class="modal-content border-0 mx-3" >
                                        <div class="modal-body p-0 rounded-6 "style="border: 6px #0275d8 outset  ">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="card-header bg-white border-0 pb-3">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="flex-col-auto"></div>
                                                                <div class="col-auto text-right"><button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span class="cross" aria-hidden="true">&times;</span> </button></div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body text-center pt-0">
                                                            <div class="row d-flex justify-content-center pb-sm-5 pb-3">

                                                                <div class="col-sm-8 col px-sm-0 px-4">
                                                                    <h2 class="card-title mt-sm-5 mt-3 mb-sm-5 mb-3 text-center"><b>My Account</b></h2>
                                                                    <form action="Login.php" method="post"> 

                                                                        <!-- email -->
                                                                        <div class="row mb-3 input-group ">
                                                                            <div class="col center text-center"><input type="email" name="user_email" placeholder="Email" id = "user_email" class="form-control" required></div>    
                                                                        </div>
                                                                        
                                                                        
                                                                        <!-- password -->
                                                                        <div class="row input-group mb-2">                          
                                                                            <div class="col center-block"><input type="password" name="user_password" placeholder="Password" id = "user_password" class = "form-control" required></div>
                                                                        </div>

                                                                       
                                                                        
                                                                        <!--login button-->
                                                                        <br>
                                                                        <div class = "row mt-sm-2 mt-2 mb-sm-2 mb-2" >
                                                                        <input type="submit" id = "login" name="login" value = "Login" class="btn btn-primary btn-md ">
                                                                        </div>

                                                                        <div class="row">
                                                                            <br>
                                                                            <p>Don't have an account?</p>
                                                                            <div class="col"><a class="btn btn-primary btn-md" href ="registration.php" ><b>Sign Up</b></a></div>
                                                                        </div>

                                                                        

                                                                    </form> 

                                                                    <br>
                                                                            
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </div>

                                                        

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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



