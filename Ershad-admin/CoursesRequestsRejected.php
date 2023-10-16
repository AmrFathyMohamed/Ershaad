<?php
// // Include necessary files and classes
// include("layout.php");
// include("../classes/Database.php");
// include("../classes/ClientTable.php");
// if (isset($_SESSION['user_id'])) {
//     $adminId = $_SESSION['user_id'];
//     $database = new Database();
//     $clientsTable = new ClientTable($database);
//     $clientData = $clientsTable->getClientsWithTherapistNames();
// } else {
//     // Redirect or display an error message for unauthorized access
//     header("Location: index.php");
//     exit;
// }
?>
<?php
// Include necessary files and initialize database connection and session
include("layout.php");
include("../classes/Database.php");
include("../classes/ClientTable.php");
include("../classes/CourseClientTable.php");
include("../classes/CourseTable.php");
include("../classes/SessionTable.php");



// Check if the user is logged in as an admin
if (isset($_SESSION['user_id'])) {
    $adminId = $_SESSION['user_id'];
    $database = new Database();
    $clientTable = new ClientTable($database);
    $sessionTable = new SessionTable($database);
    $courseClientTable = new CourseClientTable($database);
    $courseTable = new CourseTable($database);

    // Review
    //Accepted
    $courseTableRejected = $courseClientTable->getAllCourseClients('Rejected');

} else {
    // Redirect or display an error message for unauthorized access
    header("Location: index.php");
    exit;
}
?>

<!-- HTML structure for the page goes here -->
<div class="main-content container-fluid">
    <div class="page-title">
        <!-- Add page title content here -->
        <h3>Rejected Courses Requests</h3>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4 class="text-danger">Rejected requests</h4>
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="fs-small">Course</th>
                            <th class="fs-small">User</th>
                            <th class="fs-small">Status</th>
                            <th class="fs-small">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courseTableRejected as $request) {
                            $courseClientId = $request['id'];
                            ?>
                            <tr>
                                <td>
                                    <?php echo $request['CourseName']; ?>
                                </td>
                                <td>
                                    <?php echo $request['ClientName']; ?>
                                </td>

                                <td>
                                    <?php echo $request['TherapistName']; ?>
                                </td>
                                <td>
                                    <span class="badge bg-danger px-3">Rejected</span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    
</div>

<?php include("footer.php"); ?>

<script>
    $(document).ready(function () {
        
        $('#table1').DataTable({
            dom: 'Bfrtip', // Add buttons to the DataTable
            "buttons": [
                'pdf', // Add PDF export button
                'csv'  // Add CSV export button
            ], "pageLength": 7
        });
        
    });
</script>
</body>

</html>