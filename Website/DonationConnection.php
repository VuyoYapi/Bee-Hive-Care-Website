<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database credentials
    $servername = "localhost";
    $username = "root"; // replace with your database username
    $password = ""; // replace with your database password
    $dbname = "beehivecare";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate and sanitize input data
    $name = trim($_POST['Name'] ?? '');
    $surname = trim($_POST['Surname'] ?? '');
    $email = filter_var(trim($_POST['Email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST['Phone'] ?? '');
    $password = trim($_POST['Password'] ?? '');
    $donationType = trim($_POST['DonationType'] ?? '');
    $donationNumber = trim($_POST['DonationNumber'] ?? '');
    $dateOfDonation = trim($_POST['DateOfDonation'] ?? '');
    $message = trim($_POST['text'] ?? '');

    // Check for required fields
    if (empty($name) || empty($surname) || empty($email) || empty($phone) || empty($password) || empty($donationType) || empty($donationNumber) || empty($dateOfDonation) || empty($message)) {
        echo "<p style='color: red;'>All fields are required.</p>";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO donationOptions (name, surname, email, phone, password, donationType, donationNumber, dateOfdonation, comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        if ($stmt === false) {
            die("Error preparing the SQL statement: " . $conn->error);
        }

        $stmt->bind_param("sssssssss", $name, $surname, $email, $phone, $password, $donationType, $donationNumber, $dateOfDonation, $message);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<p style='color: green;'>New record created successfully</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Bee-hive Care Homepage</title>
	  <link rel="icon" href="Images/logo12-removebg-preview.png" width="100px" height="145px">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    </head>
    <body>
	<a href="Confimation-Form.php" class="button">Continue</a>

	
	</body>
	  </html>