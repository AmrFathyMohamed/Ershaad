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
                                <input type="text" class="form-control" id="edit_fullName" name="edit_fullName"
                                    required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="specialization" class="form-label">Specialization</label>
                                <select class="form-select" id="edit_specialization" name="edit_specialization"
                                    required>
                                    <?php foreach ($specialties as $spec) { ?>
                                        <option value="<?= $spec["Specialty"] ?>">
                                            <?= $spec["Specialty"] ?>
                                        </option>
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
                                <input type="number" class="form-control" id="edit_percentage" name="edit_percentage"
                                    required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="priceafterpercentage" class="form-label">Price After Percentage</label>
                                <input type="number" class="form-control" id="edit_priceafterpercentage"
                                    name="edit_priceafterpercentage" required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="number" class="form-control" id="edit_rating" name="edit_rating" min="0"
                                    max="5" required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <select class="form-select" id="edit_city" name="edit_city" required>
                                    <option value="Alexandria">Alexandria</option>
                                    <option value="Aswan">Aswan</option>
                                    <option value="Asyut">Asyut</option>
                                    <option value="Beheira">Beheira</option>
                                    <option value="Beni Suef">Beni Suef</option>
                                    <option value="Cairo">Cairo</option>
                                    <option value="Dakahlia">Dakahlia</option>
                                    <option value="Damietta">Damietta</option>
                                    <option value="Faiyum">Faiyum</option>
                                    <option value="Gharbia">Gharbia</option>
                                    <option value="Giza">Giza</option>
                                    <option value="Ismailia">Ismailia</option>
                                    <option value="Kafr El Sheikh">Kafr El Sheikh</option>
                                    <option value="Luxor">Luxor</option>
                                    <option value="Matrouh">Matrouh</option>
                                    <option value="Minya">Minya</option>
                                    <option value="Monufia">Monufia</option>
                                    <option value="New Valley">New Valley</option>
                                    <option value="North Sinai">North Sinai</option>
                                    <option value="Port Said">Port Said</option>
                                    <option value="Qalyubia">Qalyubia</option>
                                    <option value="Qena">Qena</option>
                                    <option value="Red Sea">Red Sea</option>
                                    <option value="Sharqia">Sharqia</option>
                                    <option value="Sohag">Sohag</option>
                                    <option value="South Sinai">South Sinai</option>
                                    <option value="Suez">Suez</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea class="form-control" id="edit_bio" name="edit_bio" rows="4"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="edit_gender" id="edit_male"
                                        value="Male" required>
                                    <label class="form-check-label" for="edit_male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="edit_gender" id="edit_female"
                                        value="Female" required>
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
                                <input type="text" class="form-control" id="edit_username" name="edit_username"
                                    required>
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
                                <input type="text" class="form-control" id="edit_password" name="edit_password"
                                    required>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="edit_age" name="edit_age" min="0"
                                    required>
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
                            <button type="submit" class="btn btn-primary" name="updateTherapist">Update
                                Therapist</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</div>
<?php include("footer.php"); ?>


</body>

</html>
