<?php session_start(); ?>
<?php
include("../classes/Database.php");
include("../classes/TherapistTable.php");
include("../classes/SpecialtiesTable.php");
include("../classes/AppointmentTable.php");
include("../classes/DocumentTable.php");

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

$documentsTable = new DocumentTable($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['itemId'])) {
    $documentId = $_POST['itemId'];
    
    // Delete the document from the database
    if ($documentsTable->deleteDocument($documentId)) {
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
