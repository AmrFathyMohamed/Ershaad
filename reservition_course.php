<?php
// Include necessary files and initialize your database connection here
include("classes/Database.php");
include("classes/CourseClientTable.php"); // Assuming you have a CourseClientTable class

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    // if (isset($_SESSION['user_id'])) {
        // Get data from the form
        $courseId = $_POST['CourseID'];
        $clientId = $_POST['ClientID'];
        $therapistId = $_POST['TherapistID'];
        // Create a database connection
        $database = new Database();
        $courseClientTable = new CourseClientTable($database); // Change this to your CourseClientTable class
        
        // Check if the course, client, and therapist exist (you can validate IDs against your database if needed)
        
        // Insert the reservation as "Pending" into the course_client table
        $status = 'Pending Review'; // Change this to 'Pending'
        //echo $courseId . $clientId. $status;
        
        if ($courseClientTable->insertCourseClient($courseId, $clientId,$therapistId, $status)) {
            // Reservation was successful
            // You can redirect the user to a success page or display a success message
            echo '<script>window.location.href = "my profile.php";</script>';
            exit;
        } else {
            // Reservation failed, handle the error
            $error = "Failed to reserve the course. Please try again.";
            echo $error;
        }
    // } else {
    //     // User is not logged in, handle accordingly (e.g., redirect to login page)
    //     header("Location: login.php"); // Redirect to the login page
    //     exit;
    // }

}
// Include your HTML template for the page (e.g., success.php or the reservation form)
?>
