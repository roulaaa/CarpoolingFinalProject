
 <?php 


require_once('connection.php');

if(isset($_POST)){  
   //check the values coming from this form
   $license          = $_POST['license'];
   $plate            = $_POST['plate'];
   $type             = $_POST['v_type'];
   $model            = $_POST['model'];
   $year             = $_POST['year'];
   $seats_available  = $_POST['seats_available'];

   $sql = "INSERT INTO vehicles(license, plate, v_type, user_email, phone_number, user_password) VALUES(?,?,?,?,?,?)";
   $stmtinsert = $mysqli->prepare($sql);
   //echo $_ . " " . $_ . " " . $user_email . " " . $_ . " " . $user_password;
   $result = $stmtinsert->execute([$license , $plate , $v_type, $model , $year , $seats_available]);

   if ($result){
       echo '';
   }
   else{
       echo 'An error occured while saving the data.';
   }

}
else {
   echo 'No data';
}
?>
