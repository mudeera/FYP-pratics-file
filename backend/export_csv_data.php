

<?php 
 
// Load the database configuration file 
include('connection.php');
 
// Fetch records from database 
$query =mysqli_query($con,"SELECT * FROM student ORDER BY id ASC"); 
$count= mysqli_num_rows($query);
if($count > 0){ 
    $delimiter = ","; 
    $filename = "student-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'name', 'f_name', 'monthly_income', 'phone_no', 'date_of_birth', 'religion', 'marital_status', 'place_of_domicile', 'permanent_address', 'postal_address' , 'name_of_last_institution_attended'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        // $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['id'], $row['name'], $row['f_name'], $row['monthly_income'], $row['phone_no'], $row['date_of_birth'], $row['religion'], $row['marital_status'], $row['place_of_domicile'],$row['permanent_address'], $row['postal_address'], $row['name_of_last_institution_attended']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>