<?php 
    require_once('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets/favicon3_ccexpress.png" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />

 


    <title>Sign up</title>
</head>
<body>

<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" target="_blank" href="https://maps.google.com/" >Google Maps <img width="38" height="38" src = "assets/google_maps-removebg-preview.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!--<li class="nav-item"><a class="nav-link" aria-current="page" href="http://localhost/FinalProjCarpooling/index.php">Home</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="about2.html">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact2.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        

                

<div>
    <form action="Login.php" method="post">
        <div class="container">
            <div class = "row justify-content-center pb-sm-5 pb-3 mt-3">
                
                    <h1>Create an Account Now!</h1>
                    
   
                    <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                    <hr class = "mb-3">
                    <label for="user_first_name"><b>First Name</b></label>
                    <input class = "form-control" id = "user_first_name" type="text" name="user_first_name" required>
                    </div>

                    <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                    <label for="user_last_name"><b>Last Name</b></label>
                    <input class = "form-control" id = "user_last_name" type="text" name="user_last_name" required>
                    </div>

                    <div class = "col-sm-8 col px-sm-0 px-4 mb-3">
                        <select id="user_gender" name="user_gender">
                            <option value="Male"><b>Male</b></option>
                            <option value="Female"><b>Female</b></option>
                            <option value="Other"><b>Other</b></option>
                        </select><br>
                    </div>
                    

                    <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                    <label for="user_email"><b>Email Address</b></label>
                    <input class = "form-control" id = "user_email" type="email" name="user_email" required>
                    </div>

                    <div class = "col-sm-8 col px-sm-0 px-4 mb-2">
                    <label for="phone_number"><b>Phone Number</b></label>
                    <input class = "form-control" id = "phone_number" type="text" name="phone_number" required>
                    </div>

                    <div class = "col-sm-8 col px-sm-0 px-4">
                    <label for="user_password"><b>Password</b></label>
                    <input class = "form-control" id = "user_password" type="password" name="user_password" required>
                   
                    </div>
                    <input type = "hidden" name = "user_id" value = "<?php echo $user_id ?>">
                    
                    <div class = "col-sm-8 col px-sm-0 px-4 text-center">

                    <hr class = "mb-3">
                    <input type="submit" id = "register" name="create" value = "Sign Up" class="btn btn-primary btn-md " > 
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <div class = "col-sm-8 col px-sm-0 px-4"> -->
                        <br><br><br>
                    <h5>Note: You have to sign up at least once to delete your account</h5>
                    
                        
                    </div>        
            </div>
        </div>

    

    </form>




</div>




    <!-- Footer-->
    <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Carpooling Online! 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <script src="js/scripts.js"></script>

        <!-- <script type="text/javascript">


//display after user signs up with success
            $(function(){ //if register is clicked
                
                $('#register').click(function(e){

                    //now we perform a validation to these values
                    
                    var valid = this.form.checkValidity();


                    if (valid){

                        //val method gets the value
                        var user_first_name     = $('#user_first_name').val();
                        var user_last_name      = $('#user_last_name').val();
                        var user_gender          = $('#user_gender').val();
                        var user_email          = $('#user_email').val();
                        var phone_number        = $('#phone_number').val();
                        var user_password       = $('#user_password').val();

                        e.preventDefault(); //prevent program from submitting bc we want to use jquery submit instead of traditional submit

                        $.ajax({ //ajax request
                            type: 'POST',
                            url: 'process.php',
                            data: {user_first_name: user_first_name, user_last_name: user_last_name, user_gender: user_gender, user_email: user_email, phone_number: phone_number, user_password: user_password},

                            success: function(data){

                                Swal.fire({
                                'title': 'Successful',
                                'text': data, //get from process.php
                                'type': 'success'
                                })

                            },

                            error: function(data){
                                Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while saving the data',
                                'type': 'error'
                                })
                            }

                        });

                        
                    }else{
                        
                    }


                    
                    
                    

                    
                });

            });
        </script> -->

        

</body>
</html>

