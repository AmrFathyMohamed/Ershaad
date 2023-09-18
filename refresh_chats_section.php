<?php include("classes/Database.php"); ?>
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
    header("Location: index.php");
    exit;
}

// Fetch the latest chat data (modify this query according to your database structure)


// Generate the HTML for chat tickets
$html = '';

foreach ($chatsData as $c) {
    $html .= '<div class="ticket w-95 mx-auto ps-3 py-3 mt-3 d-flex justify-content-between align-items-center" data-client-id="' . $c['ClientID'] . '" data-therapist-id="' . $c['TherapistID'] . '" data-client-name="' . $c['FullName'] . '">';
    $html .= '<div class="content">';
    $html .= '<h6 class="mb-0">' . $c['FullName'] . '</h6>';
    $html .= '<small class="mb-0 last-message">';

    if ($_SESSION['type'] == 'therapist') {
        if ($c['LastMessageSender'] == 'Therapist') {
            $message = $c['LastMessage'];
            if (strlen($message) > 100) {
                $message = substr($message, 0, 25) . '...';
            }
            echo 'You : ' . $message;
        } else {
            $message = $c['LastMessage'];
            if (strlen($message) > 100) {
                $message = substr($message, 0, 25) . '...';
            }
            echo $c['FullName'] . ' : ' . $message;
        }
    } else if ($_SESSION['type'] == 'client') {
        if ($c['LastMessageSender'] == 'Client') {
            $message = $c['LastMessage'];
            if (strlen($message) > 100) {
                $message = substr($message, 0, 25) . '...';
            }
            echo 'You : ' . $message;
        } else {
            $message = $c['LastMessage'];
            if (strlen($message) > 100) {
                $message = substr($message, 0, 25) . '...';
            }
            echo $c['FullName'] . ' : ' . $message;
        }
    }
    if ($c['LastMessageSender'] == 'Therapist') {
        $message = $c['LastMessage'];
        if (strlen($message) > 100) {
            $message = substr($message, 0, 25) . '...';
        }
        echo 'You : ' . $message;
    } else {
        $message = $c['LastMessage'];
        if (strlen($message) > 100) {
            $message = substr($message, 0, 25) . '...';
        }
        echo $c['FullName'] . ' : ' . $message;
    }

    $html .= '</small>';
    $html .= '</div>';
    $html .= '<div>';
    $html .= '<span class="badge text-muted fs-small">' . $c['LastMessageTime'] . '</span>';
    $html .= '</div>';
    $html .= '</div>';
}

// Return the generated HTML as the response
echo $html;
?>
