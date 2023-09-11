<?php session_start(); ?>
<?php include("classes/Database.php"); ?>
<?php include("classes/ChatTable.php"); ?>
<?php
// Check if the 'id' parameter is set in the URL
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $chats = new ChatTable($database);
    
    // Check if clientID is received via POST
    if (isset($_POST['clientID'])) {
        $clientID = $_POST['clientID'];

        // Query the database to fetch chat messages for the selected client
        $messages = $chats->getChatsBetweenUsers($clientID, $userId); // Replace with the actual method to fetch chat messages

        // Create HTML content for chat messages
        $html = '';
        foreach ($messages as $message) {
            if ($message['Sender'] === 'Therapist') {
                $html .= '<div class="message-user ps-2 me-3 my-3">
                <div class="d-flex justify-content-end align-items-top">

                    <div class="response me-2 delivered seen">
                        <p class="mb-0">' . htmlspecialchars($message['Message']) . '</p>
                    </div>
                    <div class="avatar avatar-md"></div>
                </div>
            </div>';
            } else {
                $html .= '<div class="message-agent ps-2 ms-3 my-3">
                <div class="d-flex align-items-top">
                    <div class="avatar avatar-md"></div>
                    <div class="message ms-2">
                        <p class="mb-0">' . htmlspecialchars($message['Message']) . '</p>
                    </div>
                </div>
            </div>';
            }           
                    
        }

        // Return the HTML response
        echo $html;
    } else {
        // Handle the case where clientID is not received
        echo 'client ID not provided.';
    }
} else {
    header("Location: index.php");
    exit;
}
?>