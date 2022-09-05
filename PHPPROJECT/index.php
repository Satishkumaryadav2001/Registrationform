<?php
$insert=false;
if(isset($_POST['name'])){

//set connection variable
$server="localhost";
$username="root";
$password="";
$dbname="trip";
//create a data base connection
$con=mysqli_connect($server,$username,$password,$dbname);
if(!$con){
    //check for connection success
    die("connection to this database failed due to".mysqli_connect_errror());
}
//echo "Success connectioning to the Database";
//collect post variable
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['other'];
//Execuit the query
$sql="INSERT INTO `trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";
 //echo"$sql";
if($con->query($sql)==true){
    //echo"Successfully Inserted";
    //flag for Successfully Insertion
    $insert=true;
}
else
{
    echo"ERROR:$sql <br> $con->error";
}
//close the data base connection
$con->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To Travel To Government Polytechanic Saharanpur</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="container">
    <img class="bg" src="bg.png" alt="Governmet Polytechanic Saharanpur" width="100%">
    <marquee><h2><i>Welcome To Governmet Polytechanic Saharanpur kedarnath Trip from</i></h2></marquee>
    <P>Enter your details and this to confirm your participation in the trip</P>
    <?php
    if($insert==true){
       echo "<p class='submitMsg'>Thanks for submitting your form.We are happy to see you joining us for the kedarnath trip</p>";
   }
    ?>
    <form action="index.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter your name">
     <input type="text" name="age" id="age" placeholder="Enter your age">
    <input type="text" name="gender" id="gender" placeholder="Enter your gender">
     <input type="email" name="email" id="email" placeholder="Enter your email">
     <input type="phone" name="phone" id="phone" placeholder="Enter your content no.">
     <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any inforamation here">
    </textarea>
    <button class="btn">Submit</button>
      </form>
</div>
<script src="index.js"></script>

</body>
</html