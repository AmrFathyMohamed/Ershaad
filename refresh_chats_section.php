<?php session_start();include("classes/Database.php"); ?>
<?php include("classes/ChatTable.php"); ?>
<?php
// Check if the 'id' parameter is set in the URL
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $chats = new ChatTable($database);
    if ($_SESSION['type'] == 'therapist') {
        $chatsData = $chats->getAllChatsForTherapist($userId);
    } else if ($_SESSION['type'] == 'client') {
        $chatsData = $chats->getAllChatsForUser($userId);
    }
} else {
    
}

// Fetch the latest chat data (modify this query according to your database structure)


// Generate the HTML for chat tickets

//print_r($chatsData);
$html = ''; // Initialize the HTML variable

foreach ($chatsData as $c) {
    if ($_SESSION['type'] == 'therapist') {
        $N = $c['Username'];
    } else if ($_SESSION['type'] == 'client') {
        $N = $c['FullName'];
    }

    $html .= '<div class="ticket w-95 mx-auto ps-3 py-3 mt-3 d-flex justify-content-between align-items-center " onclick="ticketclick(' . $c['UserID'] . ', ' . $c['TherapistID'] . ', \'' . $N . '\')">
        <div class="content">
            <h6 class="mb-0">
                ' . $N . '
            </h6>
            <small class="mb-0 last-message">';

    if ($_SESSION['type'] == 'therapist') {
        if ($c['LastMessageSender'] == 'Therapist') {
            $message = $c['LastMessage'];
            if (strlen($message) > 100) {
                $message = substr($message, 0, 25) . '...';
            }
            $html .= 'You : ' . $message;
        } else {
            $message = $c['LastMessage'];
            if (strlen($message) > 100) {
                $message = substr($message, 0, 25) . '...';
            }
            $html .= $c['FullName'] . ' : ' . $message;
        }
    } else if ($_SESSION['type'] == 'client') {
        if ($c['LastMessageSender'] == 'Client') {
            $message = $c['LastMessage'];
            if (strlen($message) > 100) {
                $message = substr($message, 0, 25) . '...';
            }
            $html .= 'You : ' . $message;
        } else {
            $message = $c['LastMessage'];
            if (strlen($message) > 100) {
                $message = substr($message, 0, 25) . '...';
            }
            $html .= $c['FullName'] . ' : ' . $message;
        }
    }

    $html .= '</small>
        </div>
        <div>
            <span class="badge text-muted fs-small">';
    
    $T = new DateTime($c['LastMessageTime'], new DateTimeZone('Asia/Amman'));
    $html .= $T->format('d-m-Y h:i A');

    $html .= '</span>
        </div>
    </div>';
}

// Now, you can use the $html variable as needed, for example, to echo it or include it in your HTML output.
echo $html;


?>
