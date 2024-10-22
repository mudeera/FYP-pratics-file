<?php
  $showAlert = false;
  $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
// if(isset($_POST['signup'])){
    include('connection.php');
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $exists = false;
    if(($password == $cpassword) && $exists == false){
        $sql="INSERT INTO `users`(`sno`, `user_name`, `password`, `dt`) VALUES ('','$user_name','$password',current_timestamp())";
        $result=mysqli_query($con,$sql);
        if($result){
            $showAlert = true;
        }
    }   
    else{
        $showError = "passwords do not match";
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Signup Form</title>
    <style>
        body{
            background: #080710;
        }
        .form-text {
            margin-top: 0.25rem;
            font-size: .875em;
            color: #FFF;
        }
    </style>
  </head>
  <body>
    <?php require 'partial/_nav.php' ?>
    <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sucess!</strong> Your account is created and you can login
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
   if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '. $showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <div class="container my-5">
        <div class="row h-100 d-flex align-items-center justify-content-center">
            <div class="card w-50 my-auto justify-content-conter shadow">
                <div class="card-header bg-info text-white">
                    <h1 class="text-center">Registration Form</h1>
                    <form action="signup.php" method="POST" style="display: flex;
                    flex-direction: column;
                    align-items: center;">
                        <div class="form_group col-md-6">
                            <label for="user_name" class="form-label">UserName</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="emailHelp">
                        </div>
                        <!-- <div class="form_group col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                        </div> -->
                        <div class="form_group col-md-6">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password"  name="password" class="form-control" id="Password">
                        </div>
                        <div class="form_group col-md-6">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword"  name="cpassword" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Make sure to type the same password</div>
                    
                        <button type="submit" class="btn btn-primary">Signup</a></button>
                    </form>
                </div>
            </div>
        </div>       
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>