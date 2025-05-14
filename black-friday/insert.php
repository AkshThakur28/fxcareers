<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Sanitize input data
$firstName = trim($_POST['first_name']);
$lastName = trim($_POST['last_name']);
$email = trim($_POST['email']);
$mobileNo = trim($_POST['mobile']);

// Concatenate name with a space between first and last names
$name = $firstName . ' ' . $lastName;

// Database connection
include('db.php'); // Ensure your database connection is correct

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // Check if the connection was successful
}

$baseUrl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/';

try {
    // Prepare and bind
    $insertUserStmt = $conn->prepare("INSERT INTO `leads` (`name`, `email`, `mobile`, `source`, `campaing`) 
                                      VALUES (?, ?, ?, ?, ?)");
    if (!$insertUserStmt) {
        die("SQL prepare failed: " . $conn->error);  // Check if prepare failed
    }

    $insertUserStmt->bind_param("sssss", $name, $email, $mobileNo, $source, $campaing);
    
    $source = 'landing page';
    $campaing = 'Black Friday';
    
    if ($insertUserStmt->execute()) {
        // Send email to the user
        try {
            
            ob_start();
            include('mail.php'); // Ensure the file path is correct
            $emailBody = ob_get_clean();
    
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;                       
            $mail->isSMTP();                          
            $mail->Host = 'smtp.gmail.com';    
            $mail->SMTPAuth = true;                  
            $mail->Username = 'no_reply@fxcareers.ae'; 
            $mail->Password = 'hgrg kuuc ozli lzld';  
            $mail->SMTPSecure = 'tls';                
            $mail->Port = 587;                 
            $mail->setFrom('no_reply@fxcareers.ae', 'FXCareers');
            $mail->addAddress($email, $name);         
            $mail->isHTML(true);                      
            $mail->Subject = 'Welcome to FXCareers Account Registration Successful!';
            $mail->Body = $emailBody;
            $mail->send();
            
            // Show success message and redirect
            echo "<script>
                    alert('Your data has been registered successfully! A confirmation email has been sent.');
                    window.location.href = '$baseUrl';
                  </script>";
        } catch (Exception $e) {
            // Handle email send failure
            echo "<script>
                    alert('Your data was registered, but the confirmation email could not be sent. Error: " . $mail->ErrorInfo . "');
                    window.location.href = '$baseUrl';
                  </script>";
        }
    } else {
        // Database error
        echo "<script>
                alert('Database error: " . $insertUserStmt->error . "');
                window.location.href = '$baseUrl';
              </script>";
    }
    $insertUserStmt->close();
} catch (Exception $e) {
    // Handle any database or general error
    echo "<script>
            alert('An error occurred: " . $e->getMessage() . "');
            window.location.href = '$baseUrl';
          </script>";
} finally {
    // Close the database connection in the finally block
    $conn->close();
}

?>
