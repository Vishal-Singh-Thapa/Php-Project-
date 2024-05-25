<?php
    $insert_msg = false;
    if(isset($_POST['name'])){

        // Set connection variables
        $server = "localhost";
        $username = "root";
        $password = "";

        // Create database connection
        $con = mysqli_connect($server, $username, $password);

        // Check for connection success
        if(!$con){
            die("Connection to database failed due to ".
            mysqli_connect_error());
        }

        // Collect post variables
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO `businessdb`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

        // Execute the query
        if($con->query($sql) == true){
            // echo "Successfully Inserted <br>";

            // Flag for successfull connection
            // Used to print the message in html
            $insert_msg = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }

        // Close the database connection
        $con->close();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to <b>MAIT</b> Shimla Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation.</p>
        
        <!-- This will be printed when the condition will be true i.e when we will click submit button and atlest name is filled in the form -->
        <?php
            if($insert_msg == true){
                echo "<p class='submitMsg'>Thanks for submitting the form. We are happy to see you in trip.</p>";
            }
        ?>

            <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name"> 
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter the description"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <!-- INSERT INTO `trip` (`SNo`, `Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`) VALUES ('1', 'Vishal Singh Thapa', '21', 'Male', 'vst123@gmail.com', '8130532163', 'Hello There!!', '2024-05-24 23:07:05.000000'); -->
</body>
</html>


