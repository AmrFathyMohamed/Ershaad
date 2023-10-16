<?php
include("../classes/Database.php");
include("../classes/AdminTable.php");

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $adminId = $_GET['id'];
    $database = new Database();
    $Admins = new AdminTable($database);

    // Delete the admin by ID
    if ($Admins->deleteAdmin($adminId)) {
        // Deletion successful, you can redirect or show a success message
        echo '<script>
        alert("تم حذف عضو بالادارة بنجاح")
        window.location.href = "Admins.php";
        </script>';
        exit;
    } else {
        // Deletion failed, handle the error
        echo json_encode(array('success' => false, 'message' => 'Failed to delete admin.'));
        exit;
    }
} else {
    // Handle the case when 'id' is not present in the URL
    echo json_encode(array('success' => false, 'message' => 'Admin ID not provided.'));
    exit;
}
?>