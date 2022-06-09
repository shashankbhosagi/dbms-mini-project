<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to ".mysqli_connect_error());
    }
    // echo "Success connecting to the DB";
    $name = $_POST["name"];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dd`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp()); ";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Succesfully inserted";
        $insert = true;
    }
    else
    {
        echo "Error: $sql <br> $con->error";
        
    }

    $con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Travel form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <img class="bg" src="bg.jpg" alt="rscoe" />
    <div class="container">
      <h2>
        Welcome to JSPM's Rajarshi Shahu College of Engineering US trip form
      </h2>
      <p>
        Enter you details and submit this form to confirm your participation in
        the trip
      </p>
      <?php
    if($insert == true){
      echo "<p class='submit_msg'>Thank you for submitting your form. We are happy for having you </p>";}
      ?>

      <form action="index.php" method="post">
        <input
          type="text"
          name="name"
          id="name"
          ,
          placeholder="Enter your name"
        />
        <input type="text" name="age" id="age" placeholder="Enter your age" />
        <input
          type="text"
          name="gender"
          id="gender"
          placeholder="Enter your gender"
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
          placeholder="Enter you phone"
        />

        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="10"
          placeholder="Enter any other information here"
        ></textarea>
        <button class="btn">Submit</button>
      </form>
    </div>
    <script src="index.js"></script>
  </body>
</html>
