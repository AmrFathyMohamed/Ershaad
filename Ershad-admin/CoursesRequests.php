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
    $courseTableAccepted = $courseClientTable->getAllCourseClients('Accepted');
    $courseTablePending = $courseClientTable->getAllCourseClients('Pending Review');
    $courseTableRejected = $courseClientTable->getAllCourseClients('Rejected');


    // Fetch course requests from clients with 'Pending' status
    // $courseRequests = $courseClientTable->getCourseRequestsByStatus('Pending');

    // // Handle changing the status of a course request to 'Accepted'
    if (isset($_POST['acceptCourse'])) {
        $courseClientId = $_POST['courseClientId'];
        if ($courseClientTable->updateCourseClient($courseClientId, 'Accepted')) {

            $courseClient = $courseClientTable->getCourseClientById($courseClientId);
            $courseId = $_POST['CourseID'];
            $course = $courseTable->getCourseById($courseId);
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
    if (isset($_POST['rejectCourse'])) {
        $courseClientId = $_POST['courseClientId'];


        if ($courseClientTable->updateCourseClient($courseClientId, 'Rejected')) {
            echo '<script>window.location.href = "CoursesRequests.php";</script>';
            exit;
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
                                    <?php echo $request['CourseName']; ?>
                                </td>
                                <td>
                                    <?php echo $request['ClientName']; ?>
                                </td>

                                <td>
                                    <?php echo $request['TherapistName']; ?>
                                </td>
                                <td>
                                    <span class="badge bg-warning px-3">
                                        <?php echo $request['Status']; ?>
                                    </span>

                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-6 pe-3">
                                            <input id="argent-<?php echo $SD['TherapistID'] ?>" class="check-rej-input"
                                                type="radio" name="type-<?php echo $SD['TherapistID'] ?>" value="argent" />
                                            <label for="argent-<?php echo $SD['TherapistID']; ?>"
                                                class="check-img-label w-100">
                                                <!-- <div class="check-img-content py-1"> -->
                                                <form method="POST" action="CoursesRequests.php">
                                                    <input type="hidden" name="courseClientId"
                                                        value="<?php echo $courseClientId; ?>">
                                                    <input type="hidden" name="CourseID"
                                                        value="<?php echo $request['CourseID']; ?>">
                                                    <input type="hidden" name="ClientID"
                                                        value="<?php echo $request['ClientID']; ?>">
                                                    <input type="hidden" name="TherapistID"
                                                        value="<?php echo $request['TherapistID']; ?>">
                                                    <button type="submit" name="rejectCourse"
                                                        class="check-img-content py-1">
                                                        <h6 class="mb-0">
                                                            <i class="bi bi-x-octagon me-1 fs-5"></i> رفض
                                                        </h6>
                                                    </button>
                                                </form>
                                                <!-- </div> -->
                                            </label>
                                        </div>
                                        <div class="col-6 ps-3">
                                            <input id="normal-<?php echo $SD['TherapistID'] ?>" class="check-acc-input"
                                                type="radio" name="type-<?php echo $SD['TherapistID'] ?>" value="normal" />
                                            <label for="normal-<?php echo $SD['TherapistID'] ?>"
                                                class="check-img-label w-100">
                                                <!-- <div class="check-img-content py-1"> -->
                                                <form method="POST" action="CoursesRequests.php">
                                                    <input type="hidden" name="courseClientId"
                                                        value="<?php echo $courseClientId; ?>">
                                                    <input type="hidden" name="CourseID"
                                                        value="<?php echo $request['CourseID']; ?>">
                                                    <input type="hidden" name="ClientID"
                                                        value="<?php echo $request['ClientID']; ?>">
                                                    <input type="hidden" name="TherapistID"
                                                        value="<?php echo $request['TherapistID']; ?>">
                                                    <button type="submit" name="acceptCourse"
                                                        class="check-img-content py-1">
                                                        <h6 class="mb-0"> <i class="bi bi-check-circle-fill me-1 fs-5"></i>
                                                            قبول
                                                        </h6>
                                                    </button>
                                                </form>
                                                <!-- </div> -->
                                            </label>
                                        </div>
                                    </div>
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
                <table class='table table-striped' id="table2">
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
                                    <?php echo $request['CourseName']; ?>
                                </td>
                                <td>
                                    <?php echo $request['ClientName']; ?>
                                </td>

                                <td>
                                    <?php echo $request['TherapistName']; ?>
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
                <table class='table table-striped' id="table3">
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