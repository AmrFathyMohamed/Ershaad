<?php include("layout.php"); ?>
<?php include("../classes/Database.php"); ?>
<?php include("../classes/TherapistTable.php"); ?>
<?php include("../classes/SpecialtiesTable.php"); ?>
<?php include("../classes/AppointmentTable.php"); ?>
<?php include("../classes/DocumentTable.php"); ?>



<?php
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $therapists = new TherapistTable($database);
    $therapistsData = $therapists->getTherapists();
    $SpecialtiesObject = new SpecialtiesTable($database);
    $specialties = $SpecialtiesObject->getDataByTableName();
} else {
    header("Location: index.php");
    exit;
}
$appointmentTable = new AppointmentTable($database);
$documentsTable = new DocumentTable($database);

if (isset($_POST['addAppointment'])) {
    $dateS = $_POST['dateS'];
    $dateE = $_POST['dateE'];
    $timeS = $_POST['timeS'];
    $timeE = $_POST['timeE'];
    $type = $_POST['type'];
    $tid = $_POST['therapistId'];
    if ($appointmentTable->insertAppointment($dateS,$dateE, $timeS,  $timeE, $type, $tid)) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Therapist.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        
        </script>';
    }
}

if (isset($_POST['deleteAppointment'])) {
    $appointmentId = $_POST['appointmentId'];
    if ($appointmentTable->deleteAppointment($appointmentId)) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Therapist.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['therapistId']) && isset($_FILES['documentFile'])) {
    $therapistID = $_POST['therapistId'];
    $documentName = $_POST['documentName'];
    $documentOrganization = $_POST['documentOrganization'];
    $documentDate = $_POST['documentDate'];
    $documentType = $_POST['documentType'];
    $targetDir = "document_uploads/";
    $documentFile = $_FILES['documentFile']['name'];
    $documentFileTmp = $_FILES['documentFile']['tmp_name'];

    if (empty($documentFile)) {
        $errorMessage = "Please select a document file.";
    } else {
        $uniqueFilename = uniqid() . '_' . $documentFile;

        if (move_uploaded_file($documentFileTmp, $targetDir . $uniqueFilename)) {
            // Insert the document into the database
            if ($documentsTable->insertDocument($therapistID, $documentName, $documentOrganization, $documentDate, $documentType, 'Ershad-admin/' . $targetDir . $uniqueFilename)) {
                echo '<script>
        alert("تم بنجاح")
        window.location.href = "Therapist.php";
        </script>';
                exit;
            } else {
                echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
            }
        } else {

            echo '<script>
            alert("حدث خطأ")
            location.reload();
            </script>';
        }
    }
} else {
    $errorMessage = "Failed to add document.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['documentId'])) {
    $documentId = $_POST['documentId'];
    // Delete the document from the database
    if ($documentsTable->deleteDocument($documentId)) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Therapist.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
} else {
    $errorMessage = "Failed to delete document.";
}


?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Therapists</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Therapists</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="addTherapist.php" class="btn icon icon-left btn-primary"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-edit">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg> New </a>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="fs-small">Name</th>
                            <th class="fs-small">Specialty</th>
                            <th class="fs-small">Price/hour</th>
                            <th class="fs-small">Rating</th>
                            <th class="fs-small">City</th>
                            <th class="fs-small">Gender</th>
                            <th class="fs-small">Phone</th>
                            <th class="fs-small">Credentials</th>
                            <th class="fs-small">Age</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($therapistsData as $therapist) { ?>
                            <tr>
                                <td>
                                    <?= $therapist['FullName']; ?>
                                </td>
                                <td class="fs-small">
                                    <?= $therapist['Specialization']; ?>
                                </td>
                                <td>
                                    Price:
                                    <?= $therapist['Price']; ?>
                                    Percentage:
                                    <?= $therapist['Percentage']; ?>
                                    Price After Percentage:
                                    <?= $therapist['PriceAfterPercentage']; ?>
                                </td>
                                <td>
                                    <?= $therapist['Rating']; ?>
                                </td>
                                <td>
                                    <?= $therapist['City']; ?>
                                </td>
                                <td>
                                    <?= $therapist['Gender']; ?>
                                </td>
                                <td>
                                    <?= $therapist['Phone']; ?>
                                </td>

                                <td>
                                    <?= 'Username: ' . $therapist['Username']; ?>
                                    <?= 'Email: ' . $therapist['Email']; ?>
                                </td>
                                <td>
                                    <?= $therapist['Age']; ?>
                                </td>
                                <td>
                                    <div class="dropdown right">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Options
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item pointer"
                                                href="editTherapist.php?TherapistID=<?= $therapist['TherapistID']; ?>">Edit
                                                Data</a>
                                            <!-- <a class="dropdown-item pointer"
                                                href="viewTherapist.php?TherapistID=d $therapist['TherapistID']; ?>">Details</a> -->
                                            <a class="dropdown-item pointer" href="javascript:void(0);"
                                                onclick="openDocumentsModal(<?= $therapist['TherapistID']; ?>, '<?= $therapist['FullName']; ?>')">Manage
                                                Documents</a>


                                            <a class="dropdown-item pointer" href="javascript:void(0);"
                                                onclick="openAppointmentsModal(<?= $therapist['TherapistID']; ?>, '<?= $therapist['FullName']; ?>')">Manage
                                                Appointments</a>

                                            <a class="dropdown-item pointer delete-therapist" href="#"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                data-id="<?= $therapist['TherapistID']; ?>"
                                                data-fullname="<?= $therapist['FullName']; ?>"
                                                onclick="confirmDelete(<?= $therapist['TherapistID']; ?>)">Delete</a>
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
</div>

<!--Danger theme Modal -->
<div class="modal fade text-left" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white" id="myModalLabel120">Delete</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Are you sure you want to delete this therapist?</h4>
                <p class="text-center" id="therapistFullName"></p>
                <div class="text-center">
                    <button class="btn btn-danger w-35 mt-5" id="confirmDelete">Delete</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Cancel</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="appointmentsModal" tabindex="-1" role="dialog" aria-labelledby="appointmentsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointmentsModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Appointments List</h3>
                <ul id="appointmentsList" class="ps-0 row" style="height: 40vh; overflow-y:auto;">
                </ul>
                <form id="addAppointmentForm" method="POST" action="Therapist.php">
                    <div class="form-group">
                        <label for="date">Start Date:</label>
                        <input type="date" class="form-control" id="dateS" name="dateS" required>
                    </div>
                    <div class="form-group">
                        <label for="date">End Date:</label>
                        <input type="date" class="form-control" id="dateE" name="dateE" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Start Time:</label>
                        <input type="time" class="form-control" id="timeS" name="timeS" required>
                    </div>
                    <div class="form-group">
                        <label for="time">End Time:</label>
                        <input type="time" class="form-control" id="timeE" name="timeE" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="Urgent Consultation">Urgent Consultation</option>
                            <option value="Work">Work</option>
                        </select>
                    </div>

                    <input type="hidden" id="therapistIdInput" name="therapistId" value="">
                    <button type="submit" class="btn btn-primary" name="addAppointment">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add this section after the "Manage Appointments" section in your code -->

<div class="modal fade" id="documentsModal" tabindex="-1" role="dialog" aria-labelledby="documentsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentsModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Documents for <span id="therapistFullNameDoc"></span></h3>
                <ul id="documentsList">
                </ul>
                <form id="addDocumentForm" method="POST" action="Therapist.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="documentName">Document Name:</label>
                        <input type="text" class="form-control" id="documentName" name="documentName" required>
                    </div>
                    <div class="form-group">
                        <label for="documentOrganization">Organization:</label>
                        <input type="text" class="form-control" id="documentOrganization" name="documentOrganization"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="documentDate">Document Date:</label>
                        <input type="date" class="form-control" id="documentDate" name="documentDate" required>
                    </div>
                    <div class="form-group">
                        <label for="documentType">Document Type:</label>
                        <select class="form-control" id="documentType" name="documentType" required>
                            <option value="Other">Other</option>
                            <option value="Certification">Certification</option>
                            <option value="Experience">Experience</option>
                            <option value="Education">Education</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="documentFile">Upload Document:</label>
                        <input type="file" class="form-control-file" id="documentFile" name="documentFile" required>
                    </div>
                    <input type="hidden" id="therapistIdInputDoc" name="therapistId" value="">
                    <button type="submit" class="btn btn-primary" name="addDocument">Upload Document</button>
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
            ],
        });
    });

    $(document).ready(function () {
        $(document).on('click', '.delete-therapist', function () {
            var therapistId = $(this).data('id');
            var therapistFullName = $(this).data('fullname');
            $('#therapistFullName').text('Therapist: ' + therapistFullName);
            $('#confirmDelete').off('click').on('click', function () {
                $.ajax({
                    url: 'deletetherapist.php',
                    method: 'GET',
                    data: { TherapistID: therapistId },
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            alert('Therapist deleted successfully!');
                            location.reload();
                        } else {
                            alert('Failed to delete therapist: ' + response.message);
                        }
                    },
                    error: function () {
                        alert('Failed to delete therapist. Please try again.');
                    }
                });
            });
        });
    });
    function openAppointmentsModal(therapistID, therapistFullName) {
        $('#appointmentsModalLabel').text('Appointments for ' + therapistFullName);
        $('#therapistIdInput').val(therapistID);
        $('#appointmentsModal').modal('show');
        $.ajax({
            url: 'get_appointments.php',
            method: 'POST',
            data: { therapistID: therapistID },
            dataType: 'json',
            success: function (response) {
                $('#appointmentsList').empty();
                if (response.length > 0) {
                    for (var i = 0; i < response.length; i++) {
                        var appointment = response[i];
                        var listItem = $('<li class="d-inline-block col-6 mb-1 px-3 py-2 border d-flex justify-content-between align-items-center rounded ">').html('<span class="badge bg-primary">'+appointment['Date'] + '</span><span class="badge bg-primary">' + appointment['Time'] + '</span><span class="badge bg-primary">' + appointment['Type'] + '</span>');
                        var deleteForm = $('<form class="d-inline">').attr('method', 'POST').attr('action', 'Therapist.php');
                        deleteForm.append($('<input>').attr('type', 'hidden').attr('name', 'appointmentId').val(appointment['AppointmentID']));
                        deleteForm.append($('<button class="btn-sm">').attr('type', 'submit').attr('name', 'deleteAppointment').addClass('btn btn-danger px-2 py-1 btn-sm').html('<i class="bi bi-trash"></i>'));
                        listItem.append(deleteForm);
                        $('#appointmentsList').append(listItem);
                    }
                } else {
                    $('#appointmentsList').append('<li>No appointments found.</li>');
                }
            },
            error: function (response) {
                alert('Failed to fetch appointments. Please try again.');
            }
        });
    }
    function openDocumentsModal(therapistID, therapistFullName) {
        $('#documentsModalLabel').text('Documents for ' + therapistFullName);
        $('#therapistIdInputDoc').val(therapistID);
        $('#therapistFullNameDoc').text(therapistFullName);
        $('#documentsModal').modal('show');
        $.ajax({
            url: 'get_documents.php', // Replace with the actual URL to fetch documents
            method: 'POST',
            data: { therapistID: therapistID },
            dataType: 'json',
            success: function (response) {
                $('#documentsList').empty();
                if (response.length > 0) {
                    for (var i = 0; i < response.length; i++) {
                        var document = response[i];
                        var listItem = $('<li class="d-inline-block w-100 px-3 py-2 border d-flex justify-content-between align-items-center rounded">').html('<div><p class="fw-bold mb-1">' + document['DocumentName'] + '</p>' + '<span>' + document['DocumentDate'] + '</span>' + '</div> ' + '<span class="badge bg-info">' + document['DocumentType'] + '</span>');
                        var deleteForm = $('<form class="d-inline">').attr('method', 'POST').attr('action', 'Therapist.php');
                        deleteForm.append($('<input>').attr('type', 'hidden').attr('name', 'documentId').val(document['DocumentID']));
                        deleteForm.append($('<button class="btn-sm">').attr('type', 'submit').attr('name', 'deleteDocument').addClass('btn px-2 py-1 btn-danger btn-sm').html('<i class="bi bi-trash"></i>'));
                        listItem.append(deleteForm);
                        $('#documentsList').append(listItem);
                    }
                } else {
                    $('#documentsList').append('<li>No documents found.</li>');
                }
            },
            error: function (response) {
                alert('Failed to fetch documents. Please try again.' + response.responseText);
            }
        });
    }
</script>


</body>

</html>