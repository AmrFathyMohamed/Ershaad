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
        <form action="">
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
        </form>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <h6>Therapist</h6>
                        <div class="form-group">
                            <select class="form-select form-control form-control-">
                                <option>All</option>
                                <?php foreach ($therapistsData as $therapist) { ?>
                                    <option>
                                        <?= $therapist['FullName']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <h6>Specialties</h6>
                        <div class="form-group">
                            <select class="form-select form-control form-control-">
                                <option>All</option>
                                <?php foreach ($specialties as $specialtie) { ?>
                                    <option>
                                        <?= $specialtie['Specialty']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <h6>Date Input 1</h6>
                        <div class="form-group">
                            <input type="date" class="form-control form-control-md">
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <h6>Date Input 2</h6>
                        <div class="form-group">
                            <input type="date" class="form-control form-control-md">
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                    <button class="btn btn-primary px-5">Search</button>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="text-right"><button class="btn btn-primary px-5" id="printBtn"><i
                            class="bi bi-printer fs-6 me-2"></i>Print</button></div>
                <div id="printTable">
                    <div class="scroll-table">
                        <table class='table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Specialty</th>
                                    <th>Price/ Hour</th>
                                    <th>Sessions</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($therapistsData as $therapist) {
                                $sessions = $therapists->getDataByTherapistIdAccepted($therapist['TherapistID'], "sessions");
                                $totalSessions = count($sessions); ?>
                                <tr>
                                    <td><?= $therapist['FullName']; ?></td>

                                    <td><?= $therapist['Specialization']; ?></td>
                                    <td><?= $therapist['Price']; ?></td>
                                    <td><?= $totalSessions; ?></td>
                                    <td class="total"><?= $therapist['Price'] * $totalSessions; ?></td>
                                </tr>
                                    
                                <?php } ?>
                                
                                

                            </tbody>
                        </table>

                    </div>
                    <h3 class="text-right me-5 pe-3"><span id="ReportTotal"></span></h3>
                </div>
            </div>

    </section>
</div>

<?php include("footer.php"); ?>
<script>
    $(document).ready(function () {
        calculateTotal();

        function calculateTotal() {
            var total = 0;

            $('.total').each(function () {
                var value = parseFloat($(this).text());
                console.log(value);
                if (!isNaN(value)) {
                    total += value;
                }
            });

            $('#ReportTotal').text('Total: ' + total);
        }
        calculateTotal();
        $("#printBtn").click(function () {
            var printContent = $("#printTable").html();
            var originalContent = $("body").html();

            $("body").html(printContent);

            window.print();

            $("body").html(originalContent);
        });
    });

</script>
</body>

</html>