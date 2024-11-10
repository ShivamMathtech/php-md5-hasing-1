<!--  Get and Post method -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get and Post Method</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form class="offset-1 
    w-50" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        <h1 class="text-center">Registration form</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">

        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">

        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <div class="mb-3">
            <label for="cpass" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpass" name="cpass">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">DOB</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="mob" class="form-label">Mobile Number</label>
            <input type="number" class="form-control" id="mob" name="mob">
        </div>

        <input type="submit" class="btn btn-primary" name="submitregistration" value="submit" />
    </form>
    <?php 
     if(isset($_GET['submitregistration'])){
       // Always flter/Sanitize the registration data
       // Db connection open
       $conn = mysqli_connect('localhost','root','','ecoomerce_db');

         $name = mysqli_real_escape_string($conn, $_GET['name']);
         $email = mysqli_real_escape_string($conn, $_GET['email']);
         $pass = mysqli_real_escape_string($conn, $_GET['pass']);
         $cpass = mysqli_real_escape_string($conn, $_GET['cpass']);
         $dob = mysqli_real_escape_string($conn, $_GET['dob']);
         $mob = mysqli_real_escape_string($conn, $_GET['mob']);
         // Check if password and confirm password are same
        if($pass == $cpass){
            echo "ok we can proced";
            $pass = md5($pass);// Hasing algorithm 
           //Build Query
           $sql = "INSERT INTO user_tbl(`name`,`email`,`password`,`dob`,`mobile_no`) VALUES ('$name','$email','$pass','$dob','$mob')";
           // Excute the query
           $result = mysqli_query($conn, $sql);
        echo "<div class ='alert alert-success' role='alert'>
              Data saved Succesfully $result
             </div>";
        }else{
            echo "<div class ='alert alert-danger' role='alert'>
              Passwords do not match. Please re-enter.
             </div>";
        }

      mysqli_close($conn);
     }
//      else{
//  echo "not submitted";
//      }
    
      
     ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>