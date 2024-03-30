<?php
$insert = false;
if(isset($_POST['name'])){
    //set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    
    //create a connection
    $con = mysqli_connect($server, $username, $password);
    
    //check for connection success
    if(!$con){
        die("connection to this database failed due to". mysqli_connect_error());
    }
    // echo "success connection to the db";
    
    //collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['number'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `mu_trip_to_banaras`.`trip` ( `name`, `age`, `gender`, `email`, `mobile`, `desc`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;
    
    //Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        //Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    
    //close the database connection
    $con->close();
}    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel From</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="mu" src="mu3.jpg" alt="Mumbai University">
    <div class="container">
        <h1>Welcome to Mumbai University Banaras trip form</h1>
        <p>Enter your details and submit this form to
           participate        
        </p>
        <?php
        if($insert == true){
         echo "<p class='SubmitMsg'>Thanks for submitting your form. We are happy
            to see you joining us for Banaras trip</p>";
        }
        ?>
        <form action="index.php" method="post">
         <input type="text" name="name" id="name" placeholder="Enter your name">
         <br>
         <input type="number" name="age" id="age" min="18" max="50" placeholder="age">
         <br>
         <input type="text" name="gender" id="gender" placeholder="Enter your gender">
         <br>
         <input type="email" name="email" id="email" placeholder="Emter your email">
         <br>
         <input type="tel" name="number" id="number" maxlength="10" placeholder="Enter your number">
         <br>
         <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your additional infromation here"></textarea>
         <br>
         <button class="btn">Submit</button>
         </form>
         
         
    </div>
    <script src="index.js"></script>
    
</body>
</html>