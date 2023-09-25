<?php include("layout.php"); ?>
<?php include("../classes/Database.php"); ?>
<?php include("../classes/TherapistTable.php"); ?>
<?php include("../classes/SpecialtiesTable.php"); ?>
<?php
// Check if the 'id' parameter is set in the URL
if (isset($_SESSION['user_id'], $_GET['TherapistID'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $therapists = new TherapistTable($database);
    $therapistsData = $therapists->getTherapistById($_GET['TherapistID']);
    $SpecialtiesObject = new SpecialtiesTable($database);
    $specialties = $SpecialtiesObject->getDataByTableName();
    // You can use $userId in your code as needed
} else {
    echo '<script>
        alert("تم بنجاح")
        window.location.href = "Therapist.php";
        </script>';
    
    exit;
}
// Handle the form submission
if (isset($_POST['updateTherapist'])) {
    $therapistId = $_POST['TherapistID'];
    $fullName = $_POST['FullName'];
    $specialization = $_POST['Specialization'];
    $price = floatval($_POST['Price']);
    $percentage = floatval($_POST['Percentage']);
    $priceAfterPercentage = floatval($_POST['PriceAfterPercentage']);
    $rating = floatval($_POST['Rating']);
    $city = $_POST['City'];
    $bio = $_POST['Bio'];
    $phone = $_POST['Phone'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $age = intval($_POST['Age']);

    // Check if a new profile image was uploaded
    if (!empty($_FILES['Profile']['name'])) {
        $targetDir = "uploads/";
        $profileImage = $_FILES['Profile']['name'];
        $profileImageTmp = $_FILES['Profile']['tmp_name'];
        $uniqueFilename = uniqid() . '_' . $profileImage;

        // Check if the file was successfully uploaded
        if (move_uploaded_file($profileImageTmp, $targetDir . $uniqueFilename)) {
            // Assuming $therapists is an instance of a class with an updateTherapist method
            $success = $therapists->updateTherapist(
                $therapistId,
                $fullName,
                $specialization,
                $price,
                $percentage,
                $priceAfterPercentage,
                $rating,
                $city,
                $bio,
                $phone,
                $username,
                $email,
                $password,
                $age,
                'Ershad-admin/' . $targetDir . $uniqueFilename
            );

            if ($success) {
                echo '<script>window.location.href = "Therapist.php";</script>';
                exit;
            } else {
                $errorMessage = "Failed to update therapist.";
            }
        } else {
            $errorMessage = "Failed to upload profile image.";
        }
    } else {
        // If no new profile image was uploaded, update therapist information without changing the profile image
        $success = $therapists->updateTherapistWithoutImage(
            $therapistId,
            $fullName,
            $specialization,
            $price,
            $percentage,
            $priceAfterPercentage,
            $rating,
            $city,
            $bio,
            $phone,
            $username,
            $email,
            $password,
            $age
        );

        if ($success) {
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
                <form method="POST" action="editTherapist.php?TherapistID=<?= $therapistsData['TherapistID'] ?>" enctype="multipart/form-data">
                    <input hidden id="TherapistID" name="TherapistID" value="<?= $therapistsData['TherapistID'] ?>" />
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName"
                                    value="<?= $therapistsData['FullName'] ?>" name="FullName" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="specialization" class="form-label">Specialization</label>
                                <select class="form-select" id="specialization"
                                    value="<?= $therapistsData['Specialization'] ?>" name="Specialization" required>
                                    <?php foreach ($specialties as $spec) { ?>
                                        <option value="<?= $spec["Specialty"] ?>">
                                            <?= $spec["Specialty"] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price"
                                    value="<?= $therapistsData['Price'] ?>" name="Price" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="percentage" class="form-label">Percentage</label>
                                <input type="number" class="form-control" id="percentage"
                                    value="<?= $therapistsData['Percentage'] ?>" name="Percentage" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="priceafterpercentage" class="form-label">Price After Percentage</label>
                                <input type="number" class="form-control" id="priceafterpercentage"
                                    value="<?= $therapistsData['PriceAfterPercentage'] ?>" name="PriceAfterPercentage"
                                    required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="number" class="form-control" id="rating"
                                    value="<?= $therapistsData['Rating'] ?>" name="Rating" min="0" max="5" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <select class="form-select" id="city" value="<?= $therapistsData['City'] ?>" name="City"
                                    required>
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
                                <textarea class="form-control" id="bio" name="Bio" rows="4"
                                    required><?= $therapistsData['Bio'] ?></textarea>
                            </div>
                        </div>
                        <!-- <div class="col-4">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value=" $therapistsData[''] ?>" name="gender" id="male" value="Male"
                                        required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value=" $therapistsData[''] ?>" name="gender" id="female"
                                        value="Female" required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone"
                                    value="<?= $therapistsData['Phone'] ?>" name="Phone" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username"
                                    value="<?= $therapistsData['Username'] ?>" name="Username" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email"
                                    value="<?= $therapistsData['Email'] ?>" name="Email" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password"
                                    value="<?= $therapistsData['Password'] ?>" name="Password" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" id="age" value="<?= $therapistsData['Age'] ?>"
                                    name="age" min="0" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="profile" class="form-label">Profile Image</label>
                                <input type="file" class="form-control" id="profile"
                                    value="<?= $therapistsData['Profile'] ?>" name="Profile">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary" name="updateTherapist">Update Therapist</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?php include("footer.php"); ?>


</body>

</html>