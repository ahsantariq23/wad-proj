<?php
echo"Php is Enabled";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate form data (you may add more validation as needed)

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $servername = "localhost"; // Change this to your database server name
    $username = "abstract_programmer"; // Change this to your database username
    $password = "mypassword"; // Change this to your database password
    $dbname = "WebsiteUsersDB"; // Change this to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashedPassword);

    // Execute the SQL statement
    if ($stmt->execute()) {
        // If the data is inserted successfully, redirect the user to a success page
        header("Location: ../sign-in/sign-in.html");
        exit();
    } else {
        // If an error occurs during insertion, display an error message
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
}
?>
