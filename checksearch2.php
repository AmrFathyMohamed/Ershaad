<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class
    require_once 'classes/Database.php';
        $Namee = $_POST['search'];
    $sql = "select * from `therapists` WHERE TherapistID > 1000 AND FullName like '%$Namee%'"; // Start with a true condition

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
        $html .= '<img class="img-fluid" style="object-fit: cover; width: 100%;height: 200px;" src="' . $row["Profile"] . '" alt="" />';
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