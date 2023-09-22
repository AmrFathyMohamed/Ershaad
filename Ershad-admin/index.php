<?php include("layout.php"); ?>
<?php include("../classes/Database.php"); ?>
<?php include("../classes/SessionTable.php"); ?>

<?php 
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $sessions = new SessionTable($database);
    $sessionsData = $sessions->getSessionSums();
    // You can use $userId in your code as needed
    $TotalA = $sessionsData['TotalSumA'];
    $TotalB = $sessionsData['TotalSumB'];

    $sessionsData = $sessions->getSessionTotal();
    // You can use $userId in your code as needed
    $TotalSessionsToday  = $sessionsData['TotalSessionsToday'];
    $TotalSessions  = $sessionsData['TotalSessions'];

} else {
    header("Location: index.php");
    exit;
}
?>
<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Total</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p id="sales">5000 EGP</p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas1" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Profit</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p id="users">532,20</p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas2" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Sessions</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p id="totalSessions">1,580 </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas3" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card card-statistic">
                    <div class="card-body p-0">
                        <div class="d-flex flex-column">
                            <div class='px-3 py-3 d-flex justify-content-between'>
                                <h3 class='card-title'>Sessions Today</h3>
                                <div class="card-right d-flex align-items-center">
                                    <p id="todaySessions">25 </p>
                                </div>
                            </div>
                            <div class="chart-wrapper">
                                <canvas id="canvas4" style="height:100px !important"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class='card-heading p-1 pl-3'>Sessions / Month</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col-md-12 col-12">
                                <canvas id="bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </section>
</div>


</div>
</div>
<?php include("footer.php"); ?>
<script>
    let totalSessions = <?php echo $TotalSessions;?>;
    let todaySessions = <?php echo $TotalSessionsToday ;?>;
    let users = <?php echo $TotalB;?>;
    let sales = <?php echo $TotalA;?>;

    $("#totalSessions").text(totalSessions);
    $("#todaySessions").text(todaySessions);
    $("#sales").text(sales + 'EGP');
    $("#users").text(users);
</script>
<?php
// Include your database connection code here

// Assuming you have a database connection, create a SQL query to get session counts by month
$sql = "SELECT DATE_FORMAT(Date, '%b') AS month, COUNT(*) AS session_count
FROM Sessions
GROUP BY DATE_FORMAT(Date, '%b')
ORDER BY MIN(Date)";
// Execute the query and fetch the results
$result = $database->executeQuery($sql);

// Initialize an array to store session counts for each month
$sessionCounts = array_fill(0, 12, 0);

// Populate the session counts array with data from the query result
$data = $result->fetch_all(MYSQLI_ASSOC);
foreach ($data as $row) {
    $month = $row['month'];
    $sessionCount = $row['session_count'];

    // Map the month abbreviation to its index (e.g., Jan to 0, Feb to 1, etc.)
    $monthIndex = array_search($month, ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]);

    // Update the session count in the array
    if ($monthIndex !== false) {
        $sessionCounts[$monthIndex] = $sessionCount;
    }
}

// Convert the session counts array to a JavaScript-compatible format
$sessionCountsJSON = json_encode(array_values($sessionCounts));
?>

<script>
    // Function to update the chart with dynamic data
    //function updateChartWithDynamicData() {
    // Assuming you have included Chart.js library

    // Fetch dynamic data from your PHP script
    var dynamicData = <?php echo json_encode($sessionCounts); ?>;

    var ctxBar = document.getElementById("bar").getContext("2d");
    var myBar = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], // Complete the labels for all months
            datasets: [{
                label: 'Sessions', // Change label to 'Sessions'
                backgroundColor: [chartColors.grey, chartColors.info, chartColors.blue,
                chartColors.grey, chartColors.info, chartColors.blue,
                chartColors.grey, chartColors.info, chartColors.blue,
                chartColors.grey, chartColors.info, chartColors.blue],
                data: dynamicData, // Use dynamic data obtained from PHP
            }]
        },
        options: {
            responsive: true,
            barRoundness: 1,
            title: {
                display: false,
                text: "Chart.js - Bar Chart with Rounded Tops (drawRoundedTopRectangle Method)"
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        suggestedMax: Math.max(...dynamicData) + 20, // Adjust the max based on dynamic data
                        padding: 10,
                    },
                    gridLines: {
                        drawBorder: false,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false
                    }
                }]
            }
        }
    });

    // Call the function to update the chart with dynamic data
</script>

</body>

</html>