<?php session_start(); ?>
<?php
include("../classes/Database.php");
include("../classes/TherapistTable.php");
include("../classes/SpecialtiesTable.php");
include("../classes/AppointmentTable.php");

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $therapists = new TherapistTable($database);
    $therapistsData = $therapists->getTherapists();
    $SpecialtiesObject = new SpecialtiesTable($database);
    $specialties = $SpecialtiesObject->getDataByTableName();
} else {
    header("Location: index.php");
    exit;
}

$appointmentTable = new AppointmentTable($database);
echo "<script>alert('".$_POST['itemId']."');</script>";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['itemId'])) {
    $appointmentId = $_POST['itemId'];
    
    // Delete the appointment from the database
    if ($appointmentTable->deleteAppointment($appointmentId)) {
        echo true;
        exit;
    } else {
        echo false;
        exit;
    }
} else {
    echo false;
    exit;
}
