<?php include("layout.php"); ?>
<?php include("../classes/Database.php"); ?>
<?php include("../classes/TherapistTable.php"); ?>
<?php include("../classes/SpecialtiesTable.php"); ?>
<?php
// Check if the 'id' parameter is set in the URL
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $therapists = new TherapistTable($database);
    $therapistsData = $therapists->getTherapists();
    $SpecialtiesObject = new SpecialtiesTable($database);
    $specialties = $SpecialtiesObject->getDataByTableName();
    // You can use $userId in your code as needed
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
                <a href="addTherapist.php" class="btn icon icon-left btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
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
                            <!-- <th class="fs-small">Percentage</th>
                            <th class="fs-small">PriceAfterPerc.</th> -->
                            <th class="fs-small">Rating</th>
                            <th class="fs-small">City</th>
                            <!-- <th>Bio</th> -->
                            <th class="fs-small">Gender</th>
                            <th class="fs-small">Phone</th>
                            <!-- <th class="fs-small">Username</th> -->
                            <th class="fs-small">credentials</th>
                            <!-- <th class="fs-small">Password</th> -->
                            <th class="fs-small">Age</th>
                            <!-- <th>Profile</th> -->
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($therapistsData as $therapist) { ?>
                            <tr>
                                <td>
                                    <?php echo $therapist['FullName']; ?>
                                </td>
                                <td class="fs-small">
                                    <?php echo $therapist['Specialization']; ?>
                                </td>
                                <td>
                                    <?php echo $therapist['Price']; ?>
                                </td>
                                <!-- <td>
                                    <?php echo $therapist['Percentage']; ?>
                                </td>
                                <td>
                                    <?php echo $therapist['PriceAfterPercentage']; ?>
                                </td> -->
                                <td>
                                    <?php echo $therapist['Rating']; ?>
                                </td>
                                <td>
                                    <?php echo $therapist['City']; ?>
                                </td>
                                <!-- <td><?php //echo $therapist['Bio']; ?></td> -->
                                <td>
                                    <?php echo $therapist['Gender']; ?>
                                </td>
                                <td>
                                    <?php echo $therapist['Phone']; ?>
                                </td>
                                <!-- <td>
                                    <?php echo $therapist['Username']; ?>
                                </td> -->
                                <td>
                                    <?php echo $therapist['Email']; ?>
                                    <?php echo $therapist['Password']; ?>
                                </td>
                               
                                <td>
                                    <?php echo $therapist['Age']; ?>
                                </td>
                                <!-- <td><?php //echo $therapist['Profile']; ?></td> -->
                                <td>
                                    <div class="dropdown right">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Options
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item pointer" href="editTherapist.php?TherapistID=<?php echo $therapist['TherapistID']; ?>">تعديل البيانات</a>
                                            <a class="dropdown-item pointer" href="viewTherapist.php?TherapistID=<?php echo $therapist['TherapistID']; ?>">التفاصيل</a>
                                            <a class="dropdown-item" href="docs.php?TherapistID=<?php echo $therapist['TherapistID']; ?>">الوثائق</a>
                                            <a class="dropdown-item" href="Schedule.php?TherapistID=<?php echo $therapist['TherapistID']; ?>">تحديد الواعيد</a>
                                            
                                            <!-- <a class="dropdown-item pointer" href="editTherapist.php">تعديل البيانات</a>
                                            <a class="dropdown-item pointer" href="viewTherapist.php">التفاصيل</a>
                                            <a class="dropdown-item" href="docs.php">الوثائق</a>
                                            <a class="dropdown-item" href="Schedule.php">تحديد الواعيد</a> -->
                                            <a class="dropdown-item pointer" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal">حذف</a>
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

</div>
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
                <h4 class="text-center">Confirm to delete this</h4>
                <div class="text-center">
                    <button class="btn btn-danger w-35 mt-5">Delete</button>
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
            ],
        });
    });
</script>
<!-- Add this script to your HTML, preferably just before the closing </body> tag -->
<script>
    $(document).ready(function () {
        // Function to fetch therapist data and populate the form
        function fetchTherapistData(therapistId) {
            $.ajax({
                url: 'getTherapistData.php',
                method: 'GET',
                data: { therapistId: therapistId },
                dataType: 'json',
                success: function (data) {
                    // Populate the form fields with data
                    $('#edit_fullName').val(data.FullName);
                    $('#edit_specialization').val(data.Specialization);
                    $('#edit_price').val(data.Price);
                    $('#edit_percentage').val(data.Percentage);
                    $('#edit_priceafterpercentage').val(data.PriceAfterPercentage);
                    $('#edit_rating').val(data.Rating);
                    $('#edit_city').val(data.City);
                    $('#edit_bio').val(data.Bio);
                    $('input[name="edit_gender"][value="' + data.Gender + '"]').prop('checked', true);
                    $('#edit_phone').val(data.Phone);
                    $('#edit_username').val(data.Username);
                    $('#edit_email').val(data.Email);
                    $('#edit_password').val(data.Password);
                    $('#edit_age').val(data.Age);
                    // You may need to handle the profile image separately
                },
                error: function () {
                    alert('Failed to fetch therapist data.');
                }
            });
        }

        $('#editModal').on('show.bs.modal', function (event) {
            // Get the TherapistID from the data-id attribute
            var therapistId = $(event.relatedTarget).data('id');

            // Populate the hidden input field
            $('input[name="edit_therapistId"]').val(therapistId);

            // Fetch and display therapist data
            fetchTherapistData(therapistId);
        });
    });
</script>

</body>

</html>
<?php
// Handle the form submission for adding a new therapist
if (isset($_POST['addTherapist'])) {
    $data = array(
        $_POST['fullName'],
        $_POST['specialization'],
        $_POST['price'],
        $_POST['percentage'],
        $_POST['priceafterpercentage'],
        $_POST['rating'],
        $_POST['city'],
        $_POST['bio'],
        $_POST['gender'],
        $_POST['phone'],
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $_POST['age'],
        $_POST['profile']
    );

    if ($therapists->insertTherapist(...$data)) {
        // Insertion successful, you can redirect or show a success message
        echo '<script>window.location.href = "Therapist.php";</script>';
        exit;
    } else {
        // Insertion failed, handle the error
        $errorMessage = "Failed to add therapist.";
    }
}
// Handle the form submission for updating an existing therapist
if (isset($_POST['updateTherapist'])) {
    //$therapistId = $_POST['therapistId'];
    $data = array(
        $_POST['edit_therapistId'],
        $_POST['edit_fullName'],
        $_POST['edit_specialization'],
        $_POST['edit_price'],
        $_POST['edit_percentage'],
        $_POST['edit_priceafterpercentage'],
        $_POST['edit_rating'],
        $_POST['edit_city'],
        $_POST['edit_bio'],
        $_POST['edit_gender'],
        $_POST['edit_phone'],
        $_POST['edit_username'],
        $_POST['edit_email'],
        $_POST['edit_password'],
        $_POST['edit_age'],
        $_POST['edit_profile']
    );

    if ($therapists->updateTherapist(...$data)) {
        // Update successful, you can redirect or show a success message
        echo '<script>window.location.href = "Therapist.php";</script>';
        exit;
    } else {
        // Update failed, handle the error
        $errorMessage = "Failed to update therapist.";
    }
}
// Handle the deletion of a therapist
if (isset($_GET['deleteTherapist'])) {
    $therapistId = $_GET['deleteTherapist'];

    if ($therapists->deleteTherapist($therapistId)) {
        // Deletion successful, you can redirect or show a success message
        echo '<script>window.location.href = "Therapist.php";</script>';
        exit;
    } else {
        // Deletion failed, handle the error
        $errorMessage = "Failed to delete therapist.";
    }
}
// Retrieve therapist data by ID
if (isset($_GET['editTherapist'])) {
    $therapistId = $_GET['editTherapist'];
    $therapistData = $therapists->getTherapistById($therapistId);

    // Populate the edit modal with $therapistData
}

// Retrieve therapist data for details view
if (isset($_GET['viewDetails'])) {
    $therapistId = $_GET['viewDetails'];
    $therapistData = $therapists->getTherapistById($therapistId);
}


?>