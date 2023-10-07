<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class
    require_once 'classes/Database.php';
    // Get form input values
    //$query = $_POST['query'];
    $date = $_POST['date'];
    $gendermale = isset($_POST['GenderM']) ? 1 : 0;
    $genderfemale = isset($_POST['GenderF']) ? 1 : 0;
    $speciality = $_POST['speciality'];
    $priceRange = $_POST['priceRange'];
    if($date == null){
        $sql = "SELECT therapists.*, GROUP_CONCAT(appointments.Date) AS appointment_dates
        FROM therapists
        INNER JOIN appointments ON therapists.TherapistID = appointments.TherapistID OR appointments.Date >= '$date' AND appointments.Type = 'Work'
        WHERE (
            (
                (SELECT COUNT(*) FROM sessions WHERE sessions.TherapistID = therapists.TherapistID OR sessions.Date >= '$date') = 0
            )";
    }else{
    $sql = "SELECT therapists.*, GROUP_CONCAT(appointments.Date) AS appointment_dates
        FROM therapists
        INNER JOIN appointments ON therapists.TherapistID = appointments.TherapistID AND appointments.Date >= '$date' AND appointments.Type = 'Work'
        WHERE (
            (
                (SELECT COUNT(*) FROM sessions WHERE sessions.TherapistID = therapists.TherapistID AND sessions.Date >= '$date') = 0
            )";
    }
    // Build the SQL query based on the form inputs

    if ($gendermale && $genderfemale) {
        $sql .= " AND Gender IN ('Male', 'Female')";
    } elseif ($gendermale) {
        $sql .= " AND Gender = 'Male'";
    } elseif ($genderfemale) {
        $sql .= " AND Gender = 'Female'";
    }

    if ($speciality != 'All') {
        $sql .= " AND Specialization = '$speciality'";
    }

    if ($priceRange) {
        $sql .= " AND PriceAfterPercentage > $priceRange";
    }

    $sql .= ") GROUP BY therapists.TherapistID  ORDER BY therapists.FullName ASC";

    // Execute the query
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
        $html = '<div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">';
        $html .= '<div class="team-item rounded">';
        $html .= '<img class="img-fluid" src="' . $row["Profile"] . '" alt="" />';
        $html .= '<div class="text-center p-4">';
        $html .= '<h5 class="text-">' . $row["FullName"] . '</h5>';
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