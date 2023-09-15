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
                <h3>Edit Therapist</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Therapist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
            <form method="POST" action="">
            <div class="row">
                <input type="hidden" name="edit_therapistId" value="">
                
                <div class="col-4">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="edit_fullName" name="edit_fullName" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="specialization" class="form-label">Specialization</label>
                        <select class="form-select" id="edit_specialization" name="edit_specialization" required>
                            <?php foreach ($specialties as $spec) { ?>
                                <option value="<?= $spec["Specialty"] ?>"><?= $spec["Specialty"] ?></option>
                            <?php } ?>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="edit_price" name="edit_price" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="percentage" class="form-label">Percentage</label>
                        <input type="number" class="form-control" id="edit_percentage" name="edit_percentage" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="priceafterpercentage" class="form-label">Price After Percentage</label>
                        <input type="number" class="form-control" id="edit_priceafterpercentage" name="edit_priceafterpercentage" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="number" class="form-control" id="edit_rating" name="edit_rating" min="0" max="5" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <select class="form-select" id="edit_city" name="edit_city" required>
                            <option value="City 1">City 1</option>
                            <option value="City 2">City 2</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="edit_bio" name="edit_bio" rows="4" required></textarea>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="edit_gender" id="edit_male" value="Male" required>
                            <label class="form-check-label" for="edit_male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="edit_gender" id="edit_female" value="Female" required>
                            <label class="form-check-label" for="edit_female">Female</label>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="edit_phone" name="edit_phone" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="edit_username" name="edit_username" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit_email" name="edit_email" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="edit_password" name="edit_password" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="edit_age" name="edit_age" min="0" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="edit_profile" name="edit_profile">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary" name="updateTherapist">Update Therapist</button>
                </div>
            </div>

                </form>
            </div>
        </div>        
    </section>
</div>        
<?php include("footer.php"); ?>

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