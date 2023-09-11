
<?php

function checkSession() {
    // Start or resume the session
    
    session_start();
    // Check if the 'user_id' session variable is not set or if any required session data is missing
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['username']) || !isset($_SESSION['fullname']) || !isset($_SESSION['type'])) {
        // Redirect to login.php        
        echo '<script>window.location.href = "login.php";</script>';
        exit;
        
    }
    if ($_SESSION['type'] !== 'admin') {
        // Redirect to login.php
        echo '<script>window.location.href = "login.php";</script>';
        exit;
    }
}

?>
