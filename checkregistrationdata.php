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
    $stmt = $db->executeQuery("SELECT COUNT(Username) as C FROM clients WHERE $field = '$value'");
    $count = $stmt->fetch_all(MYSQLI_ASSOC);
    $C =  $count[0]['C'];
    if ($C > 0) {
      echo 'taken';
    } else {
      echo 'available';
    }
    
}
?>