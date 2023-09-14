<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class
    require_once 'classes/Database.php';
    require_once 'classes/ClientTable.php';
    $db = new Database();
    $client = new ClientTable($db);
    $field = $_POST['field'];
    $value = $_POST['value'];
    $stmt = $db->executeQuery("SELECT COUNT(*) FROM users WHERE $field = '$value'");
    $count = count($stmt->fetch_all(MYSQLI_ASSOC));
  
    if ($count > 0) {
      echo 'taken';
    } else {
      echo 'available';
    }
    
}
?>