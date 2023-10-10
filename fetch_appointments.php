<?php
// Include your database connection code here
include("classes/Database.php"); // Include your database connection class

// Check if the required parameters are set
if (isset($_POST['date'])) {
    // Sanitize and validate user input
    $selectedDate = $_POST['date'];
    $TherapistID = $_POST['TherapistID'];
    // Initialize the database connection
    $database = new Database();

    // Prepare and execute a query to fetch available appointments
    $sql = "SELECT a.* 
    FROM appointments AS a
    LEFT JOIN sessions AS s ON a.TherapistID = s.TherapistID AND a.date = s.date AND a.Time = s.Time AND s.Status = 'Accepted'
    WHERE a.date = '$selectedDate' AND a.TherapistID = $TherapistID
    AND s.TherapistID IS NULL";

    try {
        $result = $database->executeQuery($sql);

        // Check if any appointments were found
        if ($result) {
            $appointments = $result->fetch_all(MYSQLI_ASSOC);
            if (count($appointments) > 0) {
                // Generate HTML to display the available appointments
                echo '<div class="row gx-4" id="availableDates">';
                foreach ($appointments as $key) {
                    $currentLocalTime = new DateTime('now', new DateTimeZone('Asia/Amman'));
                    $sessionStartDateTime = new DateTime($key['Date'] . ' ' . $key['Time'], new DateTimeZone('Asia/Amman'));
                    if ($currentLocalTime <= $sessionStartDateTime) {
                        echo '<div class="col-3 pb-4">';
                        echo '<input id="period-' . $key['AppointmentID'] . '" class="check-img-input" type="radio" name="period" ' .
                            'value="' . $key['Time'] . '" />';
                        echo '<label for="period-' . $key['AppointmentID'] . '" class="check-img-label w-100">';
                        echo '<div class="check-img-content pt-2 pb-1">';
                        echo '<h6>' . date('h:ia', strtotime($key['Time'])) . ' - ' . date('h:ia', strtotime($key['Time'] . ' +1 hour')) . '</h6>';
                        echo '</div>';
                        echo '</label>';
                        echo '</div>';
                    }
                }
                echo '</div>';

            } else {
                echo '<div class="col-12 ps-3">
                <label  class="check-img-label w-100">
                  <div class="check-img-content pt-2 pb-1">
                    <!-- <img src="img/icon/icon-02-primary.png" class="w-15" alt=""> -->
                    <h6>No available appointments for the selected date and type.</h6>
                  </div>
                </label>
              </div>';
            }
        } else {
            echo 'Error fetching appointments.';
        }
    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid input.';
}
?>