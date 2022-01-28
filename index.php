<?php
$insert = false;
if(isset($_POST['name'])){
   //set connection vairables -->
$server = "localhost";
$username = "root";
$password = "";

//create a connection -->
$con = mysqli_connect($server,$username,$password);

//check for connection success-->
if(!$con){
    die("Connectin to this database failed due to" . mysqli_connect_error());
}
//echo "Success connection to the db"

//collect post vairables-->
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$desc=$_POST['desc'];

$sql = "INSERT INTO `trip`.`trip` ( `name`, `email`, `phone`, `gender`, `other`,
`dt`) VALUES ( '$name', '$email', '$phone', '$gender', '$desc', current_timestamp());";

// echo $sql;

//Execute the query-->
if($con->query($sql)==true){
    $insert = true;  // Flag for successfull insertion..
}else{
    echo "ERROR: $sql <br> $con->error";
}
//Close the database connection.....
$con->close();

}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <img class="bg" src="bg.jpg" alt="College" />
    <div class="container">
      <h1>Welcome to Trip Form</h1>
      <p>Enter your details to confirm your participation in the trip</p>
      <?php
      if($insert == true){
      echo "<p class='submitMsg'>
         Thanks for submitting your form and joining us for the trip
      </p>";
      }
      ?>

      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name"
        />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter your email"
        />
        <input
          type="phone"
          name="phone"
          id="phone"
          placeholder="Enter your phone num"
        />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter your gender"
        />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Enter your description"
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>