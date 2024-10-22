<?php
include('connection.php');

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $f_name = $_POST['f_name'];
    $monthly_income = $_POST['monthly_income'];
    $phone_no = $_POST['phone_no'];
    // Insert applicant data into the database
    $sql_applicant = "INSERT INTO applicants (full_name, email, phone, address) VALUES ('$full_name', '$email', '$phone', '$address')";
    if (mysqli_query($conn, $sql_applicant)) {
        $applicant_id = mysqli_insert_id($conn); // Get the auto-generated applicant ID

        // Insert academic record data into the database
        $sql_academic_record = "INSERT INTO academic_records (applicant_id, course, grades) VALUES ('$applicant_id', '$course', '$grades')";
        if (mysqli_query($conn, $sql_academic_record)) {
            echo "Admission submitted successfully!";
        } else {
            echo "Error inserting academic record: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting applicant data: " . mysqli_error($conn);
    }
}


?>







<!DOCTYPE html>
<html>
<head>
    <title>Online Admission Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Online Admission Form</h2>
        <form action="process_admission.php" method="POST">
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" name="phone" required>

            <label for="address">Address:</label>
            <textarea name="address" required></textarea>

            <label for="course">Course:</label>
            <input type="text" name="course" required>

            <label for="grades">Grades:</label>
            <input type="number" name="grades" min="0" max="100" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
