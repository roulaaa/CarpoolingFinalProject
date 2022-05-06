

 <?php 

 //echo "Hello from process";

 require_once('connection.php');

if(isset($_POST)){  
    //check the values coming from this form
    $user_first_name    = $_POST['user_first_name'];
    $user_last_name     = $_POST['user_last_name'];
    $user_gender        = $_POST['user_gender'];
    $user_email         = $_POST['user_email'];
    $phone_number       = $_POST['phone_number'];
    $user_password      = sha1($_POST['user_password']); //hash

    $sql = "INSERT INTO user_type(user_first_name, user_last_name, user_gender, user_email, phone_number, user_password) VALUES(?,?,?,?,?,?)";
    $stmtinsert = $mysqli->prepare($sql);
    //echo $_ . " " . $_ . " " . $user_email . " " . $_ . " " . $user_password;
    $result = $stmtinsert->execute([$user_first_name , $user_last_name , $user_gender, $user_email , $phone_number , $user_password]);

    if ($result){
        echo 'Saved successfully..';
    }
    else{
        echo 'An error occured while saving the data.';
    }

}
else {
    echo 'No data';
}

?>