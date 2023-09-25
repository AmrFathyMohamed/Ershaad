
<?php
function logout() {

    session_start();
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page after logging out
    header("Location: index.php");
    exit;
}

// Call the logout function when you want to log the user out
// For example, on a "Logout" button click or a logout link
if (isset($_GET['logout'])) {
    logout();
}

?>
