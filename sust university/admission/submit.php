<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'sust_university';

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect data
$full_name = $_POST['full_name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$ssc_school = $_POST['ssc_school'];
$ssc_gpa = $_POST['ssc_gpa'];
$ssc_year = $_POST['ssc_year'];
$hsc_college = $_POST['hsc_college'];
$hsc_gpa = $_POST['hsc_gpa'];
$hsc_year = $_POST['hsc_year'];
$program = $_POST['program'];

// Insert into database
$sql = "INSERT INTO applications 
(full_name, dob, gender, email, phone, address, ssc_school, ssc_gpa, ssc_year, hsc_college, hsc_gpa, hsc_year, program)
VALUES 
('$full_name', '$dob', '$gender', '$email', '$phone', '$address', '$ssc_school', '$ssc_gpa', '$ssc_year', '$hsc_college', '$hsc_gpa', '$hsc_year', '$program')";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='color:green;'>Application submitted successfully!</h2>";
} else {
    echo "<h2 style='color:red;'>Error: " . $conn->error . "</h2>";
}

$conn->close();
?>
