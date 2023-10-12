<?php include("layout.php"); ?>
<?php include("../classes/Database.php"); ?>
<?php include("../classes/TherapistTable.php"); ?>
<?php include("../classes/SpecialtiesTable.php"); ?>
<?php
// Check if the 'user_id' parameter is set in the session
if (isset($_SESSION['user_id'])) {
    // Get the 'user_id' value from the session
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $therapists = new TherapistTable($database);
    $therapistsData = $therapists->getTherapists();
    $SpecialtiesObject = new SpecialtiesTable($database);
    $specialties = $SpecialtiesObject->getDataByTableName();
    // You can use $userId in your code as needed
} else {
    // Handle the case when 'user_id' is not present in the session
    // You might want to redirect the user or show an error message
    header("Location: index.php");
    exit;
}

// Handle Add Specialty Form Submission
if (isset($_POST['addSpecialty'])) {
    $specialtyName = $_POST['Specialty'];
    $inserted = $SpecialtiesObject->insertSpecialty($specialtyName);

    if ($inserted) {
        // Specialty added successfully, you can show a success message or redirect
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Specialties.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}



if (isset($_POST['saveSpecialty'])) {
    $specialtyId = $_POST['SpecialtyID'];
    $specialtyName = $_POST['Specialty'];
    $updated = $SpecialtiesObject->updateSpecialty($specialtyId, $specialtyName);

    if ($updated) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Specialties.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $specialtyIdToDelete = $_GET['id'];
    $deleted = $SpecialtiesObject->deleteSpecialty($specialtyIdToDelete);

    if ($deleted) {
        echo '<script>
        alert("تم بنجاح")
        window.location.href = "Specialties.php";
        </script>';
        exit;
    } else {
        echo '<script>
        alert("حدث خطأ")
        location.reload();
        </script>';
    }
}
?>
<!-- Rest of your HTML and PHP code remains the same -->

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3> Specialties</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Specialties</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="text- my-3">

            <a href="#" data-bs-toggle="modal" data-bs-target="#addModal"
                class="btn icon px-5 icon-left btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg> Add New </a>
        </div>
        <div class="card">
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="fs-small">Specialty</th>
                            <th>Opt.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($specialties as $therapist) { ?>
                            <tr>
                                <td>
                                    <?php echo $therapist['Specialty']; ?>
                                </td>
                                <td>
                                    <div class="dropdown right">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Options
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item pointer edit-specialty" data-bs-toggle="modal"
                                                data-bs-target="#editModal"
                                                data-id="<?php echo $therapist['SpecialtyID']; ?>"
                                                data-name="<?php echo $therapist['Specialty']; ?>">تعديل</a>

                                            <a href="?action=delete&id=<?php echo $therapist['SpecialtyID']; ?>"
                                                class="dropdown-item pointer delete-specialty"
                                                data-specialty-id="<?php echo $therapist['SpecialtyID']; ?>">Delete</a>

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

</div>
</div>


<!-- Add Specialty Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Specialty</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="Specialties.php">
                    <div class="mb-3">
                        <label for="Specialty" class="form-label">Specialty</label>
                        <input type="text" class="form-control" id="Specialty" name="Specialty" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="addSpecialty">Add Specialty</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Specialty Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Specialty</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="Specialties.php">
                    <input type="hidden" name="SpecialtyID" value="">
                    <div class="mb-3">
                        <label for="Specialty" class="form-label">Specialty</label>
                        <input type="text" class="form-control" id="Specialty" name="Specialty" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="saveSpecialty">Save Specialty</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Specialty Modal -->
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
                <h4 class="text-center">Confirm to delete this</h4>
                <div class="text-center">
                    <a href="?action=delete&id=<?php echo $specialty['SpecialtyID']; ?>"
                        class="btn btn-danger w-35 mt-5">Delete</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
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
    $('.edit-specialty').click(function () {
            var specialtyId = $(this).data('id');
            var specialtyName = $(this).data('name');

            // Set the specialty ID and name in the "Edit Specialty" modal
            $('#editModal input[name="SpecialtyID"]').val(specialtyId);
            $('#editModal input[name="Specialty"]').val(specialtyName);
        });
        $('.delete-specialty').click(function () {
            var specialtyId = $(this).data('specialty-id');
            var confirmationLink = '?action=delete&id=' + specialtyId;
            $('#deleteModal .btn-danger').attr('href', confirmationLink);
        });

</script>
</body>

</html>