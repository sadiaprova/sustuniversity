<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
</head>
<body>
    <?php
    include 'db_connect.php';

    // Assuming student_id is obtained from a login session or a GET request
    $student_id = '12345'; // Replace with dynamic value

    $sql = "SELECT attendance, courses, teachers, semester_fees, result FROM students WHERE student_id = '$student_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h1>Welcome, Student ID: " . $student_id . "</h1>";
            echo "<p>Attendance: " . $row["attendance"] . "</p>";
            echo "<p>Courses: " . $row["courses"] . "</p>";
            echo "<p>Teachers: " . $row["teachers"] . "</p>";
            echo "<p>Semester Fees: " . $row["semester_fees"] . "</p>";
            echo "<p>Result: " . $row["result"] . "</p>";
        }
    } else {
        echo "No records found!";
    }

    $conn->close();
    ?>
</body>
</html>
