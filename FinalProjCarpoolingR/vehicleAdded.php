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


        if(isset($_POST['register_vehicle'])){  
        //check the values coming from this form
        $user_id          = $_POST['user_id']; //tranferring the user_id to table of vehicles to know who's car
        $license          = $_POST['license'];
        $plate            = $_POST['plate'];
        $v_type             = $_POST['v_type'];
        $model            = $_POST['model'];
        $year             = $_POST['year'];
        $seats_available  = $_POST['seats_available'];

        $query = $mysqli->prepare("Select * from drivers where user_id = ?");
        $query->bind_param("s", $user_id);
        $query->execute();
        $result = $query->get_result();
        $data = $result->fetch_assoc();

        $query = $mysqli->prepare("Select * from vehicles where id_of_driver = ?");
        $query->bind_param("s",$data['id']);
        $query->execute();
        $result = $query->get_result();

        $sql = "INSERT INTO vehicles(license, plate, v_type, model, year, id_of_driver) VALUES(?,?,?,?,?,?)";
        $stmtinsert = $mysqli->prepare($sql);
        //echo $_ . " " . $_ . " " . $user_email . " " . $_ . " " . $user_password;
        $result = $stmtinsert->execute([$license , $plate , $v_type, $model , $year , $data['d_id']]);

        }
        ?>
        <!-- Header-->
        <header class="py-5">
            <h1>Your Vehicle is Added! </h1>
            <a class="btn btn-primary btn-lg" href="index.php">Return</a>

            
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
    
 
