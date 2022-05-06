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

        <!-- Header-->
        
        <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3">
                    <div class="m-4 m-lg-5"> <h1 style = "text-align:center">Available Drivers </h1>
                    <?php 
                    // $user_id = $_GET['user_id'];
                    // $query = $mysqli->prepare("Select * from user_type where user_id = '$user_id';");
                    // $query->execute();
                    // $result = $query->get_result();
                    // $data = $result->fetch_assoc();
                    
                    ?>
        
                    <?php
                    
            if(isset($_POST['pass_sub'])){  
                //check the values coming from this form
                $user_id          = $_POST['user_id']; 
                $p_address         = $_POST['p_address'];
                $p_city            = $_POST['p_city']; 
            
            }

            $query = $mysqli->prepare("Select * from user_type where user_id = ?");
            $query->bind_param("s", $user_id);
            $query->execute();
            $result = $query->get_result(); 
            $data = $result->fetch_assoc();

            $query = $mysqli->prepare("Select * from passengers where user_id = ?");
            $query->bind_param("s", $user_id);
            $query->execute();
            $result = $query->get_result();

            if($result->num_rows > 0){

                $passenger = $result->fetch_assoc();
                $query = $mysqli->prepare("Select * from rides where p_id = ?");
                $query->bind_param("s", $passenger['p_id']);
                $query->execute();
                $array = $query->get_result();

                if($array->num_rows > 0){

                    $query1 = $mysqli->prepare("Select * from rides where p_id = ?");
                    $query1->bind_param("s", $passenger['p_id']);
                    $query1->execute();
                    $result1 = $query1->get_result();
                    $data1 = $result1->fetch_assoc();

                    $query = $mysqli->prepare("UPDATE rides SET destination = ? WHERE ride_id = ?");
                    $query->bind_param("ss", $p_city, $data1['ride_id']);
                    $query->execute();
                }
                else{
                    $query = $mysqli->prepare("INSERT INTO rides(p_id, destination) VALUES(?,?)");
                    $query->bind_param("ss", $passenger['p_id'], $p_city);
                    $query->execute();
                }

                $query = $mysqli->prepare("Select * from drivers");
                $query->execute();
                $array = $query->get_result();

                if($array->num_rows > 0){?>
                
                <?php
                        while ($drivers = $array->fetch_assoc()){?>                     
                            <h3><a href = "choose-driver.php?p_id=<?php echo $passenger['p_id'] ?>" style = "color:black; text-align:center; text-decoration:none"><?php
                            echo $drivers["d_first_name"];?> &nbsp; <?php
                            echo $drivers["d_rating"];?> &nbsp; <?php
                            echo $drivers["d_gender"];?> &nbsp; <?php
                            echo $drivers["d_route"];?> &nbsp; <?php
                            echo $drivers["time_to_dest"];?> &nbsp; <?php
                            echo $drivers["d_phone"];?> &nbsp; 
                    </a></h3><?php
                        }

                    
                }else{
                    echo "No drivers available at this time!";
                }

    
                if($array->num_rows > 0){?><?php
                    while ($drivers = $array->fetch_assoc()){?>
                        <h3><a href = "choose-driver.php?user_id=<?php echo $passenger['p_id'] ?>" style = "color:black; text-align:center; text-decoration:none"><?php

                        echo $drivers["d_first_name"];?> &nbsp; <?php
                        
                        echo $drivers["d_rating"];?> &nbsp; <?php
                        echo $drivers["d_gender"];?> &nbsp; <?php
                        echo $drivers["d_route"];?> &nbsp; <?php
                        echo $drivers["d_city"];?> &nbsp; <?php
                        echo $drivers["time_to_dest"];?> &nbsp; <?php
                        echo $drivers["d_phone"]; ?> &nbsp; 
                        </a></h3><?php


    
                    }
                }else{
                    echo "No drivers available at this time!";
                }
            }else{
                $sql = "INSERT INTO passengers(p_first_name, p_last_name, p_gender, user_id) VALUES(?,?,?,?)";
                $stmtinsert = $mysqli->prepare($sql);
                //echo $_ . " " . $_ . " " . $user_email . " " . $_ . " " . $user_password;
                $result = $stmtinsert->execute([$data['user_first_name'] , $data['user_last_name'], $data['user_gender'], $data['user_id']]);

                $query = $mysqli->prepare("Select * from rides where p_id = ?");
                $query->bind_param("s", $passenger['p_id']);
                $query->execute();
                $array = $query->get_result();

                if($array->num_rows > 0){
                    $query = $mysqli->prepare("UPDATE rides SET destination = ? WHERE p_id = ?");
                    $query->bind_param("ss", $p_city, $$passenger['id']);
                    $query->execute();
                }
                else{
                    $query = $mysqli->prepare("INSERT INTO rides(p_id, destination) VALUES(?,?)");
                    $query->bind_param("ss", $passenger['p_id'], $p_city);
                    $query->execute();
                }

                $query = $mysqli->prepare("Select * from drivers");
                $query->execute();
                $array = $query->get_result();
    
                if($array->num_rows > 0){
                    while ($drivers = $array->fetch_assoc){
                        echo $drivers["d_first_name"];?> &nbsp; <?php
                        echo $drivers["d_rating"];?> &nbsp; <?php
                        echo $drivers["d_gender"];?> &nbsp; <?php
                        echo $drivers["d_route"];?> &nbsp; <?php
                        echo $drivers["d_city"];?> &nbsp; <?php
                        echo $drivers["time_to_dest"];?> &nbsp; <?php
                        echo $drivers["d_phone"];?> &nbsp; <?php
    
                    }
                }else{
                    echo "No drivers available at this time!";
                }
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

