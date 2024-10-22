<?php
include('connection.php');

if(isset($_POST['save'])){
// get the post records
$update_id = $_POST['update_id'];
$name = $_POST['name'];
$f_name = $_POST['f_name'];
$monthly_income = $_POST['monthly_income'];
$phone_no = $_POST['phone_no'];
$date_of_birth = $_POST['date_of_birth'];
$religion = $_POST['religion'];
$marital_status = $_POST['marital_status'];
$place_of_domicile = $_POST['place_of_domicile'];
$permanent_address = $_POST['permanent_address'];
$postal_address = $_POST['postal_address'];
$name_of_last_institution_attended = $_POST['name_of_last_institution_attended'];
$userId = $_SESSION['userId'];
    if($_POST['update_id'] == '-1')
    {
        
        mysqli_query($con, "INSERT INTO `student`(`id`, `name`, `f_name`, `monthly_income`, `phone_no`, `date_of_birth`, `religion`, `marital_status`, `place_of_domicile`, `permanent_address`, `postal_address`, `name_of_last_institution_attended`,`userId`) VALUES ('','$name','$f_name','$monthly_income','$phone_no','$date_of_birth','$religion','$marital_status','$place_of_domicile','$permanent_address','$postal_address','$name_of_last_institution_attended','$userId')");
    }
    else
    {

        $update = "UPDATE student SET name='$name', f_name='$f_name', monthly_income='$monthly_income', phone_no='$phone_no', date_of_birth='$date_of_birth' WHERE id='$update_id'";
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
                position: relative;
            }

            .form-items .header {
                border: 1px solid black;
                width: 12%;
                height: 50%;
            }
            .back-video{
                width: 100%;
                height: 100vh;
                position: absolute;
                left: 0;
                top: 0;
                z-index: -1;
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
                        <label for="name">Name of Student</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($row['name'] )? $row['name']  : "" ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="f_name">Father's/Guardian Name</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" value="<?php echo isset($row['f_name'] )? $row['f_name']  : "" ?>" required>
                    </div>
                    <div class="form-group">
                    <label for="monthly_income">Monthly Income</label>
                    <input type="text" class="form-control" id="monthly_income" name="monthly_income" value="<?php echo isset($row['monthly_income'] )? $row['monthly_income']  : "" ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone/Mobile Number</label>
                    <input type="number" class="form-control" id="phone_number" name="phone_no" value="<?php echo isset($row['phone_no'] )? $row['phone_no']  : "" ?>" required>
                </div>
                <div class="form-group">
                    <label for="permanent_address">Permanent Address</label>
                    <input type="text" class="form-control" id="permanent_address" name="permanent_address" value="<?php echo isset($row['permanent_address'] )? $row['permanent_address']  : "" ?>" required>
                </div>
                <div class="form-group">
                    <label for="postal_address">Postal Address</label>
                    <input type="text" class="form-control" id="postal_address" name="postal_address" value="<?php echo isset($row['postal_address'] )? $row['postal_address']  : "" ?>" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo isset($row['date_of_birth'] )? $row['date_of_birth']  : "" ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="religion">Religion</label>
                        <input type="text" class="form-control" id="religion" name="religion" value="<?php echo isset($row['religion'] )? $row['religion']  : "" ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="marital_status">Marital Status</label>
                        <input type="text" class="form-control" id="marital_status" name="marital_status" value="<?php echo isset($row['marital_status'] )? $row['marital_status']  : "" ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="place_of_domicile">Place of Domicile</label>
                        <input type="text" class="form-control" id="place_of_domicile" name="place_of_domicile" value="<?php echo isset($row['place_of_domicile'] )? $row['place_of_domicile']  : "" ?>"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postal_address">name_of_last_institution_attended</label>
                    <input type="text" class="form-control" id="name_of_last_institution_attended" name="name_of_last_institution_attended" value="<?php echo isset($row['name_of_last_institution_attended'] )? $row['name_of_last_institution_attended']  : "" ?>" required>
                </div>
                   <input type="submit" name="save" value="save">
                </form>
               
            </div>
        </div>
        <video autoplay loop muted plays-inline class="back-video">
            <source src="./images/video1.mp4.mp4" type="video/mp4">
        </video>
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

<table border="1px" cellpadding="10px" cellspacing="0" height="80%">
    <tr>
        <th>S#</th>
        <th>Name of Student</th>
        <th>Father's/Guardian Name</th>
        <th>Monthly Income</th>
        <th>Phone/Mobile Number</th>
        <th>Permanent Address</th>
        <th>Postal Address</th>
        <th>Date of Birth</th>
        <th>Religion</th>
        <th>Marital Status</th>
        <th>Place of Domicile</th>
        <th>name_of_last_institution_attended</th>
        <th colspan="3">Actions</th>
    </tr>
    <?php
    $i=1;
    $query = "SELECT * FROM student where userid='$userid'";
    $data = mysqli_query($con, $query); // Remove the quotes around mysqli_query function call
    $result = mysqli_num_rows($data); // Remove the quotes around mysqli_num_rows function call

    if ($result) {
        while ($row = mysqli_fetch_array($data)) {
            ?>
           <tr>
            <td><?php echo $i++ ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['f_name']; ?></td>
                <td><?php echo $row['monthly_income']; ?></td>
                <td><?php echo $row['phone_no']; ?></td>
                <td><?php echo $row['permanent_address']; ?></td>
                <td><?php echo $row['postal_address']; ?></td>
                <td><?php echo $row['date_of_birth']; ?></td>
                <td><?php echo $row['religion']; ?></td>
                <td><?php echo $row['marital_status']; ?></td>
                <td><?php echo $row['place_of_domicile']; ?></td>
                <td><?php echo $row['name_of_last_institution_attended']; ?></td>

                <td><a href="test.php?edit_id=<?php echo $row['id']; ?>">Edit</a></td>
                <td><a onclick="return confirm('Are you sure,you want to delete?')" href="test.php?dlt_id=<?php echo $row['id']; ?>">Delete</a></td>
                <td><a onclick="return confirm('Are you sure,you want to download?')" href="test.php?dl_id=<?php echo $row['id']; ?>">Download</a></td>
            </tr>

            <?php
        }
    } else {
        ?>
        <tr>
            <td>No record Found</td>
        </tr>
    <?php
    }
    ?>
</table>
