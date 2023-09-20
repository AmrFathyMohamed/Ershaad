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
    // Review
    //Accepted
    $courseTableAccepted = $courseClientTable->getAllCourseClients('Accepted');
    $courseTablePending = $courseClientTable->getAllCourseClients('Pending Review');
    $courseTableRejected = $courseClientTable->getAllCourseClients('Rejected');


    // Fetch course requests from clients with 'Pending' status
    // $courseRequests = $courseClientTable->getCourseRequestsByStatus('Pending');

    // // Handle changing the status of a course request to 'Accepted'
    if (isset($_POST['acceptCourse'])) {
        $courseClientId = $_POST['courseClientId'];
        

        if ($courseClientTable->updateCourseClient($courseClientId, 'Accepted')) {
            // Status changed to 'Accepted', calculate session details and cost
            $courseClient = $courseClientTable->getCourseClientById($courseClientId);
            $courseId = $courseClient['CourseID'];
            $clientId = $_POST['ClientID'];
            $therapistId = $_POST['TherapistID'];
        
            // Calculate session details
            $sessions = $course['Sessions'];
            $startDate = date('Y-m-d');
            $endDate = date('Y-m-d', strtotime($startDate . ' + ' . ($sessions - 1) . ' days'));
        
            // Calculate cost per session
            //$sessionCost = $course['Price'] / $sessions;
        
            // Insert sessions into the 'sessions' table
            for ($i = 0; $i < $sessions; $i++) {
                $sessionDate = date('Y-m-d', strtotime($startDate . ' + ' . $i . ' days'));
                $sessionTime = '12:00:00'; // Change this to the desired session time
                $sessionType = 'Regular'; // Change this to the desired session type
                $sessionStatus = 'Accepted'; // Change this to the initial session status
        
                // Insert the session into the 'sessions' table
                $sessionTable->insertSession($clientId, $therapistId, $sessionDate, $sessionTime, $sessionType, $sessionStatus);
        
                // Calculate the next session date (1 week interval)
                $startDate = date('Y-m-d', strtotime($sessionDate . ' + 1 week'));
            }
        
            // Display a success message or redirect as needed
        }
        
    }
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
        <h3>Courses Requests</h3>
    </div>
    <section class="section">
        <!-- Display the list of course requests from clients with 'Pending' status -->
        <div class="card">
            <div class="card-body">
                <h4 class="text-warning">Pending requests</h4>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Client</th>
                            <th>Therapist</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courseTablePending as $request) {
                            $courseClientId = $request['id'];
                            ?>
                            <tr>
                            <td>
                                    <?php echo $request['Title']; ?>
                                </td>
                                <td>
                                    <?php echo $request['CName']; ?>
                                </td>
                                <td>
                                    <?php echo $request['TName']; ?>
                                </td>
                                <td>
                                <span class="badge bg-warning px-3"><?php echo $request['Status']; ?></span>
                                    
                                </td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="courseClientId" value="<?php echo $courseClientId; ?>">
                                        <input type="hidden" name="ClientID" value="<?php echo $request['ClientID']; ?>">
                                        <input type="hidden" name="TherapistID" value="<?php echo $request['TherapistID']; ?>">
                                        <button type="submit" class="btn btn-success" name="acceptCourse">Accept</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4 class="text-success">Accepted requests</h4>
                <table class='table table-striped' id="table3">
                <thead>
                        <tr>
                            <th>Course</th>
                            <th>Client</th>
                            <th>Therapist</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courseTableAccepted as $request) {
                            $courseClientId = $request['id'];
                            ?>
                            <tr>
                            <td>
                                    <?php echo $request['Title']; ?>
                                </td>
                                <td>
                                    <?php echo $request['CName']; ?>
                                </td>
                                <td>
                                    <?php echo $request['TName']; ?>
                                </td>
                                <td>
                                <span class="badge bg-success px-3">Accepted</span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4 class="text-danger">Rejected requests</h4>
                <table class='table table-striped' id="table2">
                    <thead>
                        <tr>
                            <th class="fs-small">Course</th>
                            <th class="fs-small">User</th>
                            <th class="fs-small">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courseTableRejected as $request) {
                            $courseClientId = $request['id'];
                            ?>
                            <tr>
                            <td>
                                    <?php echo $request['Title']; ?>
                                </td>
                                <td>
                                    <?php echo $request['CName']; ?>
                                </td>
                                <td>
                                    <?php echo $request['TName']; ?>
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
        $('#table2').DataTable({
            dom: 'Bfrtip', // Add buttons to the DataTable
            "buttons": [
                'pdf', // Add PDF export button
                'csv'  // Add CSV export button
            ], "pageLength": 7
        });
        $('#table3').DataTable({
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