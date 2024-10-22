

<?php
include('connection.php');

if(isset($_POST['save'])){
// get the post records
$update_id = $_POST['update_id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$created = $_POST['created'];
$status = $_POST['status'];

    if($_POST['update_id'] == '-1')
    {
        
        mysqli_query($con, "INSERT INTO `student`(`id`, `first_name`, `last_name`, `email`, `gender`, `country`, `created`, `status`) VALUES ('','$first_name','$last_name','$email','$gender','$country','$created','$status')");
    }
    else
    {

        $update = "UPDATE student SET first_name='$first_name', last_name='$last_name', email='$email', gender='$gender', country='$country', created='created', status='$status' WHERE id='$update_id'";
        $data=mysqli_query($con,$update);
    }

}
if(isset($_GET['edit_id']))
{
    $id=$_GET['edit_id'];
    //display data
    $select="select * FROM student WHERE id='$id'";
    $data =mysqli_query($con,$select);
    //Row fetch
    $row=mysqli_fetch_assoc($data);
}
if(isset($_GET['dlt_id']))
{
    $query = "DELETE FROM student WHERE id=".$_GET['dlt_id'];
    $data = mysqli_query($con, $query);
    echo '<script type="text/javascript">
    alert("Data deleted successfully");
    window.open("http://localhost/FYP/test.php","_self");
</script>';
}
?>


<!DOCTYPE html>
<html>

    <head>
        <title>Admission Form</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <style>
            .container {
                background-color:#eee;
            }

            .form-items .header {
                border: 1px solid black;
                width: 12%;
                height: 50%;
            }

            @media (max-width: 768px) {
                .form-items .header {
                    width: 30%;
                    height: 30%;
                }
            }
        </style>
    </head>

    <body>
        <div class="container my-4">
            <h1 class="text-center">Online Admission Form</h1>
            <div class="form-items">
                <form action="" method="post">
                    <input type="hidden" name="update_id" value="<?php echo isset($row['id'] )? $row['id']  : '-1' ?>">
                    <div class="form-group">
                        <label for="first_name">first_name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo isset($row['first_name'] )? $row['first_name']  : "" ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo isset($row['last_name'] )? $row['last_name']  : "" ?>" required>
                    </div>
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($row['email'] )? $row['email']  : "" ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" value="<?php echo isset($row['gender'] )? $row['gender']  : "" ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="country">country</label>
                        <input type="text" class="form-control" id="country" name="country" value="<?php echo isset($row['country'] )? $row['country']  : "" ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="created">created</label>
                        <input type="text" class="form-control" id="created" name="created" value="<?php echo isset($row['created'] )? $row['created']  : "" ?>" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status" value="<?php echo isset($row['status'] )? $row['status']  : "" ?>" required>
                        </div>
                    </div>
                   <input type="submit" name="save" value="save">
                </form>
               
            </div>
        </div>
        <!-- <center><button><a href="test.php">View</a></button></center> -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    </body>

</html>




<!-- Export link -->
<div class="col-md-12 head">
    <div class="float-right">
        <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
    </div>
</div>

<!-- Data list table --> 
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Created</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>


        <?php 
        $i=1;
        // $query = "SELECT * FROM student";
        $data = mysqli_query($con, $result); // Remove the quotes around mysqli_query function call
        // $result = mysqli_num_rows($data);
        // Fetch records from database 
        $result = mysqli_query("SELECT * FROM members ORDER BY id ASC"); 
        if($result->num_rows > 0){ //->num_rows > 0
            while($row = $result->fetch_assoc( $data))
            { //$result->
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['created']; ?></td>
                        <td><?php echo ($row['status'] == 1)?'Active':'Inactive'; ?></td>
                    </tr>
                <?php 
            }
        }
        else{
            ?>
            <tr><td colspan="7">No member(s) found...</td></tr>
        <?php
          }
        ?>
    </tbody>
</table>