<?php
// Include necessary files
include("layout.php");
include("../classes/Database.php");
include("../classes/AdsTable.php"); // Assuming you have an AdsTable class

// Check if the user is logged in as an admin
if (isset($_SESSION['user_id'])) {
    $adminId = $_SESSION['user_id'];
    $database = new Database();
    $adsTable = new AdsTable($database); // Change this to your AdsTable class
    $adsData = $adsTable->getAds(); // Assuming you have a method to fetch ads
} else {
    // Redirect or display an error message for unauthorized access
    header("Location: index.php");
    exit;
}

// Handle the form submission for adding a new ad
if (isset($_POST['addAd'])) {
    // Handle the file upload and ad insertion here
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
            // Insert the file path into the database
            if ($adsTable->insertAd('Ershad-admin/' . $targetDir . $uniqueFilename)) {
                // Insertion successful, you can redirect or show a success message
                echo '<script>window.location.href = "Ads.php";</script>';
                exit;
            } else {
                // Insertion failed, handle the error
                $errorMessage = "Failed to add ad.";
            }
        } else {
            // File upload failed, handle the error
            $errorMessage = "Failed to upload the ad image.";
        }
    }
}

// Handle the deletion of an ad
if (isset($_GET['deleteAd'])) {
    $adIdToDelete = $_GET['deleteAd'];

    if ($adsTable->deleteAd($adIdToDelete)) {
        // Deletion successful, you can redirect or show a success message
        echo '<script>window.location.href = "Ads.php";</script>';
        exit;
    } else {
        // Deletion failed, handle the error
        $errorMessage = "Failed to delete ad.";
    }
}
?>

<!-- HTML structure for Ads.php -->
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ads Management</h3>
            </div>
            <!-- Add any other page title content here -->
        </div>
    </div>

    <section class="section">
        <!-- Add Ad button -->
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn icon icon-left btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addAdsModal">
                    Add Ad
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="adTable">
                    <thead>
                        <tr>
                            <th>Ad Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($adsData as $ad) { ?>
                            <tr>
                                <td>
                                <img src="<?= str_replace('Ershad-admin/', '', $ad['photo']) ?>" class="d-block w-100" alt="...">

                                </td>
                                <td>
                                    <a href="Ads.php?deleteAd=<?php echo $ad['adsID']; ?>" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this ad?')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Add Ad Modal -->
    <div class="modal fade" id="addAdsModal" tabindex="-1" role="dialog" aria-labelledby="addAdsModalLabel"
        aria-hidden="true">
        <!-- Add ad modal HTML code goes here -->
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdsModalLabel">Add Ad</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="adPhoto" class="form-label">Ad Photo</label>
                            <input type="file" class="form-control" id="adPhoto" name="profile" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary" name="addAd">Add Ad</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include("footer.php"); ?>
<script>
    $(document).ready(function () {
        $('#adTable').DataTable({
            dom: 'Bfrtip', // Add buttons to the DataTable
            "buttons": [
                'pdf', // Add PDF export button
                'csv'  // Add CSV export button
            ],
        });
    });

</script>
</body>

</html>