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
    $SpecialtiesObject = new SpecialtiesTable($database);

    // Retrieve search parameters from the query string
    $therapistName = isset($_GET['therapist']) ? $_GET['therapist'] : 'All';
    $specialty = isset($_GET['specialty']) ? $_GET['specialty'] : 'All';
    $fromDate = isset($_GET['from_date']) ? $_GET['from_date'] : null;
    $toDate = isset($_GET['to_date']) ? $_GET['to_date'] : null;

    // Perform the database query based on the search parameters
    $therapistsData = $therapists->searchTherapistsWithSessionCount($therapistName, $specialty, $fromDate, $toDate);
    $specialties = $SpecialtiesObject->getDataByTableName();
} else {
    // Handle the case when 'user_id' is not present in the session
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
                                <?php foreach ($therapistsData as $therapist) {?>
                                    <tr>
                                        <td><?= $therapist['FullName']; ?></td>
                                        <td><?= $therapist['Specialization']; ?></td>
                                        <td><?= $therapist['PriceAfterPercentage']; ?></td>
                                        <td><?= $therapist['SessionCount']; ?></td>
                                        <td class="total"><?= $therapist['PriceAfterPercentage'] * $therapist['SessionCount']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="text-right me-5 pe-3"><span id="ReportTotal"></span></h3>
                </div>
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
