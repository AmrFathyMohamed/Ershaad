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
                        <?php foreach ($therapistsData as $therapist) { ?>
                            <tr>
                            <td>
                                    <?php echo $therapist['FullName']; ?>
                                </td>
                                <td>
                                <?php echo $therapist['Email']; ?>
                                </td>
                                <td>
                                    <?php echo $therapist['Username']; ?>
                                </td>
                                <td>
                                    <?php echo $therapist['Password']; ?>
                                </td>
                                <td>
                                    <?php echo $therapist['Username']; ?>
                                </td>
                                <td>
                                    <span class="badge bg-success px-3">Accepted</span>
                                    <span class="badge bg-danger px-3">Rejected</span>
                                </td>
                               
                                <td>
                                    <div class="row">
                                        <div class="col-6 pe-3">
                                            <input id="argent-<?php echo $therapist['TherapistID']?>" class="check-rej-input" type="radio" name="type-<?php echo $therapist['TherapistID']?>" value="argent" />
                                            <label for="argent-<?php echo $therapist['TherapistID'];?>" class="check-img-label w-100">
                                                <div class="check-img-content py-1">
                                                    <h6 class="mb-0"> <i class="bi bi-x-octagon me-1 fs-5"></i> رفض</h6>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-6 ps-3">
                                            <input id="normal-<?php echo $therapist['TherapistID']?>" class="check-acc-input" type="radio" name="type-<?php echo $therapist['TherapistID']?>" value="normal" />
                                            <label for="normal-<?php echo $therapist['TherapistID']?>" class="check-img-label w-100">
                                                <div class="check-img-content py-1">
                                                    <h6 class="mb-0"> <i class="bi bi-check-circle-fill me-1 fs-5"></i> قبول </h6>
                                                </div>
                                            </label>
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

<?php include("footer.php"); ?>
<script>
    $(document).ready(function () {
        $('#table1').DataTable({
            dom: 'Bfrtip', // Add buttons to the DataTable
            "buttons": [
                'pdf', // Add PDF export button
                'csv'  // Add CSV export button
            ],"pageLength": 10
        });
        
    });
</script>
</body>

</html>
