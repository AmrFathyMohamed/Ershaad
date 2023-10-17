<?php include("layout.php"); ?>
<?php include("../classes/Database.php"); ?>
<?php include("../classes/TherapistTable.php"); ?>
<?php include("../classes/SpecialtiesTable.php"); ?>

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

if (isset($_POST['addTherapist'])) {
    $fullName = $_POST['fullName'];
    $specialization = $_POST['specialization'];
    $price = floatval($_POST['price']);
    $percentage = floatval($_POST['percentage']);
    $priceAfterPercentage = floatval($_POST['priceafterpercentage']);
    $rating = floatval($_POST['rating']);
    $city = $_POST['city'];
    $bio = $_POST['bio'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $desiredUsername = $_POST['username'];
    $query = "SELECT COUNT(*) AS count FROM therapists WHERE Username = '$desiredUsername'";
    $result = $database->executeQuery($query);
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        $uniqueUsername = $desiredUsername . uniqid();
    } else {
        $uniqueUsername = $desiredUsername;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = intval($_POST['age']);
    $targetDir = "uploads/";
    $profileImage = $_FILES['profile']['name'];
    $profileImageTmp = $_FILES['profile']['tmp_name'];

    // Check if a file was uploaded
    if (empty($profileImage)) {
        $errorMessage = "Please select a profile image.";
    } else {
        $uniqueFilename = uniqid() . '_' . $profileImage;

        // Check if the file was successfully uploaded
        if (move_uploaded_file($profileImageTmp, $targetDir . $uniqueFilename)) {
            // Assuming $therapists is an instance of a class with an insertTherapist method
            $success = $therapists->insertTherapist($fullName, $specialization, $price, $percentage, $priceAfterPercentage, $rating, $city, $bio, $gender, $phone, $uniqueUsername, $email, $password, $age, 'Ershad-admin/' . $targetDir . $uniqueFilename);

            if ($success) {
                echo '<script>
        alert("تم اضافة المعالج بنجاح")
        window.location.href = "Therapist.php";
        </script>';
                exit;
            } else {
                $errorMessage = "Failed to add therapist.";
                echo '<script>
        alert(" ' . $errorMessage . ' حدث خطأ")
        location.reload();
        </script>';
            }
        } else {
            $errorMessage = "Failed to upload profile image.";
            echo '<script>
        alert(" ' . $errorMessage . ' حدث خطأ")
        location.reload();
        </script>';
        }
    }

}
?>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Add Therapist</h3>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Therapist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="addTherapist.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="specialization" class="form-label">Specialization</label>
                                <select class="form-select" id="specialization" name="specialization" required>
                                    <?php foreach ($specialties as $spec) { ?>
                                        <option value="<?= $spec["Specialty"] ?>" <?php if ($spec["Specialty"] === $therapistsData['Specialization']) { echo 'selected'; } ?>>
                                            <?= $spec["Specialty"] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="percentage" class="form-label">Percentage</label>
                                <input type="number" class="form-control" id="percentage" name="percentage" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="priceafterpercentage" class="form-label">Price After Percentage</label>
                                <input type="number" class="form-control" id="priceafterpercentage"
                                    name="priceafterpercentage" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="number" class="form-control" id="rating" name="rating" min="0" max="5"
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <select class="form-select" id="city" name="city" required>
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
                                <textarea class="form-control" id="bio" name="bio" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male"
                                        required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female" required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" name="age" min="0" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="profile" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="profile" name="profile">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="addTherapist">Add Therapist</button>
                    </div>
                </form>

            </div>
        </div>
    </section>
</div>
<?php include("footer.php"); ?>
</body>

</html>