<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class
    require_once 'classes/Database.php';
    // Get form input values
    //$query = $_POST['query'];
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $gendermale = isset($_POST['GenderM']) ? 1 : 0;
    $genderfemale = isset($_POST['GenderF']) ? 1 : 0;
    $speciality = $_POST['speciality'];
    $priceRange = $_POST['priceRange'];
    $priceRangeto = $_POST['priceRangeto'];

    // if ($date == '') {
    //     $sql = "SELECT therapists.* FROM therapists WHERE (true ";
    // } else {
    //     $sql = "SELECT therapists.*, GROUP_CONCAT(appointments.Date) AS appointment_dates
    //     FROM therapists
    //     INNER JOIN appointments ON therapists.TherapistID = appointments.TherapistID AND appointments.Date >= '$date'
    //     WHERE (
    //         (
    //             (SELECT COUNT(*) FROM sessions WHERE sessions.TherapistID = therapists.TherapistID AND sessions.Date >= '$date') = 0 
    //         )";
    // }
    // // Build the SQL query based on the form inputs

    // if ($gendermale && $genderfemale) {
    //     $sql .= " AND Gender IN ('Male', 'Female')";
    // } elseif ($gendermale) {
    //     $sql .= " AND Gender IN ('Male')";
    // } elseif ($genderfemale) {
    //     $sql .= " AND Gender IN ('Female')";
    // }

    // if ($speciality != 'All') {
    //     $sql .= " AND Specialization = '$speciality'";
    // }

    // if ($priceRange) {
    //     $sql .= " AND PriceAfterPercentage > $priceRange";
    // }

    // if ($priceRange) {
    //     $sql .= " AND PriceAfterPercentage < $priceRangeto";
    // }
    // $sql .= ") GROUP BY therapists.TherapistID  ORDER BY therapists.FullName ASC";
    // Execute the query
    // Initialize the SQL query
    $sql = "SELECT
    a.AppointmentID,
    a.Date,
    a.Time,
    a.Type,
    t.*,
    CASE
        WHEN s.SessionID IS NOT NULL THEN 'Yes'
        ELSE 'No'
    END AS SessionScheduled
FROM (
    SELECT
        a1.AppointmentID,
        a1.Date,
        a1.Time,
        a1.Type,
        a1.TherapistID
    FROM appointments a1
    WHERE a1.AppointmentID = (
        SELECT MIN(a2.AppointmentID)
        FROM appointments a2
        WHERE a2.TherapistID = a1.TherapistID
        AND NOT EXISTS (
            SELECT 1
            FROM sessions s
            WHERE s.Date = a2.Date
            AND s.Time = a2.Time
            AND s.TherapistID = a2.TherapistID
        )
    )
) a
INNER JOIN therapists t ON a.TherapistID = t.TherapistID
LEFT JOIN sessions s ON a.Date = s.Date AND a.Time = s.Time AND a.TherapistID = s.TherapistID
WHERE 1 "; // Start with a true condition

    // Add conditions based on user input
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    if (!empty($date)) {
        $sql .= " AND a.Date = '$date'";
    }

    $gendermale = isset($_POST['GenderM']) ? 1 : 0;
    $genderfemale = isset($_POST['GenderF']) ? 1 : 0;
    if ($gendermale && !$genderfemale) {
        $sql .= " AND t.Gender = 'Male'";
    } elseif ($genderfemale && !$gendermale) {
        $sql .= " AND t.Gender = 'Female'";
    }

    $speciality = $_POST['speciality'];
    if ($speciality != 'All') {
        $sql .= " AND t.Specialization = '$speciality'";
    }

    $priceRange = $_POST['priceRange'];
    $priceRangeto = $_POST['priceRangeto'];
    if (!empty($priceRange) && !empty($priceRangeto)) {
        $sql .= " AND t.PriceAfterPercentage BETWEEN $priceRange AND $priceRangeto";
    }

    $sql .= " ORDER BY a.Date, a.Time, a.TherapistID";
    //echo $sql;
    $db = new Database();

    // Attempt to log in the user
    $result = $db->executeQuery($sql);

    if (!$result) {
        die("Query error: " . $conn->error);
    }

    // Fetch and display the results
    // echo $sql;
    // echo "<br>";

    while ($row = $result->fetch_assoc()) {
        $html = '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
        $html .= '<div class="team-item rounded">';
        $html .= '<img class="img-fluid" src="' . $row["Profile"] . '" alt="" />';
        $html .= '<div class="text-center p-4">';
        $html .= '<h5 class="text-">' . $row["FullName"] . '</h5>';
        // $html .= '<h5 class="text-">' . $row["SessionScheduled"] . '</h5>';

        $html .= '<span>' . $row["Specialization"] . '</span>';
        $html .= '</div>';
        $html .= '<div class="team-text text-center bg-white p-4">';
        $html .= '<h5>' . $row["FullName"] . '</h5>';
        $html .= '<p>' . $row["Specialization"] . '</p>';

        // Display the rating stars
        $html .= '<div class="rate d-flex justify-content-center align-content-center mb-2">';
        $rating = $row["Rating"];
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                $html .= '<i class="fa-solid fa-star text-warning"></i>';
            } else {
                $html .= '<i class="fa-regular fa-star text-warning"></i>';
            }
        }
        $html .= '</div>';

        $html .= '<div class="price d-flex justify-content-center align-content-center">';
        $html .= '<p>' . $row["PriceAfterPercentage"] . ' / ساعة</p>';
        $html .= '<i class="fa-solid fa-money-bill-1-wave ms-2"></i>';
        $html .= '</div>';

        $html .= '<a class="btn w-100 btn-light m-1" href="therapist-profile.php?id=' . $row["TherapistID"] . '">عرض الملف الشخصي</a>';

        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';


        echo $html;
    }


    // Close the database connection
    //$conn->close();
}
?>