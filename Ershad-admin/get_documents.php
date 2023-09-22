<?php
// Include necessary files and initialize the database connection
include("../classes/Database.php");
include("../classes/DocumentTable.php");

// Check if therapistID is provided via POST
if (isset($_POST['therapistID'])) {
    $therapistID = intval($_POST['therapistID']);

    // Create an instance of the Database class
    $database = new Database();

    // Create an instance of the DocumentsTable class
    $documentsTable = new DocumentTable($database);

    // Fetch documents for the specified therapist
    $documents = $documentsTable->getDocumentsByTherapist($therapistID);

    // Initialize an array to store the response data


    if ($documents) {
        $response = array();
        foreach ($documents as $document) {
            // Add each document to the response array
            $response[] = array(
                'DocumentID' => $document['DocumentID'],
                'DocumentName' => $document['DocumentName'],
                'DocumentOrganization' => $document['DocumentOrganization'],
                'DocumentDate' => $document['DocumentDate'],
                'DocumentType' => $document['DocumentType']
            );
        }
    }

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($documents);
} else {
    // Handle the case where therapistID is not provided
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('error' => 'Therapist ID is missing.'));
}
?>
