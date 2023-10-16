<?php include("layout.php"); ?>
<?php include("../classes/Database.php"); ?>
<?php include("../classes/TherapistTable.php"); ?>
<?php include("../classes/SessionTable.php"); ?>
<?php
// Check if the 'id' parameter is set in the URL
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $sessions = new SessionTable($database);
    $sessionsData = $sessions->getSessions();
    $sessionscommentData = $sessions->getSessionsComments();

    // You can use $userId in your code as needed
    if (isset($_POST['acceptSession'])) {
        $courseClientId = $_POST['SessionID'];

        if ($sessions->updateSession($courseClientId, 'Accepted','Status')) {

            echo '<script>
        alert("تم الموافقة على الجلسة بنجاح")
        window.location.href = "Sessions.php";
        </script>';
            exit;
        }

    }
    if (isset($_POST['rejectSession'])) {
        $courseClientId = $_POST['SessionID'];


        if ($sessions->updateSession($courseClientId, 'Rejected','Status')) {
            echo '<script>
        alert("تم رفض الجلسة بنجاح")
        window.location.href = "Sessions.php";
        </script>';
            exit;
        }

    }



        // You can use $userId in your code as needed
        if (isset($_POST['acceptcomment'])) {
            $courseClientId = $_POST['SessionID'];
    
            if ($sessions->updateSession($courseClientId, 'Accepted','CStatus')) {
    
                echo '<script>
            alert("تم الموافقة على التعليق بنجاح")
            window.location.href = "Sessions.php";
            </script>';
                exit;
            }
    
        }
        if (isset($_POST['rejectcomment'])) {
            $courseClientId = $_POST['SessionID'];
    
    
            if ($sessions->updateSession($courseClientId, 'Rejected','CStatus')) {
                echo '<script>
            alert("تم رفض التعليق بنجاح")
            window.location.href = "Sessions.php";
            </script>';
                exit;
            }
    
        }
} else {
    // Handle the case when 'id' is not present in the URL
    // You might want to redirect the user or show an error message
    header("Location: index.php");
    exit;
}
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sessions</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Sessions</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">

        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="fs-small">Therapist</th>
                            <th class="fs-small">User</th>
                            <th class="fs-small">Date</th>
                            <th class="fs-small">Time</th>
                            <th class="fs-small">Type</th>
                            <th class="fs-small">Status</th>
                            <th>Opt.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sessionsData as $SD) { ?>
                            <tr>
                                <td>
                                    <?php echo $SD['TherapistName']; ?>
                                </td>
                                <td>
                                    <?php echo $SD['ClientName']; ?>
                                </td>
                                <td class="session-date">
                                    <?php echo $SD['Date']; ?>
                                </td>
                                <td class="session-time">
                                    <?php echo $SD['Time']; ?>
                                </td>

                                <td>
                                    <?php echo $SD['Type']; ?>
                                </td>
                                <td>
                                    <?php if ($SD['Status'] == "Accepted") { ?>
                                        <span class="badge bg-success px-3">Accepted</span>
                                    <?php } else if ($SD['Status'] == "Pending Review") { ?>
                                            <span class="badge bg-warning px-3">Pending Review</span>
                                    <?php } else { ?>
                                            <span class="badge bg-danger px-3">Rejected</span>
                                    <?php } ?>
                                </td>

                                <td>

                                    <?php if ($SD['Status'] == "Pending Review") { ?>
                                        <div class="row">
                                            <div class="col-6 pe-3">
                                                <input id="argent-<?php echo $SD['TherapistID'] ?>" class="check-rej-input"
                                                    type="radio" name="type-<?php echo $SD['TherapistID'] ?>" value="argent" />
                                                <label for="argent-<?php echo $SD['TherapistID']; ?>"
                                                    class="check-img-label w-100">
                                                    <!-- <div class="check-img-content py-1"> -->
                                                    <form method="POST" action="Sessions.php">
                                                        <input type="hidden" name="SessionID"
                                                            value="<?php echo $SD['SessionID']; ?>">
                                                        <button type="submit" name="rejectSession"
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
                                                    <form method="POST" action="Sessions.php">
                                                        <input type="hidden" name="SessionID"
                                                            value="<?php echo $SD['SessionID']; ?>">
                                                        <button type="submit" name="acceptSession"
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
                                    <?php } ?>
                                    <!-- Add an "Edit" button with a data-id attribute to store the session ID -->
                                    <button class="btn btn-primary edit-session"
                                        data-id="<?= $SD['SessionID']; ?>">Edit</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>


    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Sessions Comments</h3>

            </div>
            
        </div>
    </div>
    <section class="section">

        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="fs-small">Therapist</th>
                            <th class="fs-small">Client</th>
                            <th class="fs-small">Comment</th>
                            <th class="fs-small">Rate</th>
                            <th class="fs-small">Status</th>
                            <th>Opt.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sessionscommentData as $SD) { ?>
                            <tr>
                                <td>
                                    <?php echo $SD['TherapistName']; ?>
                                </td>
                                <td>
                                    <?php echo $SD['ClientName']; ?>
                                </td>
                                <td>
                                    <?php echo $SD['UserOpinion']; ?>
                                </td>
                                <td>
                                    <?php echo $SD['UserRate']; ?>
                                </td>
                                <td>
                                    <?php if ($SD['CStatus'] == "Accepted") { ?>
                                        <span class="badge bg-success px-3">Accepted</span>
                                    <?php } else if ($SD['CStatus'] == "Pending Review") { ?>
                                            <span class="badge bg-warning px-3">Pending Review</span>
                                    <?php } else { ?>
                                            <span class="badge bg-danger px-3">Rejected</span>
                                    <?php } ?>
                                </td>

                                <td>

                                    <?php if ($SD['CStatus'] == "Pending Review") { ?>
                                        <div class="row">
                                            <div class="col-6 pe-3">
                                                <input id="argent-<?php echo $SD['TherapistID'] ?>" class="check-rej-input"
                                                    type="radio" name="type-<?php echo $SD['TherapistID'] ?>" value="argent" />
                                                <label for="argent-<?php echo $SD['TherapistID']; ?>"
                                                    class="check-img-label w-100">
                                                    <!-- <div class="check-img-content py-1"> -->
                                                    <form method="POST" action="Sessions.php">
                                                        <input type="hidden" name="SessionID"
                                                            value="<?php echo $SD['SessionID']; ?>">
                                                        <button type="submit" name="rejectcomment"
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
                                                    <form method="POST" action="Sessions.php">
                                                        <input type="hidden" name="SessionID"
                                                            value="<?php echo $SD['SessionID']; ?>">
                                                        <button type="submit" name="acceptcomment"
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
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">تغيير الحالة</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row my-5">
                    <div class="col-6 pe-3">
                        <input id="argent" class="check-rej-input" type="radio" name="type" value="argent" />
                        <label for="argent" class="check-img-label w-100">
                            <div class="check-img-content pt-3 pb-2">
                                <h5> <i class="bi bi-x-octagon me-1 fs-4"></i> رفض</h5>
                            </div>
                        </label>
                    </div>
                    <div class="col-6 ps-3">
                        <input id="normal" class="check-acc-input" type="radio" name="type" value="normal" />
                        <label for="normal" class="check-img-label w-100">
                            <div class="check-img-content pt-3 pb-2">
                                <h5> <i class="bi bi-check-circle-fill me-1 fs-4"></i> قبول </h5>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">الغاء</span>
                </button>
                <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">حفظ</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editSessionModal" tabindex="-1" role="dialog" aria-labelledby="editSessionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSessionModalLabel">Edit Session Date and Time</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSessionForm" action="update_session.php" method="POST" onsubmit="return validateForm()">
                    <input type="hidden" id="editSessionId" name="session_id" value="">
                    <div class="form-group">
                        <label for="sessionDate">Date</label>
                        <input type="date" class="form-control" id="sessionDate" name="session_date" required>
                    </div>
                    <div class="form-group">
                        <label for="sessionTime">Time</label>
                        <input type="time" class="form-control" id="sessionTime" name="session_time" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="return validateForm()">Save
                            Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>
<script>
    $(document).ready(function () {
        $('#table1').DataTable({
            dom: 'Bfrtip', // Add buttons to the DataTable
            "buttons": [
                'pdf', // Add PDF export button
                'csv'  // Add CSV export button
            ], "pageLength": 10
        });

    });
    // Handle click on "Edit" button
    $('.edit-session').click(function () {
            var sessionId = $(this).data('id');
            console.log('sessionId' + sessionId);
            var sessionDate = $(this).closest('tr').find('.session-date').text().trim();
            var sessionTime = $(this).closest('tr').find('.session-time').text().trim();
            console.log('sessionDate' + sessionDate);
            console.log('sessionTime' + sessionTime);

            $('#editSessionId').val(sessionId);
            $('#sessionDate').val(sessionDate);
            $('#sessionTime').val(sessionTime);
            console.log(sessionId +
                sessionDate +
                sessionTime);
            $('#editSessionModal').modal('show');
        });
    function validateForm() {
        // Get the values from your form elements
        var sessionId = $('#editSessionId').val();
        var sessionDate = $('#sessionDate').val();
        var sessionTime = $('#sessionTime').val();

        // Check if the values are empty or not
        if (sessionId === '' || sessionDate === '' || sessionTime === '') {
            alert("Please fill in all fields.");
            return false; // Prevent the form from submitting
        }

        // If all fields are filled, proceed with the form submission
        return true;
    }
</script>

</body>

</html>