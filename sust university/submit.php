   <?php
   $servername = "localhost";
   $username = "root"; // Default XAMPP username
   $password = ""; // Default is empty
   $dbname = "contact_form";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);

   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }

   // Prepare and bind
   $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
   $stmt->bind_param("ssss", $name, $email, $subject, $message);

   // Set parameters and execute
   $name = $_POST['name'];
   $email = $_POST['email'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];

   $stmt->execute();

   echo "New message recorded successfully";

   $stmt->close();
   $conn->close();
   ?>
   