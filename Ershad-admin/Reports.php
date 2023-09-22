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

<style>
    .scroll-table {
        height: 50vh;
        overflow-y: scroll;
    }
</style>

<div class="main-content container-fluid">
    <div class="page-title">
        <form action="ReportsList.php" method="GET"> <!-- Modify the action attribute -->
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Reports</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reports</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <h6>Therapist</h6>
                            <div class="form-group">
                                <select class="form-select form-control form-control-" name="therapist">
                                    <option value="All">All</option>
                                    <?php foreach ($therapistsData as $therapist) { ?>
                                        <option value="<?= $therapist['FullName']; ?>">
                                            <?= $therapist['FullName']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <h6>Specialties</h6>
                            <div class="form-group">
                                <select class="form-select form-control form-control-" name="specialty">
                                    <option value="All">All</option>
                                    <?php foreach ($specialties as $specialtie) { ?>
                                        <option value="<?= $specialtie['Specialty']; ?>">
                                            <?= $specialtie['Specialty']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <h6>From</h6>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-md" name="from_date">
                            </div>
                        </div>

                        <div class="col-md-3 mb-4">
                            <h6>To</h6>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-md" name="to_date">
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <button type="submit" class="btn btn-primary px-5">Search</button> <!-- Add a type attribute -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include("footer.php"); ?>
</body>

</html>
