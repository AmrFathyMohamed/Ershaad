<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class
    require_once 'classes/Database.php';
    // Get form input values
    //$query = $_POST['query'];
    $date = isset($_POST['date']) ? $_POST['date'] : null;
    $gendermale = isset($_POST['GenderM']) ? 1 : 0;
    $genderfemale = isset($_POST['GenderF']) ? 1 : 0;
    $speciality = $_POST['speciality'];
    $priceRange = $_POST['priceRange'];
    $priceRangeto = $_POST['priceRangeto'];
    $currentLocalTime = new DateTime('now', new DateTimeZone('Asia/Amman'));
    $tNow = $currentLocalTime->format("H:i");
    $DNow = $currentLocalTime->format("Y-m-d");


    $sql = '';
    $sql2 = '';
    if (!empty($date)) {
        $sql .= "SELECT DISTINCT t.* FROM therapists t INNER JOIN appointments a ON t.TherapistID = a.TherapistID WHERE 1";
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        if (!empty($date)) {
            if ($DNow < $date) {
                $sql .= " AND a.Date = '$date'";
            } else {
                $sql .= " AND a.Date = '$date' AND a.Time > '$tNow'";
            }
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
        $sql .= " AND PriceAfterPercentage BETWEEN $priceRange AND $priceRangeto";
        $sql .= " ORDER BY FullName";
    } else {
        $sql .= "select * from `therapists` WHERE TherapistID > 1000 AND FullName like '%%'";
        $gendermale = isset($_POST['GenderM']) ? 1 : 0;
        $genderfemale = isset($_POST['GenderF']) ? 1 : 0;
        if ($gendermale && !$genderfemale) {
            $sql .= " AND Gender = 'Male'";
        } elseif ($genderfemale && !$gendermale) {
            $sql .= " AND Gender = 'Female'";
        }
        $speciality = $_POST['speciality'];
        if ($speciality != 'All') {
            $sql .= " AND Specialization = '$speciality'";
        }
        $priceRange = $_POST['priceRange'];
        $priceRangeto = $_POST['priceRangeto'];
        $sql .= " AND PriceAfterPercentage BETWEEN $priceRange AND $priceRangeto";
        $sql .= " ORDER BY FullName";

    }
    if (!empty($date)) {
        $sql2 .= "SELECT DISTINCT t.* FROM therapists t INNER JOIN sessions a ON t.TherapistID = a.TherapistID WHERE 1";
        $date = isset($_POST['date']) ? $_POST['date'] : '';
        if (!empty($date)) {
            if ($DNow < $date) {
                $sql2 .= " AND a.Date = '$date'";
            } else {
                $sql2 .= " AND a.Date = '$date' AND a.Time > '$tNow'";
            }
        }
        $gendermale = isset($_POST['GenderM']) ? 1 : 0;
        $genderfemale = isset($_POST['GenderF']) ? 1 : 0;
        if ($gendermale && !$genderfemale) {
            $sql2 .= " AND t.Gender = 'Male'";
        } elseif ($genderfemale && !$gendermale) {
            $sql2 .= " AND t.Gender = 'Female'";
        }
        $speciality = $_POST['speciality'];
        if ($speciality != 'All') {
            $sql2 .= " AND t.Specialization = '$speciality'";
        }
        $priceRange = $_POST['priceRange'];
        $priceRangeto = $_POST['priceRangeto'];
        $sql2 .= " AND PriceAfterPercentage BETWEEN $priceRange AND $priceRangeto";
        $sql2 .= " ORDER BY FullName";
    } else {
        $sql2 .= "select * from `therapists` WHERE TherapistID > 1000 AND FullName like '%%'";
        $gendermale = isset($_POST['GenderM']) ? 1 : 0;
        $genderfemale = isset($_POST['GenderF']) ? 1 : 0;
        if ($gendermale && !$genderfemale) {
            $sql2 .= " AND Gender = 'Male'";
        } elseif ($genderfemale && !$gendermale) {
            $sql2 .= " AND Gender = 'Female'";
        }
        $speciality = $_POST['speciality'];
        if ($speciality != 'All') {
            $sql2 .= " AND Specialization = '$speciality'";
        }
        $priceRange = $_POST['priceRange'];
        $priceRangeto = $_POST['priceRangeto'];
        $sql2 .= " AND PriceAfterPercentage BETWEEN $priceRange AND $priceRangeto";
        $sql2 .= " ORDER BY FullName";
    }


    $db = new Database();


    // Attempt to log in the user
    $result = $db->executeQuery($sql);
    $result1 = $db->executeQuery($sql);
    $result2 = $db->executeQuery($sql2);


    if (!$result) {
        die("Query error: " . $conn->error);
    }


    $totalappointment = count($result1->fetch_all(MYSQLI_ASSOC));
    $totalsessions = count($result2->fetch_all(MYSQLI_ASSOC));
    $B = ($totalappointment >= $totalsessions) ? 'Yes' : 'No';
    echo '<script>
        alert("' . $sql . '  ; ' . $sql2 . '");
        </script>';
    if ($B == 'Yes') {
        //echo $B;
        while ($row = $result->fetch_assoc()) {
            if (!empty($date)) {
                if ($DNow < $date) {
                    $S = $db->executeQuery("select count(TherapistID) AS S from `sessions` WHERE TherapistID = " . $row["TherapistID"] . " AND Date = '$date'")->fetch_assoc();
                    $A = $db->executeQuery("select count(TherapistID) AS A from `appointments` WHERE TherapistID = " . $row["TherapistID"] . " AND Date = '$date'")->fetch_assoc();
                } else {
                    $S = $db->executeQuery("select count(TherapistID) AS S from `sessions` WHERE TherapistID = " . $row["TherapistID"] . " AND Date = '$date' AND Time >= '$tNow'")->fetch_assoc();
                    $A = $db->executeQuery("select count(TherapistID) AS A from `appointments` WHERE TherapistID = " . $row["TherapistID"] . " AND Date = '$date' AND Time >= '$tNow'")->fetch_assoc();
                }
                // $S = $db->executeQuery("select count(TherapistID) AS S from `sessions` WHERE TherapistID = " . $row["TherapistID"] . " AND Date = '$date' AND Time >= '$tNow'")->fetch_assoc();
                // $A = $db->executeQuery("select count(TherapistID) AS A from `appointments` WHERE TherapistID = " . $row["TherapistID"] . " AND Date = '$date' AND Time >= '$tNow'")->fetch_assoc();
                $CC = $A['A'] > $S['S'] ? "Free" : "Busy";
                //echo $A['A'] .' '. $S['S'];
                if ($CC == "Free") {

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
                } else {

                }

            } else {
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





        }
    }

    // Close the database connection
    //$conn->close();
}
?>